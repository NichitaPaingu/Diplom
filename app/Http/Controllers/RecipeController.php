<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Category;
use App\Models\DietType;
use App\Models\CookingMethod;
use App\Models\Goal;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::with(['ingredients', 'dietTypes', 'cookingMethods', 'goals']);

        // Фильтр по типу питания
        if ($request->has('diet_types') && is_array($request->diet_types)) {
            $query->whereHas('dietTypes', function ($q) use ($request) {
                $q->whereIn('diet_types.id', $request->diet_types);
            });
        }

        // Фильтр по способу готовки
        if ($request->has('cooking_methods') && is_array($request->cooking_methods)) {
            $query->whereHas('cookingMethods', function ($q) use ($request) {
                $q->whereIn('cooking_methods.id', $request->cooking_methods);
            });
        }

        // Фильтр по времени готовки
        if ($request->has('cooking_time')) {
            $query->where('cooking_time', $request->cooking_time);
        }

        // Фильтр по цели
        if ($request->has('goals') && is_array($request->goals)) {
            $query->whereHas('goals', function ($q) use ($request) {
                $q->whereIn('goals.id', $request->goals);
            });
        }

        // Фильтр по сложности
        if ($request->has('difficulty')) {
            $query->where('difficulty', $request->difficulty);
        }

        // Фильтр по категории (завтрак)
        $breakfastCategory = Category::where('slug', 'breakfasts')->first();
        if ($breakfastCategory) {
            $query->where('category_id', $breakfastCategory->id);
        }

        $recipes = $query->get();

        // Получаем данные для фильтров
        $dietTypes = DietType::all();
        $cookingMethods = CookingMethod::all();
        $goals = Goal::all();

        // Время готовки из конфига
        $cookingTimes = config('recipes.cooking_times');

        return view('recipes.breakfast', compact(
            'recipes',
            'dietTypes',
            'cookingMethods',
            'goals',
            'cookingTimes'
        ));
    }

    public function breakfast(Request $request)
    {
        return $this->index($request);
    }
}
