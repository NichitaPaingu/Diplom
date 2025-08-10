<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeIngredientFactory extends Factory
{
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::factory(),
            'ingredient_id' => Ingredient::factory(),
            'amount' => fake()->randomFloat(2, 0.1, 1000),
            'unit' => fake()->randomElement(['г', 'кг', 'мл', 'л', 'шт', 'по вкусу', 'щепотка']),
            'notes' => fake()->optional()->sentence(),
            'sort_order' => fake()->numberBetween(1, 20),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function smallAmount(): static
    {
        return $this->state(fn(array $attributes) => [
            'amount' => fake()->randomFloat(2, 0.1, 10),
            'unit' => fake()->randomElement(['г', 'мл', 'шт', 'щепотка']),
        ]);
    }

    public function mediumAmount(): static
    {
        return $this->state(fn(array $attributes) => [
            'amount' => fake()->randomFloat(2, 10, 500),
            'unit' => fake()->randomElement(['г', 'мл', 'шт']),
        ]);
    }

    public function largeAmount(): static
    {
        return $this->state(fn(array $attributes) => [
            'amount' => fake()->randomFloat(2, 500, 1000),
            'unit' => fake()->randomElement(['г', 'кг', 'мл', 'л']),
        ]);
    }

    public function byWeight(): static
    {
        return $this->state(fn(array $attributes) => [
            'unit' => fake()->randomElement(['г', 'кг']),
        ]);
    }

    public function byVolume(): static
    {
        return $this->state(fn(array $attributes) => [
            'unit' => fake()->randomElement(['мл', 'л']),
        ]);
    }

    public function byPiece(): static
    {
        return $this->state(fn(array $attributes) => [
            'amount' => fake()->numberBetween(1, 10),
            'unit' => 'шт',
        ]);
    }
}
