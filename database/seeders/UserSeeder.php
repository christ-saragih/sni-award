<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create 2 users for each role
        User::factory()->count(2)->admin()->create();
        User::factory()->count(2)->evaluator()->create();
        User::factory()->count(2)->leadEvaluator()->create();
    }
}
