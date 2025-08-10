<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Difficulty;
use App\Models\CookingTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'category_id' => Category::factory(),
            'description' => fake()->paragraph(),
            'instructions' => fake()->paragraphs(3, true),
            'prep_time' => fake()->numberBetween(5, 60),
            'cook_time' => fake()->numberBetween(10, 120),
            'servings' => fake()->numberBetween(1, 8),
            'calories_per_serving' => fake()->numberBetween(100, 800),
            'protein_per_serving' => fake()->randomFloat(1, 5, 50),
            'fat_per_serving' => fake()->randomFloat(1, 2, 40),
            'carbs_per_serving' => fake()->randomFloat(1, 10, 100),
            'fiber_per_serving' => fake()->randomFloat(1, 1, 15),
            'difficulty_id' => Difficulty::inRandomOrder()->first()?->id ?? Difficulty::factory()->create()->id,
            'cooking_time_id' => CookingTime::inRandomOrder()->first()?->id ?? CookingTime::factory()->create()->id,
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
            'additional_nutrition' => json_encode([
                'vitamin_c' => fake()->numberBetween(5, 100),
                'vitamin_d' => fake()->numberBetween(1, 20),
                'vitamin_e' => fake()->numberBetween(1, 15),
                'vitamin_k' => fake()->numberBetween(10, 200),
                'calcium' => fake()->numberBetween(50, 400),
                'iron' => fake()->numberBetween(2, 15),
                'magnesium' => fake()->numberBetween(30, 200),
                'zinc' => fake()->numberBetween(1, 10),
                'omega_3' => fake()->randomFloat(1, 0, 5),
                'antioxidants' => fake()->numberBetween(20, 150)
            ]),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the recipe is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the recipe is for breakfast.
     */
    public function breakfast(): static
    {
        return $this->state(fn(array $attributes) => [
            'category_id' => Category::where('name', 'Завтраки')->first()?->id ?? Category::factory()->breakfast()->create()->id,
            'prep_time' => fake()->numberBetween(5, 20),
            'cook_time' => fake()->numberBetween(10, 30),
            'calories_per_serving' => fake()->numberBetween(200, 500),
        ]);
    }

    /**
     * Indicate that the recipe is for soups.
     */
    public function soup(): static
    {
        return $this->state(fn(array $attributes) => [
            'category_id' => Category::where('name', 'Супы')->first()?->id ?? Category::factory()->soups()->create()->id,
            'prep_time' => fake()->numberBetween(15, 30),
            'cook_time' => fake()->numberBetween(30, 90),
            'calories_per_serving' => fake()->numberBetween(150, 400),
        ]);
    }

    /**
     * Indicate that the recipe is for main dishes.
     */
    public function mainDish(): static
    {
        return $this->state(fn(array $attributes) => [
            'category_id' => Category::where('name', 'Основные блюда')->first()?->id ?? Category::factory()->mainDishes()->create()->id,
            'prep_time' => fake()->numberBetween(20, 45),
            'cook_time' => fake()->numberBetween(25, 60),
            'calories_per_serving' => fake()->numberBetween(300, 700),
        ]);
    }

    /**
     * Indicate that the recipe is high in protein.
     */
    public function highProtein(): static
    {
        return $this->state(fn(array $attributes) => [
            'protein_per_serving' => fake()->numberBetween(25, 50),
            'calories_per_serving' => fake()->numberBetween(300, 600),
        ]);
    }

    /**
     * Indicate that the recipe is low in calories.
     */
    public function lowCalorie(): static
    {
        return $this->state(fn(array $attributes) => [
            'calories_per_serving' => fake()->numberBetween(100, 300),
            'fat_per_serving' => fake()->randomFloat(1, 2, 15),
        ]);
    }

    /**
     * Indicate that the recipe is quick to prepare.
     */
    public function quick(): static
    {
        return $this->state(fn(array $attributes) => [
            'prep_time' => fake()->numberBetween(5, 15),
            'cook_time' => fake()->numberBetween(10, 25),
        ]);
    }

    /**
     * Indicate that the recipe is complex.
     */
    public function complex(): static
    {
        return $this->state(fn(array $attributes) => [
            'prep_time' => fake()->numberBetween(30, 60),
            'cook_time' => fake()->numberBetween(60, 120),
        ]);
    }
}
