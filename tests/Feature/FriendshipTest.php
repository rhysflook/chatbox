<?php

namespace Tests\Feature;

use App\Enums\Status as EnumsStatus;
use App\Models\Friendship;
use App\Models\FriendshipStatus;
use App\Models\Status;
use App\Models\User;
use App\Repositories\FriendshipRepository;
use App\Services\FriendshipService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class FriendshipTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_repo_create_friendship(): void
    {
        Artisan::call('db:seed', ['--class' => 'StatusSeeder']);
        $users = \App\Models\User::factory()->count(2)->create();
        $repository = resolve(FriendshipRepository::class);
        $friendship = $repository->create([
            'sender_id' => $users[0]->id,
            'recipient_id' => $users[1]->id,
        ]);

        // $status = FriendshipStatus::create([
        //     'friendship_id' => $friendship->id,
        //     'specifier_id' => $users[0]->id,
        //     'status_id' => Status::where('code', 'R')->id,
        // ]);


        $this->assertInstanceOf(\App\Models\Friendship::class, $friendship);
        $this->assertEquals($users[0]->id, $friendship->sender_id);
        $this->assertEquals($users[1]->id, $friendship->recipient_id);
    }

    public function test_service_make_friendship()
    {
        $users = User::factory()->count(2)->create();
        Artisan::call('db:seed', ['--class' => 'StatusSeeder']);
        $service = resolve(FriendshipService::class);
        $service->makeFriendship($users[0]->id, $users[1]->id);
        $this->assertDatabaseHas('friendships', [
            'sender_id' => $users[0]->id,
            'recipient_id' => $users[1]->id,
        ]);
        $friendship = Friendship::where([
            'sender_id' => $users[0]->id,
            'recipient_id' => $users[1]->id,
        ])->first();
        $this->assertDatabaseHas('friendship_statuses', [
            'friendship_id' => $friendship->id,
            'status_id' => Status::where('code', EnumsStatus::REQUESTED->value)->first()->id
        ]);
    }
}
