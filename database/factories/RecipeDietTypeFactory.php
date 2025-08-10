<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\DietType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeDietTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::factory(),
            'diet_type_id' => DietType::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function vegetarian(): static
    {
        return $this->state(function (array $attributes) {
            $dietType = DietType::where('slug', 'vegetarian')->first();
            if (!$dietType) {
                $dietType = DietType::factory()->vegetarian()->create();
            }
            return [
                'diet_type_id' => $dietType->id,
            ];
        });
    }

    public function vegan(): static
    {
        return $this->state(function (array $attributes) {
            $dietType = DietType::where('slug', 'vegan')->first();
            if (!$dietType) {
                $dietType = DietType::factory()->vegan()->create();
            }
            return [
                'diet_type_id' => $dietType->id,
            ];
        });
    }

    public function lowCalorie(): static
    {
        return $this->state(function (array $attributes) {
            $dietType = DietType::where('slug', 'low-calorie')->first();
            if (!$dietType) {
                $dietType = DietType::factory()->lowCalorie()->create();
            }
            return [
                'diet_type_id' => $dietType->id,
            ];
        });
    }

    public function highProtein(): static
    {
        return $this->state(function (array $attributes) {
            $dietType = DietType::where('slug', 'high-protein')->first();
            if (!$dietType) {
                $dietType = DietType::factory()->highProtein()->create();
            }
            return [
                'diet_type_id' => $dietType->id,
            ];
        });
    }

    public function keto(): static
    {
        return $this->state(function (array $attributes) {
            $dietType = DietType::where('slug', 'keto')->first();
            if (!$dietType) {
                $dietType = DietType::factory()->keto()->create();
            }
            return [
                'diet_type_id' => $dietType->id,
            ];
        });
    }
}
