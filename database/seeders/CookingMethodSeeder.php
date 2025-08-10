<?php

namespace Database\Seeders;

use App\Models\CookingMethod;
use Illuminate\Database\Seeder;

class CookingMethodSeeder extends Seeder
{
    public function run(): void
    {
        $cookingMethods = config('cooking-options.methods');

        foreach ($cookingMethods as $method) {
            CookingMethod::create($method);
        }
    }
}
