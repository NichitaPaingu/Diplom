<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\Goal;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeGoalFactory extends Factory
{
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::factory(),
            'goal_id' => Goal::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function weightLoss(): static
    {
        return $this->state(function (array $attributes) {
            $goal = Goal::where('slug', 'weight-loss')->first();
            if (!$goal) {
                $goal = Goal::factory()->weightLoss()->create();
            }
            return [
                'goal_id' => $goal->id,
            ];
        });
    }

    public function muscleBuilding(): static
    {
        return $this->state(function (array $attributes) {
            $goal = Goal::where('slug', 'muscle-building')->first();
            if (!$goal) {
                $goal = Goal::factory()->muscleBuilding()->create();
            }
            return [
                'goal_id' => $goal->id,
            ];
        });
    }

    public function energyBoost(): static
    {
        return $this->state(function (array $attributes) {
            $goal = Goal::where('slug', 'energy-boost')->first();
            if (!$goal) {
                $goal = Goal::factory()->energyBoost()->create();
            }
            return [
                'goal_id' => $goal->id,
            ];
        });
    }

    public function heartHealth(): static
    {
        return $this->state(function (array $attributes) {
            $goal = Goal::where('slug', 'heart-health')->first();
            if (!$goal) {
                $goal = Goal::factory()->heartHealth()->create();
            }
            return [
                'goal_id' => $goal->id,
            ];
        });
    }

    public function digestion(): static
    {
        return $this->state(function (array $attributes) {
            $goal = Goal::where('slug', 'digestion')->first();
            if (!$goal) {
                $goal = Goal::factory()->digestion()->create();
            }
            return [
                'goal_id' => $goal->id,
            ];
        });
    }
}
