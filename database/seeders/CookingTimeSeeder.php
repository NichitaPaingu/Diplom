<?php

namespace Database\Seeders;

use App\Models\CookingTime;
use Illuminate\Database\Seeder;

class CookingTimeSeeder extends Seeder
{
    public function run(): void
    {
        $cookingTimes = config('recipes.cooking_times');

        foreach ($cookingTimes as $time) {
            CookingTime::create($time);
        }
    }
}
