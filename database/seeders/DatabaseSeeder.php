<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Сначала создаем базовые данные
        $this->call([
            CategorySeeder::class,
            DietTypeSeeder::class,
            CookingMethodSeeder::class,
            CookingTimeSeeder::class,
            GoalSeeder::class,
            DifficultySeeder::class,
        ]);

        // Затем создаем ингредиенты
        $this->call([
            IngredientSeeder::class,
        ]);

        // Создаем рецепты
        $this->call([
            RecipeSeeder::class,
        ]);

        // Создаем планы питания
        $this->call([
            MealPlanSeeder::class,
        ]);

        // Создаем подписки
        $this->call([
            SubscriptionSeeder::class,
        ]);
    }
}
