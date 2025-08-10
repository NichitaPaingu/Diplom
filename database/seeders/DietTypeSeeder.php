<?php

namespace Database\Seeders;

use App\Models\DietType;
use Illuminate\Database\Seeder;

class DietTypeSeeder extends Seeder
{
    public function run(): void
    {
        $dietTypes = config('diet-types.types');

        foreach ($dietTypes as $dietType) {
            DietType::create($dietType);
        }
    }
}
