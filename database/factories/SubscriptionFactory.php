<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubscriptionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(3, true),
            'slug' => fn(array $attributes) => Str::slug($attributes['name']),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 0, 5000),
            'currency' => fake()->randomElement(['RUB', 'USD', 'EUR']),
            'billing_period' => fake()->randomElement(['monthly', 'quarterly', 'semi_annually', 'annually']),
            'additional_features' => json_encode([
                'basic_recipes' => fake()->boolean(),
                'meal_plans' => fake()->boolean(),
                'nutrition_tracking' => fake()->boolean(),
                'personal_coach' => fake()->boolean(),
                'community_access' => fake()->boolean(),
            ]),
            'is_popular' => fake()->boolean(20),
            'is_featured' => fake()->boolean(15),
            'trial_days' => fake()->randomElement([0, 3, 7, 14, 30]),
            'max_users' => fake()->randomElement([1, 2, 4, 6, 10]),
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

    public function free(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Бесплатный план',
            'slug' => 'free',
            'price' => 0,
            'currency' => 'RUB',
            'billing_period' => 'monthly',
            'trial_days' => 0,
            'max_users' => 1,
            'is_popular' => false,
            'is_featured' => false,
        ]);
    }

    public function basic(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Базовый план',
            'slug' => 'basic',
            'price' => 299,
            'currency' => 'RUB',
            'billing_period' => 'monthly',
            'trial_days' => 7,
            'max_users' => 1,
            'is_popular' => false,
            'is_featured' => false,
        ]);
    }

    public function premium(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Премиум план',
            'slug' => 'premium',
            'price' => 999,
            'currency' => 'RUB',
            'billing_period' => 'monthly',
            'trial_days' => 14,
            'max_users' => 2,
            'is_popular' => true,
            'is_featured' => true,
        ]);
    }

    public function family(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Семейный план',
            'slug' => 'family',
            'price' => 1999,
            'currency' => 'RUB',
            'billing_period' => 'monthly',
            'trial_days' => 7,
            'max_users' => 6,
            'is_popular' => true,
            'is_featured' => true,
        ]);
    }

    public function annual(): static
    {
        return $this->state(fn(array $attributes) => [
            'billing_period' => 'annually',
            'price' => fn(array $attributes) => $attributes['price'] * 10, // 2 месяца в подарок
        ]);
    }

    public function monthly(): static
    {
        return $this->state(fn(array $attributes) => [
            'billing_period' => 'monthly',
        ]);
    }

    public function quarterly(): static
    {
        return $this->state(fn(array $attributes) => [
            'billing_period' => 'quarterly',
            'price' => fn(array $attributes) => $attributes['price'] * 2.5, // 1 месяц в подарок
        ]);
    }
}
