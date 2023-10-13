<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time = now();
        $statuses = [
            ['name' => 'pending', 'code' => 'R', 'created_at' => $time, 'updated_at' => $time],
            ['name' => 'accepted', 'code' => 'A', 'created_at' => $time, 'updated_at' => $time],
            ['name' => 'declined', 'code' => 'D', 'created_at' => $time, 'updated_at' => $time],
            ['name' => 'blocked', 'code' => 'B', 'created_at' => $time, 'updated_at' => $time],
        ];

        Status::insert($statuses);
    }
}
