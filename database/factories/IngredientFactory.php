<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ingredient>
 */
class IngredientFactory extends Factory
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
            'category_id' => Category::factory(),
            'calories_per_100g' => fake()->numberBetween(20, 600),
            'protein_per_100g' => fake()->randomFloat(1, 0, 30),
            'fat_per_100g' => fake()->randomFloat(1, 0, 50),
            'carbs_per_100g' => fake()->randomFloat(1, 0, 80),
            'fiber_per_100g' => fake()->randomFloat(1, 0, 15),
            'description' => fake()->sentence(),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
            'additional_nutrition' => json_encode([
                'vitamin_c' => fake()->numberBetween(0, 100),
                'vitamin_d' => fake()->numberBetween(0, 20),
                'vitamin_e' => fake()->numberBetween(0, 15),
                'vitamin_k' => fake()->numberBetween(0, 200),
                'calcium' => fake()->numberBetween(0, 500),
                'iron' => fake()->numberBetween(0, 15),
                'magnesium' => fake()->numberBetween(0, 200),
                'zinc' => fake()->numberBetween(0, 10),
                'omega_3' => fake()->randomFloat(1, 0, 5),
                'antioxidants' => fake()->numberBetween(0, 100)
            ]),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the ingredient is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the ingredient is high in protein.
     */
    public function highProtein(): static
    {
        return $this->state(fn(array $attributes) => [
            'protein_per_100g' => fake()->numberBetween(20, 30),
            'calories_per_100g' => fake()->numberBetween(150, 300),
        ]);
    }

    /**
     * Indicate that the ingredient is low in calories.
     */
    public function lowCalorie(): static
    {
        return $this->state(fn(array $attributes) => [
            'calories_per_100g' => fake()->numberBetween(20, 100),
            'fat_per_100g' => fake()->randomFloat(1, 0, 5),
        ]);
    }

    /**
     * Indicate that the ingredient is high in fiber.
     */
    public function highFiber(): static
    {
        return $this->state(fn(array $attributes) => [
            'fiber_per_100g' => fake()->numberBetween(8, 15),
            'carbs_per_100g' => fake()->numberBetween(20, 60),
        ]);
    }

    /**
     * Indicate that the ingredient is for vegetables category.
     */
    public function vegetable(): static
    {
        return $this->state(fn(array $attributes) => [
            'category_id' => Category::where('name', 'Овощи')->first()?->id ?? Category::factory()->create(['name' => 'Овощи'])->id,
            'calories_per_100g' => fake()->numberBetween(20, 100),
            'protein_per_100g' => fake()->randomFloat(1, 1, 5),
            'fat_per_100g' => fake()->randomFloat(1, 0, 2),
            'carbs_per_100g' => fake()->randomFloat(1, 5, 20),
            'fiber_per_100g' => fake()->randomFloat(1, 2, 8),
        ]);
    }

    /**
     * Indicate that the ingredient is for protein category.
     */
    public function protein(): static
    {
        return $this->state(fn(array $attributes) => [
            'category_id' => Category::where('name', 'Белки животного происхождения')->first()?->id ?? Category::factory()->create(['name' => 'Белки животного происхождения'])->id,
            'calories_per_100g' => fake()->numberBetween(150, 300),
            'protein_per_100g' => fake()->randomFloat(1, 20, 30),
            'fat_per_100g' => fake()->randomFloat(1, 5, 20),
            'carbs_per_100g' => fake()->randomFloat(1, 0, 5),
            'fiber_per_100g' => 0,
        ]);
    }
}
