<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(),
            'icon' => fake()->randomElement(['fa-utensils', 'fa-apple-alt', 'fa-carrot', 'fa-fish', 'fa-bread-slice']),
            'color' => fake()->hexColor(),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the category is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the category is for breakfast.
     */
    public function breakfast(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Завтраки',
            'slug' => 'breakfast',
            'description' => 'Рецепты для завтрака',
            'icon' => 'fa-sun',
            'color' => '#ffc107',
        ]);
    }

    /**
     * Indicate that the category is for soups.
     */
    public function soups(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Супы',
            'slug' => 'soups',
            'description' => 'Рецепты супов',
            'icon' => 'fa-utensils',
            'color' => '#dc3545',
        ]);
    }

    /**
     * Indicate that the category is for main dishes.
     */
    public function mainDishes(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Основные блюда',
            'slug' => 'main-dishes',
            'description' => 'Основные блюда',
            'icon' => 'fa-drumstick-bite',
            'color' => '#28a745',
        ]);
    }
}
