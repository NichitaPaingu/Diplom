<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\DietType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealPlan>
 */
class MealPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->words(4, true);

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'goal_id' => Goal::inRandomOrder()->first()?->id ?? Goal::factory()->create()->id,
            'diet_type_id' => DietType::inRandomOrder()->first()?->id ?? DietType::factory()->create()->id,
            'duration_days' => fake()->randomElement([7, 14, 21, 30]),
            'meals_per_day' => fake()->numberBetween(3, 6),
            'snacks_per_day' => fake()->numberBetween(1, 3),
            'target_calories' => fake()->numberBetween(1200, 3500),
            'target_protein' => fake()->numberBetween(80, 300),
            'target_fat' => fake()->numberBetween(40, 150),
            'target_carbs' => fake()->numberBetween(100, 400),
            'target_fiber' => fake()->numberBetween(20, 60),
            'is_active' => true,
            'sort_order' => fake()->numberBetween(1, 100),
            'additional_nutrition' => json_encode([
                'vitamin_c' => fake()->numberBetween(50, 300),
                'vitamin_d' => fake()->numberBetween(10, 80),
                'vitamin_e' => fake()->numberBetween(5, 40),
                'vitamin_k' => fake()->numberBetween(100, 800),
                'calcium' => fake()->numberBetween(800, 2000),
                'iron' => fake()->numberBetween(15, 50),
                'magnesium' => fake()->numberBetween(300, 800),
                'zinc' => fake()->numberBetween(10, 40),
                'omega_3' => fake()->randomFloat(1, 2, 15),
                'antioxidants' => fake()->numberBetween(100, 800)
            ]),
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }

    /**
     * Indicate that the meal plan is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    /**
     * Indicate that the meal plan is for weight loss.
     */
    public function weightLoss(): static
    {
        return $this->state(fn(array $attributes) => [
            'goal_id' => Goal::where('slug', 'weight-loss')->first()?->id ?? Goal::factory()->create(['slug' => 'weight-loss'])->id,
            'target_calories' => fake()->numberBetween(1200, 1800),
            'target_protein' => fake()->numberBetween(100, 150),
            'target_fat' => fake()->numberBetween(40, 80),
            'target_carbs' => fake()->numberBetween(100, 200),
        ]);
    }

    /**
     * Indicate that the meal plan is for muscle building.
     */
    public function muscleBuilding(): static
    {
        return $this->state(fn(array $attributes) => [
            'goal_id' => Goal::where('slug', 'muscle-building')->first()?->id ?? Goal::factory()->create(['slug' => 'muscle-building'])->id,
            'target_calories' => fake()->numberBetween(2500, 3500),
            'target_protein' => fake()->numberBetween(200, 300),
            'target_fat' => fake()->numberBetween(80, 150),
            'target_carbs' => fake()->numberBetween(250, 400),
        ]);
    }

    /**
     * Indicate that the meal plan is for energy boost.
     */
    public function energyBoost(): static
    {
        return $this->state(fn(array $attributes) => [
            'goal_id' => Goal::where('slug', 'energy-boost')->first()?->id ?? Goal::factory()->create(['slug' => 'energy-boost'])->id,
            'target_calories' => fake()->numberBetween(1800, 2500),
            'target_carbs' => fake()->numberBetween(200, 300),
            'target_protein' => fake()->numberBetween(80, 120),
        ]);
    }

    /**
     * Indicate that the meal plan is vegetarian.
     */
    public function vegetarian(): static
    {
        return $this->state(fn(array $attributes) => [
            'diet_type_id' => DietType::where('slug', 'vegetarian')->first()?->id ?? DietType::factory()->create(['slug' => 'vegetarian'])->id,
            'target_protein' => fake()->numberBetween(60, 100),
            'target_carbs' => fake()->numberBetween(200, 300),
        ]);
    }

    /**
     * Indicate that the meal plan is keto.
     */
    public function keto(): static
    {
        return $this->state(fn(array $attributes) => [
            'diet_type_id' => DietType::where('slug', 'keto')->first()?->id ?? DietType::factory()->create(['slug' => 'keto'])->id,
            'target_carbs' => fake()->numberBetween(20, 50),
            'target_fat' => fake()->numberBetween(100, 200),
            'target_protein' => fake()->numberBetween(120, 180),
        ]);
    }

    /**
     * Indicate that the meal plan is short duration.
     */
    public function short(): static
    {
        return $this->state(fn(array $attributes) => [
            'duration_days' => fake()->randomElement([3, 5, 7]),
            'meals_per_day' => fake()->numberBetween(3, 4),
        ]);
    }

    /**
     * Indicate that the meal plan is long duration.
     */
    public function long(): static
    {
        return $this->state(fn(array $attributes) => [
            'duration_days' => fake()->randomElement([21, 30, 60]),
            'meals_per_day' => fake()->numberBetween(4, 6),
        ]);
    }
}
