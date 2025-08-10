<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\CookingMethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeCookingMethodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::factory(),
            'cooking_method_id' => CookingMethod::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function boiling(): static
    {
        return $this->state(function (array $attributes) {
            $method = CookingMethod::where('slug', 'boiling')->first();
            if (!$method) {
                $method = CookingMethod::factory()->boiling()->create();
            }
            return [
                'cooking_method_id' => $method->id,
            ];
        });
    }

    public function frying(): static
    {
        return $this->state(function (array $attributes) {
            $method = CookingMethod::where('slug', 'frying')->first();
            if (!$method) {
                $method = CookingMethod::factory()->frying()->create();
            }
            return [
                'cooking_method_id' => $method->id,
            ];
        });
    }

    public function baking(): static
    {
        return $this->state(function (array $attributes) {
            $method = CookingMethod::where('slug', 'baking')->first();
            if (!$method) {
                $method = CookingMethod::factory()->baking()->create();
            }
            return [
                'cooking_method_id' => $method->id,
            ];
        });
    }

    public function grilling(): static
    {
        return $this->state(function (array $attributes) {
            $method = CookingMethod::where('slug', 'grilling')->first();
            if (!$method) {
                $method = CookingMethod::factory()->grilling()->create();
            }
            return [
                'cooking_method_id' => $method->id,
            ];
        });
    }

    public function steaming(): static
    {
        return $this->state(function (array $attributes) {
            $method = CookingMethod::where('slug', 'steaming')->first();
            if (!$method) {
                $method = CookingMethod::factory()->steaming()->create();
            }
            return [
                'cooking_method_id' => $method->id,
            ];
        });
    }
}
