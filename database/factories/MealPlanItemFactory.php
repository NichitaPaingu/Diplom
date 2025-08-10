<?php

namespace Database\Factories;

use App\Models\MealPlan;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

class MealPlanItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'meal_plan_id' => MealPlan::factory(),
            'day' => fake()->numberBetween(1, 30),
            'meal_type' => fake()->randomElement(['breakfast', 'lunch', 'dinner', 'snack']),
            'recipe_id' => Recipe::factory(),
            'notes' => fake()->optional()->sentence(),
            'sort_order' => fake()->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function breakfast(): static
    {
        return $this->state(fn(array $attributes) => [
            'meal_type' => 'breakfast',
        ]);
    }

    public function lunch(): static
    {
        return $this->state(fn(array $attributes) => [
            'meal_type' => 'lunch',
        ]);
    }

    public function dinner(): static
    {
        return $this->state(fn(array $attributes) => [
            'meal_type' => 'dinner',
        ]);
    }

    public function snack(): static
    {
        return $this->state(fn(array $attributes) => [
            'meal_type' => 'snack',
        ]);
    }

    public function firstWeek(): static
    {
        return $this->state(fn(array $attributes) => [
            'day' => fake()->numberBetween(1, 7),
        ]);
    }

    public function secondWeek(): static
    {
        return $this->state(fn(array $attributes) => [
            'day' => fake()->numberBetween(8, 14),
        ]);
    }

    public function thirdWeek(): static
    {
        return $this->state(fn(array $attributes) => [
            'day' => fake()->numberBetween(15, 21),
        ]);
    }

    public function fourthWeek(): static
    {
        return $this->state(fn(array $attributes) => [
            'day' => fake()->numberBetween(22, 30),
        ]);
    }
}
