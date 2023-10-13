<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Friendship;
class MessageTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        [$user1, $user2, $user3] = User::factory()->count(3)->create();
        $user1->name = "THIS_USER";
        $user1->save();
        $friendship1 =  Friendship::create([
            'sender_id' => $user1->id,
            'recipient_id' => $user2->id,
        ])->id;
        $friendship2 =  Friendship::create([
            'sender_id' => $user1->id,
            'recipient_id' => $user3->id,
        ])->id;
        $friendship3 =  Friendship::create([
            'sender_id' => $user3->id,
            'recipient_id' => $user2->id,
        ])->id;
        $users = User::all();
        Message::factory()->create([
            'sender_id' => $user1->id,
            'recipient_id' => $user2->id,
            'friendship_id' => $friendship1
        ]);
        Message::factory()->create([
            'sender_id' => $user3->id,
            'recipient_id' => $user2->id,
            'friendship_id' => $friendship3
        ]);
        Message::factory()->create([
            'sender_id' => $user1->id,
            'recipient_id' => $user3->id,
            'friendship_id' => $friendship2
        ]);
        Message::factory()->create([
            'sender_id' => $user2->id,
            'recipient_id' => $user3->id,
            'friendship_id' => $friendship3
        ]);
        Message::factory()->create([
            'sender_id' => $user1->id,
            'recipient_id' => $user3->id,
            'friendship_id' => $friendship2
        ]);
        Message::factory()->create([
            'sender_id' => $user3->id,
            'recipient_id' => $user1->id,
            'friendship_id' => $friendship2
        ]);
        Message::factory()->create([
            'sender_id' => $user1->id,
            'recipient_id' => $user2->id,
            'friendship_id' => $friendship1
        ]);
        Message::factory()->create([
            'sender_id' => $user3->id,
            'recipient_id' => $user1->id,
            'friendship_id' => $friendship2
        ]);
        Message::factory()->create([
            'sender_id' => $user2->id,
            'recipient_id' => $user1->id,
            'friendship_id' => $friendship1
        ]);
        Message::factory()->create([
            'sender_id' => $user1->id,
            'recipient_id' => $user2->id,
            'friendship_id' => $friendship1
        ]);
        Message::factory()->create([
            'sender_id' => $user1->id,
            'recipient_id' => $user2->id,
            'friendship_id' => $friendship1
        ]);
        Message::factory()->create([
            'sender_id' => $user2->id,
            'recipient_id' => $user3->id,
            'friendship_id' => $friendship3
        ]);

    }
}
