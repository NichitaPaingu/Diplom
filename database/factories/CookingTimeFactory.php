<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CookingTimeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->sentence(),
            'icon' => 'fa-clock',
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

    public function ultraFast(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Ультра-быстро',
            'slug' => 'ultra-fast',
            'description' => 'Приготовление за 5-10 минут',
            'icon' => 'fa-bolt',
        ]);
    }

    public function fast(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Быстро',
            'slug' => 'fast',
            'description' => 'Приготовление за 10-20 минут',
            'icon' => 'fa-rocket',
        ]);
    }

    public function medium(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Средне',
            'slug' => 'medium',
            'description' => 'Приготовление за 20-40 минут',
            'icon' => 'fa-clock',
        ]);
    }

    public function long(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Долго',
            'slug' => 'long',
            'description' => 'Приготовление за 40-60 минут',
            'icon' => 'fa-hourglass-half',
        ]);
    }

    public function veryLong(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Очень долго',
            'slug' => 'very-long',
            'description' => 'Приготовление более 60 минут',
            'icon' => 'fa-hourglass',
        ]);
    }
}
