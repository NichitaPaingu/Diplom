<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GoalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->sentence(),
            'icon' => 'fa-bullseye',
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

    public function weightLoss(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Похудение',
            'slug' => 'weight-loss',
            'description' => 'Рецепты для снижения веса',
            'icon' => 'fa-weight-scale',
        ]);
    }

    public function muscleBuilding(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Набор мышечной массы',
            'slug' => 'muscle-building',
            'description' => 'Рецепты для роста мышц',
            'icon' => 'fa-dumbbell',
        ]);
    }

    public function energyBoost(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Прилив энергии',
            'slug' => 'energy-boost',
            'description' => 'Рецепты для повышения энергии',
            'icon' => 'fa-bolt',
        ]);
    }

    public function heartHealth(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Здоровье сердца',
            'slug' => 'heart-health',
            'description' => 'Рецепты для здоровья сердечно-сосудистой системы',
            'icon' => 'fa-heart',
        ]);
    }

    public function digestion(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Пищеварение',
            'slug' => 'digestion',
            'description' => 'Рецепты для улучшения пищеварения',
            'icon' => 'fa-stomach',
        ]);
    }
}
