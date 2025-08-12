<?php

namespace App\Services;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\DietType;
use App\Models\CookingMethod;
use App\Models\CookingTime;
use App\Models\Goal;
use App\Models\Difficulty;
use Illuminate\Http\Request;

class RecipeService
{
    /**
     * Получить рецепты по категории с фильтрами
     */
    public function getRecipesByCategory(string $categorySlug, Request $request = null)
    {
        $query = Recipe::with(['ingredients', 'dietTypes', 'cookingMethods', 'goals', 'cookingTime', 'difficulty', 'category']);

        // Фильтр по категории
        $category = Category::where('slug', $categorySlug)->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }

        // Применяем фильтры если они есть
        if ($request) {
            $this->applyFilters($query, $request);
        }

        return $query->get();
    }

    /**
     * Получить все категории рецептов
     */
    public function getAllCategories()
    {
        return Category::all();
    }

    /**
     * Получить данные для фильтров
     */
    public function getFilterData()
    {
        return [
            'dietTypes' => DietType::active()->ordered()->get(),
            'cookingMethods' => CookingMethod::active()->ordered()->get(),
            'goals' => Goal::active()->ordered()->get(),
            'cookingTimes' => CookingTime::active()->ordered()->get(),
            'difficulties' => Difficulty::active()->ordered()->get(),
        ];
    }

    /**
     * Применить фильтры к запросу
     */
    private function applyFilters($query, Request $request)
    {
        // Фильтр по типу питания
        if ($request->has('diet_types') && is_array($request->diet_types) && !empty($request->diet_types)) {
            $query->whereHas('dietTypes', function ($q) use ($request) {
                $q->whereIn('diet_types.id', $request->diet_types);
            });
        }

        // Фильтр по способу готовки
        if ($request->has('cooking_methods') && is_array($request->cooking_methods) && !empty($request->cooking_methods)) {
            $query->whereHas('cookingMethods', function ($q) use ($request) {
                $q->whereIn('cooking_methods.id', $request->cooking_methods);
            });
        }

        // Фильтр по времени готовки
        if ($request->has('cooking_time') && $request->cooking_time && $request->cooking_time !== '') {
            $query->where('cooking_time_id', $request->cooking_time);
        }

        // Фильтр по цели
        if ($request->has('goals') && is_array($request->goals) && !empty($request->goals)) {
            $query->whereHas('goals', function ($q) use ($request) {
                $q->whereIn('goals.id', $request->goals);
            });
        }

        // Фильтр по сложности
        if ($request->has('difficulty') && is_array($request->difficulty) && !empty($request->difficulty)) {
            $query->whereIn('difficulty_id', $request->difficulty);
        }
    }

    /**
     * Получить статистику по рецептам
     */
    public function getRecipesStats()
    {
        return [
            'total' => Recipe::count(),
            'byCategory' => Category::withCount('recipes')->get()->pluck('recipes_count', 'name'),
        ];
    }

    /**
     * Получить популярные рецепты
     */
    public function getPopularRecipes($limit = 6)
    {
        return Recipe::with(['dietTypes', 'goals'])
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
