<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DifficultyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->sentence(),
            'icon' => 'fa-star',
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function beginner(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Начинающий',
            'slug' => 'beginner',
            'description' => 'Простые рецепты для начинающих',
            'icon' => 'fa-star',
        ]);
    }

    public function intermediate(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Средний',
            'slug' => 'intermediate',
            'description' => 'Рецепты средней сложности',
            'icon' => 'fa-star-half-alt',
        ]);
    }

    public function expert(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Эксперт',
            'slug' => 'expert',
            'description' => 'Сложные рецепты для опытных поваров',
            'icon' => 'fa-stars',
        ]);
    }

    public function easy(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Легкий',
            'slug' => 'easy',
            'description' => 'Очень простые рецепты',
            'icon' => 'fa-star',
        ]);
    }

    public function complex(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Сложный',
            'slug' => 'complex',
            'description' => 'Очень сложные рецепты',
            'icon' => 'fa-stars',
        ]);
    }
}
