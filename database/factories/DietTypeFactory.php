<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DietTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->sentence(),
            'color' => fake()->hexColor(),
            'icon' => 'fa-leaf',
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

    public function vegetarian(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Вегетарианская',
            'slug' => 'vegetarian',
            'description' => 'Рецепты без мяса и рыбы',
            'color' => '#28a745',
            'icon' => 'fa-carrot',
        ]);
    }

    public function vegan(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Веганская',
            'slug' => 'vegan',
            'description' => 'Рецепты без продуктов животного происхождения',
            'color' => '#20c997',
            'icon' => 'fa-seedling',
        ]);
    }

    public function lowCalorie(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Низкокалорийная',
            'slug' => 'low-calorie',
            'description' => 'Рецепты с низким содержанием калорий',
            'color' => '#17a2b8',
            'icon' => 'fa-balance-scale',
        ]);
    }

    public function highProtein(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Высокопротеиновая',
            'slug' => 'high-protein',
            'description' => 'Рецепты с высоким содержанием белка',
            'color' => '#fd7e14',
            'icon' => 'fa-dumbbell',
        ]);
    }

    public function keto(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Кетогенная',
            'slug' => 'keto',
            'description' => 'Рецепты для кетогенной диеты',
            'color' => '#6f42c1',
            'icon' => 'fa-fire',
        ]);
    }
}
