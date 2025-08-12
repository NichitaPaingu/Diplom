<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\RecipeService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function advices()
    {
        return view('advices');
    }

    public function recipes(Request $request, $category = 'breakfasts')
    {
        $recipeService = new RecipeService();
        $recipes = $recipeService->getRecipesByCategory($category, $request);

        // Получаем данные для фильтров
        $filterData = $recipeService->getFilterData();

        // Получаем все категории рецептов
        $categories = $recipeService->getAllCategories();
        // Получаем статистику
        $stats = $recipeService->getRecipesStats();

        // Получаем популярные рецепты для главной страницы
        $popularRecipes = $recipeService->getPopularRecipes();

        return view('recipes', compact(
            'recipes',
            'categories',
            'category',
            'stats',
            'popularRecipes'
        ))->with($filterData);
    }

    public function individuals()
    {
        return view('individuals');
    }

    public function template()
    {
        return view('template');
    }

    public function values()
    {
        return view('values');
    }

    public function subscription()
    {
        return view('subscription');
    }
}
