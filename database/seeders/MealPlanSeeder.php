<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MealPlan;
use App\Models\MealPlanItem;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\Goal;
use App\Models\DietType;
use Illuminate\Support\Str;

class MealPlanSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = Recipe::all();
        $categories = Category::all();
        $goals = Goal::all();
        $dietTypes = DietType::all();

        $mealPlans = [
            [
                'name' => 'План для похудения',
                'description' => 'Сбалансированный план питания для снижения веса',
                'goal_id' => $goals->where('slug', 'weight-loss')->first()->id,
                'total_calories' => 1500,
                'total_protein' => 120,
                'total_fat' => 50,
                'total_carbs' => 150,
                'subscription_required' => 'basic',
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 1,
                'meals' => [
                    ['meal_type' => 'breakfast', 'meal_name' => 'Овсяная каша с ягодами', 'description' => 'Полезный завтрак', 'calories' => 180, 'protein' => 8, 'fat' => 3, 'carbs' => 32],
                    ['meal_type' => 'lunch', 'meal_name' => 'Куриная грудка на гриле', 'description' => 'Диетический обед', 'calories' => 280, 'protein' => 45, 'fat' => 8, 'carbs' => 2],
                    ['meal_type' => 'dinner', 'meal_name' => 'Лосось на пару', 'description' => 'Легкий ужин', 'calories' => 320, 'protein' => 38, 'fat' => 18, 'carbs' => 8],
                ]
            ],
            [
                'name' => 'План для набора мышечной массы',
                'description' => 'Высокобелковый план для роста мышц',
                'goal_id' => $goals->where('slug', 'muscle-building')->first()->id,
                'total_calories' => 2500,
                'total_protein' => 200,
                'total_fat' => 80,
                'total_carbs' => 250,
                'subscription_required' => 'premium',
                'is_premium' => true,
                'is_active' => true,
                'sort_order' => 2,
                'meals' => [
                    ['meal_type' => 'breakfast', 'meal_name' => 'Омлет с овощами', 'description' => 'Белковый завтрак', 'calories' => 280, 'protein' => 22, 'fat' => 18, 'carbs' => 8],
                    ['meal_type' => 'lunch', 'meal_name' => 'Куриная грудка на гриле', 'description' => 'Высокобелковый обед', 'calories' => 280, 'protein' => 45, 'fat' => 8, 'carbs' => 2],
                    ['meal_type' => 'dinner', 'meal_name' => 'Лосось на пару', 'description' => 'Белковый ужин', 'calories' => 320, 'protein' => 38, 'fat' => 18, 'carbs' => 8],
                ]
            ],
            [
                'name' => 'Вегетарианский план',
                'description' => 'Сбалансированное вегетарианское питание',
                'goal_id' => $goals->where('slug', 'energy-boost')->first()->id,
                'total_calories' => 1800,
                'total_protein' => 80,
                'total_fat' => 60,
                'total_carbs' => 220,
                'subscription_required' => 'basic',
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 3,
                'meals' => [
                    ['meal_type' => 'breakfast', 'meal_name' => 'Овсяная каша с ягодами', 'description' => 'Вегетарианский завтрак', 'calories' => 180, 'protein' => 8, 'fat' => 3, 'carbs' => 32],
                    ['meal_type' => 'lunch', 'meal_name' => 'Киноа с овощами', 'description' => 'Питательный обед', 'calories' => 280, 'protein' => 12, 'fat' => 8, 'carbs' => 45],
                    ['meal_type' => 'dinner', 'meal_name' => 'Суп-пюре из тыквы', 'description' => 'Легкий ужин', 'calories' => 180, 'protein' => 6, 'fat' => 8, 'carbs' => 25],
                ]
            ],
            [
                'name' => 'Кето план',
                'description' => 'Низкоуглеводный кетогенный план питания',
                'goal_id' => $goals->where('slug', 'weight-loss')->first()->id,
                'total_calories' => 1600,
                'total_protein' => 120,
                'total_fat' => 120,
                'total_carbs' => 20,
                'subscription_required' => 'premium',
                'is_premium' => true,
                'is_active' => true,
                'sort_order' => 4,
                'meals' => [
                    ['meal_type' => 'breakfast', 'meal_name' => 'Омлет с овощами', 'description' => 'Кето завтрак', 'calories' => 280, 'protein' => 22, 'fat' => 18, 'carbs' => 8],
                    ['meal_type' => 'lunch', 'meal_name' => 'Куриная грудка на гриле', 'description' => 'Кето обед', 'calories' => 280, 'protein' => 45, 'fat' => 8, 'carbs' => 2],
                    ['meal_type' => 'dinner', 'meal_name' => 'Лосось на пару', 'description' => 'Кето ужин', 'calories' => 320, 'protein' => 38, 'fat' => 18, 'carbs' => 8],
                ]
            ],
            [
                'name' => 'План для спортсменов',
                'description' => 'Высокоэнергетический план для активных тренировок',
                'goal_id' => $goals->where('slug', 'muscle-building')->first()->id,
                'total_calories' => 3000,
                'total_protein' => 250,
                'total_fat' => 100,
                'total_carbs' => 300,
                'subscription_required' => 'premium',
                'is_premium' => true,
                'is_active' => true,
                'sort_order' => 5,
                'meals' => [
                    ['meal_type' => 'breakfast', 'meal_name' => 'Творожная запеканка', 'description' => 'Энергетический завтрак', 'calories' => 320, 'protein' => 25, 'fat' => 12, 'carbs' => 28],
                    ['meal_type' => 'lunch', 'meal_name' => 'Борщ классический', 'description' => 'Сытный обед', 'calories' => 350, 'protein' => 18, 'fat' => 12, 'carbs' => 35],
                    ['meal_type' => 'dinner', 'meal_name' => 'Куриная грудка на гриле', 'description' => 'Белковый ужин', 'calories' => 280, 'protein' => 45, 'fat' => 8, 'carbs' => 2],
                ]
            ]
        ];

        foreach ($mealPlans as $planData) {
            $meals = $planData['meals'];
            unset($planData['meals']);

            $mealPlan = MealPlan::create([
                ...$planData,
                'slug' => Str::slug($planData['name'])
            ]);

            // Создаем приемы пищи
            foreach ($meals as $mealData) {
                MealPlanItem::create([
                    'meal_plan_id' => $mealPlan->id,
                    'meal_type' => $mealData['meal_type'],
                    'meal_name' => $mealData['meal_name'],
                    'description' => $mealData['description'],
                    'calories' => $mealData['calories'],
                    'protein' => $mealData['protein'],
                    'fat' => $mealData['fat'],
                    'carbs' => $mealData['carbs'],
                    'sort_order' => rand(1, 10)
                ]);
            }
        }
    }
}
