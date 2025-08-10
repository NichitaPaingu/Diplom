<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\DietType;
use App\Models\CookingMethod;
use App\Models\CookingTime;
use App\Models\Goal;
use App\Models\Difficulty;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use App\Models\RecipeDietType;
use App\Models\RecipeCookingMethod;
use App\Models\RecipeGoal;
use Illuminate\Support\Str;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();
        $dietTypes = DietType::all();
        $cookingMethods = CookingMethod::all();
        $cookingTimes = CookingTime::all();
        $goals = Goal::all();
        $difficulties = Difficulty::all();
        $ingredients = Ingredient::all();

        $recipes = [
            // Завтраки
            [
                'title' => 'Овсяная каша с ягодами',
                'category_id' => $categories->where('name', 'Завтраки')->first()->id,
                'description' => 'Полезный завтрак с овсянкой и свежими ягодами',
                'instructions' => 'Сварить овсянку, добавить мед и ягоды',
                'prep_time_minutes' => 5,
                'cook_time_minutes' => 15,
                'total_time_minutes' => 20,
                'servings' => 2,
                'serving_size' => '1 порция',
                'calories_per_100g' => 180,
                'protein_per_100g' => 8,
                'fat_per_100g' => 3,
                'carbs_per_100g' => 32,
                'difficulty_id' => $difficulties->where('name', 'Легко')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Быстрые (10-20 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Овсянка')->first()->id, 'amount' => 100, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Черника')->first()->id, 'amount' => 50, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Мед')->first()->id, 'amount' => 15, 'unit' => 'мл'],
                ],
                'diet_types' => ['vegetarian', 'vegan', 'gluten-free'],
                'cooking_methods' => ['boiling'],
                'goals' => ['weight-loss', 'energy-boost']
            ],
            [
                'title' => 'Греческий йогурт с орехами',
                'category_id' => $categories->where('name', 'Завтраки')->first()->id,
                'description' => 'Белковый завтрак с греческим йогуртом и орехами',
                'instructions' => 'Смешать йогурт с медом, посыпать орехами',
                'prep_time_minutes' => 3,
                'cook_time_minutes' => 0,
                'total_time_minutes' => 3,
                'servings' => 1,
                'serving_size' => '1 порция',
                'calories_per_100g' => 220,
                'protein_per_100g' => 18,
                'fat_per_100g' => 12,
                'carbs_per_100g' => 15,
                'difficulty_id' => $difficulties->where('name', 'Легко')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Быстрые (10-20 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Греческий йогурт')->first()->id, 'amount' => 150, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Грецкие орехи')->first()->id, 'amount' => 20, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Мед')->first()->id, 'amount' => 10, 'unit' => 'мл'],
                ],
                'diet_types' => ['vegetarian', 'high-protein'],
                'cooking_methods' => ['no-cook'],
                'goals' => ['muscle-building', 'energy-boost']
            ],
            [
                'title' => 'Смузи из шпината и банана',
                'category_id' => $categories->where('name', 'Завтраки')->first()->id,
                'description' => 'Зеленый смузи для энергии и витаминов',
                'instructions' => 'Смешать все ингредиенты в блендере',
                'prep_time_minutes' => 5,
                'cook_time_minutes' => 0,
                'total_time_minutes' => 5,
                'servings' => 1,
                'serving_size' => '1 стакан',
                'calories_per_100g' => 150,
                'protein_per_100g' => 4,
                'fat_per_100g' => 1,
                'carbs_per_100g' => 35,
                'difficulty_id' => $difficulties->where('name', 'Легко')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Быстрые (10-20 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Шпинат')->first()->id, 'amount' => 50, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Банан')->first()->id, 'amount' => 1, 'unit' => 'шт'],
                    ['ingredient_id' => $ingredients->where('name', 'Яблоко')->first()->id, 'amount' => 1, 'unit' => 'шт'],
                ],
                'diet_types' => ['vegetarian', 'vegan', 'gluten-free'],
                'cooking_methods' => ['blending'],
                'goals' => ['energy-boost', 'detox']
            ],
            [
                'title' => 'Омлет с овощами',
                'category_id' => $categories->where('name', 'Завтраки')->first()->id,
                'description' => 'Белковый омлет с полезными овощами',
                'instructions' => 'Взбить яйца, добавить овощи, пожарить',
                'prep_time_minutes' => 8,
                'cook_time_minutes' => 7,
                'total_time_minutes' => 15,
                'servings' => 2,
                'serving_size' => '1 порция',
                'calories_per_100g' => 280,
                'protein_per_100g' => 22,
                'fat_per_100g' => 18,
                'carbs_per_100g' => 8,
                'difficulty_id' => $difficulties->where('name', 'Средне')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Быстрые (10-20 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Яйца')->first()->id, 'amount' => 4, 'unit' => 'шт'],
                    ['ingredient_id' => $ingredients->where('name', 'Помидоры')->first()->id, 'amount' => 100, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Шпинат')->first()->id, 'amount' => 30, 'unit' => 'г'],
                ],
                'diet_types' => ['vegetarian', 'high-protein', 'keto'],
                'cooking_methods' => ['frying'],
                'goals' => ['muscle-building', 'weight-loss']
            ],
            [
                'title' => 'Творожная запеканка',
                'category_id' => $categories->where('name', 'Завтраки')->first()->id,
                'description' => 'Нежная творожная запеканка с изюмом',
                'instructions' => 'Смешать творог с яйцами, добавить изюм, запечь',
                'prep_time_minutes' => 15,
                'cook_time_minutes' => 25,
                'total_time_minutes' => 40,
                'servings' => 4,
                'serving_size' => '1 кусок',
                'calories_per_100g' => 320,
                'protein_per_100g' => 25,
                'fat_per_100g' => 12,
                'carbs_per_100g' => 28,
                'difficulty_id' => $difficulties->where('name', 'Средне')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Средние (30-45 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Творог 5%')->first()->id, 'amount' => 400, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Яйца')->first()->id, 'amount' => 2, 'unit' => 'шт'],
                    ['ingredient_id' => $ingredients->where('name', 'Изюм')->first()->id, 'amount' => 50, 'unit' => 'г'],
                ],
                'diet_types' => ['vegetarian', 'high-protein'],
                'cooking_methods' => ['baking'],
                'goals' => ['muscle-building', 'energy-boost']
            ],
            // Супы
            [
                'title' => 'Борщ классический',
                'category_id' => $categories->where('name', 'Супы')->first()->id,
                'description' => 'Традиционный украинский борщ с мясом',
                'instructions' => 'Сварить мясо, добавить овощи, варить до готовности',
                'prep_time_minutes' => 20,
                'cook_time_minutes' => 90,
                'total_time_minutes' => 110,
                'servings' => 6,
                'serving_size' => '1 тарелка',
                'calories_per_100g' => 350,
                'protein_per_100g' => 18,
                'fat_per_100g' => 12,
                'carbs_per_100g' => 35,
                'difficulty_id' => $difficulties->where('name', 'Сложно')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Долгие (1-2 часа)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Говядина постная')->first()->id, 'amount' => 300, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Свекла')->first()->id, 'amount' => 200, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Капуста белокочанная')->first()->id, 'amount' => 150, 'unit' => 'г'],
                ],
                'diet_types' => ['traditional'],
                'cooking_methods' => ['boiling', 'simmering'],
                'goals' => ['energy-boost', 'immunity']
            ],
            [
                'title' => 'Суп-пюре из тыквы',
                'category_id' => $categories->where('name', 'Супы')->first()->id,
                'description' => 'Кремовый суп из тыквы с имбирем',
                'instructions' => 'Запечь тыкву, сварить с овощами, взбить в пюре',
                'prep_time_minutes' => 15,
                'cook_time_minutes' => 45,
                'total_time_minutes' => 60,
                'servings' => 4,
                'serving_size' => '1 тарелка',
                'calories_per_100g' => 180,
                'protein_per_100g' => 6,
                'fat_per_100g' => 8,
                'carbs_per_100g' => 25,
                'difficulty_id' => $difficulties->where('name', 'Средне')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Средние (30-45 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Тыква')->first()->id, 'amount' => 500, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Морковь')->first()->id, 'amount' => 100, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Имбирь')->first()->id, 'amount' => 10, 'unit' => 'г'],
                ],
                'diet_types' => ['vegetarian', 'vegan', 'gluten-free'],
                'cooking_methods' => ['baking', 'boiling', 'blending'],
                'goals' => ['immunity', 'detox']
            ],
            // Основные блюда
            [
                'title' => 'Куриная грудка на гриле',
                'category_id' => $categories->where('name', 'Основные блюда')->first()->id,
                'description' => 'Диетическая куриная грудка с травами',
                'instructions' => 'Замариновать грудку, обжарить на гриле',
                'prep_time_minutes' => 30,
                'cook_time_minutes' => 20,
                'total_time_minutes' => 50,
                'servings' => 2,
                'serving_size' => '1 порция',
                'calories_per_100g' => 280,
                'protein_per_100g' => 45,
                'fat_per_100g' => 8,
                'carbs_per_100g' => 2,
                'difficulty_id' => $difficulties->where('name', 'Средне')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Средние (30-45 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Куриная грудка')->first()->id, 'amount' => 300, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Оливковое масло')->first()->id, 'amount' => 15, 'unit' => 'мл'],
                    ['ingredient_id' => $ingredients->where('name', 'Чеснок')->first()->id, 'amount' => 3, 'unit' => 'зубчика'],
                ],
                'diet_types' => ['high-protein', 'low-carb', 'keto'],
                'cooking_methods' => ['grilling'],
                'goals' => ['muscle-building', 'weight-loss']
            ],
            [
                'title' => 'Лосось на пару',
                'category_id' => $categories->where('name', 'Основные блюда')->first()->id,
                'description' => 'Нежный лосось с овощами на пару',
                'instructions' => 'Приготовить лосось и овощи на пару',
                'prep_time_minutes' => 10,
                'cook_time_minutes' => 15,
                'total_time_minutes' => 25,
                'servings' => 2,
                'serving_size' => '1 порция',
                'calories_per_100g' => 320,
                'protein_per_100g' => 38,
                'fat_per_100g' => 18,
                'carbs_per_100g' => 8,
                'difficulty_id' => $difficulties->where('name', 'Легко')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Быстрые (10-20 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Лосось')->first()->id, 'amount' => 250, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Брокколи')->first()->id, 'amount' => 150, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Морковь')->first()->id, 'amount' => 100, 'unit' => 'г'],
                ],
                'diet_types' => ['pescatarian', 'high-protein', 'omega-3'],
                'cooking_methods' => ['steaming'],
                'goals' => ['heart-health', 'brain-boosting']
            ],
            [
                'title' => 'Киноа с овощами',
                'category_id' => $categories->where('name', 'Основные блюда')->first()->id,
                'description' => 'Питательная киноа с сезонными овощами',
                'instructions' => 'Сварить киноа, обжарить овощи, смешать',
                'prep_time_minutes' => 15,
                'cook_time_minutes' => 25,
                'total_time_minutes' => 40,
                'servings' => 3,
                'serving_size' => '1 порция',
                'calories_per_100g' => 280,
                'protein_per_100g' => 12,
                'fat_per_100g' => 8,
                'carbs_per_100g' => 45,
                'difficulty_id' => $difficulties->where('name', 'Средне')->first()->id,
                'cooking_time_id' => $cookingTimes->where('name', 'Средние (30-45 мин.)')->first()->id,
                'is_active' => true,
                'ingredients' => [
                    ['ingredient_id' => $ingredients->where('name', 'Киноа')->first()->id, 'amount' => 150, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Цукини')->first()->id, 'amount' => 200, 'unit' => 'г'],
                    ['ingredient_id' => $ingredients->where('name', 'Перец болгарский')->first()->id, 'amount' => 150, 'unit' => 'г'],
                ],
                'diet_types' => ['vegetarian', 'vegan', 'gluten-free', 'high-fiber'],
                'cooking_methods' => ['boiling', 'frying'],
                'goals' => ['energy-boost', 'digestion']
            ]
        ];

        foreach ($recipes as $recipeData) {
            $ingredients = $recipeData['ingredients'];
            $dietTypes = $recipeData['diet_types'];
            $cookingMethods = $recipeData['cooking_methods'];
            $goals = $recipeData['goals'];

            unset($recipeData['ingredients'], $recipeData['diet_types'], $recipeData['cooking_methods'], $recipeData['goals']);

            $recipe = Recipe::create([
                ...$recipeData,
                'slug' => Str::slug($recipeData['title'])
            ]);

            // Создаем связи с ингредиентами
            foreach ($ingredients as $ingredientData) {
                RecipeIngredient::create([
                    'recipe_id' => $recipe->id,
                    'ingredient_id' => $ingredientData['ingredient_id'],
                    'amount' => $ingredientData['amount'],
                    'unit' => $ingredientData['unit']
                ]);
            }

            // Создаем связи с типами диет
            foreach ($dietTypes as $dietTypeSlug) {
                $dietType = $this->getDietTypeBySlug($dietTypeSlug);
                if ($dietType) {
                    RecipeDietType::create([
                        'recipe_id' => $recipe->id,
                        'diet_type_id' => $dietType->id
                    ]);
                }
            }

            // Создаем связи с методами приготовления
            foreach ($cookingMethods as $methodSlug) {
                $method = $this->getCookingMethodBySlug($methodSlug);
                if ($method) {
                    RecipeCookingMethod::create([
                        'recipe_id' => $recipe->id,
                        'cooking_method_id' => $method->id
                    ]);
                }
            }

            // Создаем связи с целями
            foreach ($goals as $goalSlug) {
                $goal = $this->getGoalBySlug($goalSlug);
                if ($goal) {
                    RecipeGoal::create([
                        'recipe_id' => $recipe->id,
                        'goal_id' => $goal->id
                    ]);
                }
            }
        }
    }

    private function getDietTypeBySlug($slug)
    {
        return DietType::where('slug', $slug)->first();
    }

    private function getCookingMethodBySlug($slug)
    {
        return CookingMethod::where('slug', $slug)->first();
    }

    private function getGoalBySlug($slug)
    {
        return Goal::where('slug', $slug)->first();
    }
}
