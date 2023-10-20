<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RelationshipStatus;

class RelationshipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['status' => 'Single'],
            ['status' => 'In a Relationship'],
            ['status' => 'Married'],
           ['status' => 'Not Interested']
        ];

        RelationshipStatus::insert($statuses);
    }
}
