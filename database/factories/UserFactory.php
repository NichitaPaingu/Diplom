<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function verified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => now(),
        ]);
    }

    public function withPassword(string $password): static
    {
        return $this->state(fn(array $attributes) => [
            'password' => Hash::make($password),
        ]);
    }

    public function admin(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Администратор',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);
    }

    public function testUser(): static
    {
        return $this->state(fn(array $attributes) => [
            'name' => 'Тестовый пользователь',
            'email' => 'test@example.com',
            'password' => Hash::make('test123'),
        ]);
    }
}
