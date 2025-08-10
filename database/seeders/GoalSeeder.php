<?php

namespace Database\Seeders;

use App\Models\Goal;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    public function run(): void
    {
        $goals = config('cooking-options.goals');

        foreach ($goals as $goal) {
            Goal::create($goal);
        }
    }
}
