<?php

namespace Tests\Feature;

use App\Models\Friendship;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Message;
use App\Models\User;
use App\Repositories\MessageRepository;
use App\Services\MessageAttachmentService;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\UploadedFile;
use Storage;

class MessageTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_create_message(): void
    {
        $users = User::factory()->count(2)->create();
        $friendship = Friendship::create([
            'sender_id' => $users[0]->id,
            'recipient_id' => $users[1]->id,
        ]);
        $messageRepository = new MessageRepository(new Message);
        $message = $messageRepository->create([
            'sender_id' => $users[0]->id,
            'recipient_id' => $users[1]->id,
            'friendship_id' => $friendship->id,
            'content' => 'HEY BUDDY, HOWS IT GOING?'
        ]);

        $this->assertInstanceOf(\App\Models\Message::class, $message);
        $this->assertEquals($users[0]->id, $message->sender_id);
        $this->assertEquals($users[1]->id, $message->recipient_id);
        $this->assertEquals('HEY BUDDY, HOWS IT GOING?', $message->content);
    }

    public function test_get_messages_by_sender()
    {
        Artisan::call('db:seed', ['--class' => 'MessageTestSeeder']);
        $user = User::where('name', 'THIS_USER')->first();
        $messageRepository = new MessageRepository(new Message);
        $messages = $messageRepository->findBySender($user->id);
        $this->assertEquals(6, $messages->count());
    }

    public function test_save_uploaded_files()
    {
        Storage::fake('public');
        $users = User::factory()->count(2)->create();
        $friendship = Friendship::create([
            'sender_id' => $users[0]->id,
            'recipient_id' => $users[1]->id,
        ]);

        $files = [
            UploadedFile::fake()->image('image1.jpg'),
            UploadedFile::fake()->image('image2.jpg'),
            UploadedFile::fake()->image('image3.jpg'),
        ];

        $response = $this->actingAs($users[0])->post('/send-message', [
            'friend_id' => $users[1]->id,
            'id' => $friendship->id,
            'message' => 'HEY BUDDY, HOWS IT GOING?',
            'files' => $files
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseCount('message_attachments', 3);
        Storage::disk('public')->assertExists("/friendships/$friendship->id/" . $files[0]->hashName());
        Storage::disk('public')->assertExists("/friendships/$friendship->id/" . $files[1]->hashName());
        Storage::disk('public')->assertExists("/friendships/$friendship->id/" . $files[2]->hashName());
    }
}