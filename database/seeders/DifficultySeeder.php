<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Seeder;

class DifficultySeeder extends Seeder
{
    public function run(): void
    {
        $difficulties = config('recipes.difficulty_levels');

        foreach ($difficulties as $difficulty) {
            Difficulty::create($difficulty);
        }
    }
}
