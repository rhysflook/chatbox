<?php

namespace Database\Seeders;

use App\Models\Friendship;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseFriendShipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rhys = User::create(['name' => 'Rhys', 'email' => 'rhys@media-system.co.jp', 'password' => \Hash::make('password')]);
        User::factory()->count(10)->create();
        $other_users = User::where('name', '<>', 'Rhys')->get();
        foreach ($other_users->all() as $user) {
            Friendship::create([
                'sender_id' => $rhys->id,
                'recipient_id' => $user->id
            ]);
        }
    }
}
