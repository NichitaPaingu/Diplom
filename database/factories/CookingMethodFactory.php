<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CookingMethodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->sentence(),
            'icon' => 'fa-utensils',
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

    public function boiling(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Варка',
            'slug' => 'boiling',
            'description' => 'Приготовление в кипящей воде',
            'icon' => 'fa-fire',
        ]);
    }

    public function frying(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Жарка',
            'slug' => 'frying',
            'description' => 'Приготовление на сковороде',
            'icon' => 'fa-fire',
        ]);
    }

    public function baking(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Запекание',
            'slug' => 'baking',
            'description' => 'Приготовление в духовке',
            'icon' => 'fa-fire',
        ]);
    }

    public function grilling(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Гриль',
            'slug' => 'grilling',
            'description' => 'Приготовление на гриле',
            'icon' => 'fa-fire',
        ]);
    }

    public function steaming(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'На пару',
            'slug' => 'steaming',
            'description' => 'Приготовление на пару',
            'icon' => 'fa-cloud',
        ]);
    }
}
