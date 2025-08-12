<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/advices', [PageController::class, 'advices'])->name('advices');

// Главная страница рецептов с поддержкой категорий
Route::get('/recipes', [PageController::class, 'recipes'])->name('recipes');

Route::get('/individuals', [PageController::class, 'individuals'])->name('individuals');
Route::get('/template', [PageController::class, 'template'])->name('template');
Route::get('/values', [PageController::class, 'values'])->name('values');
Route::get('/subscription', [PageController::class, 'subscription'])->name('subscription');
