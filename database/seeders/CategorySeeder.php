<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Завтраки',
                'slug' => 'breakfasts',
                'description' => 'Рецепты для начала дня',
                'icon' => 'fa-sun',
                'sort_order' => 1,
            ],
            [
                'name' => 'Супы',
                'slug' => 'soups',
                'description' => 'Первые блюда',
                'icon' => 'fa-utensils',
                'sort_order' => 2,
            ],
            [
                'name' => 'Основные блюда',
                'slug' => 'main-dishes',
                'description' => 'Основные приемы пищи',
                'icon' => 'fa-drumstick-bite',
                'sort_order' => 3,
            ],
            [
                'name' => 'Салаты',
                'slug' => 'salads',
                'description' => 'Свежие и легкие блюда',
                'icon' => 'fa-leaf',
                'sort_order' => 4,
            ],
            [
                'name' => 'Десерты',
                'slug' => 'desserts',
                'description' => 'Сладкие завершения трапезы',
                'icon' => 'fa-birthday-cake',
                'sort_order' => 5,
            ],
            [
                'name' => 'Напитки',
                'slug' => 'beverages',
                'description' => 'Полезные напитки',
                'icon' => 'fa-glass-whiskey',
                'sort_order' => 6,
            ],
            [
                'name' => 'Закуски',
                'slug' => 'snacks',
                'description' => 'Легкие перекусы',
                'icon' => 'fa-cheese',
                'sort_order' => 7,
            ],
            [
                'name' => 'Овощи',
                'slug' => 'vegetables',
                'description' => 'Свежие и полезные овощи',
                'icon' => 'fa-carrot',
                'sort_order' => 8,
            ],
            [
                'name' => 'Фрукты',
                'slug' => 'fruits',
                'description' => 'Свежие и полезные фрукты',
                'icon' => 'fa-apple-alt',
                'sort_order' => 9,
            ],
            [
                'name' => 'Мясо и птица',
                'slug' => 'meat-poultry',
                'description' => 'Источники животного белка',
                'icon' => 'fa-drumstick-bite',
                'sort_order' => 10,
            ],
            [
                'name' => 'Рыба и морепродукты',
                'slug' => 'fish-seafood',
                'description' => 'Морские источники белка',
                'icon' => 'fa-fish',
                'sort_order' => 11,
            ],
            [
                'name' => 'Молочные продукты',
                'slug' => 'dairy',
                'description' => 'Молочные источники белка',
                'icon' => 'fa-cheese',
                'sort_order' => 12,
            ],
            [
                'name' => 'Крупы и злаки',
                'slug' => 'grains-cereals',
                'description' => 'Источники сложных углеводов',
                'icon' => 'fa-wheat-awn',
                'sort_order' => 13,
            ],
            [
                'name' => 'Бобовые',
                'slug' => 'legumes',
                'description' => 'Растительные источники белка',
                'icon' => 'fa-seedling',
                'sort_order' => 14,
            ],
            [
                'name' => 'Орехи и семена',
                'slug' => 'nuts-seeds',
                'description' => 'Источники полезных жиров',
                'icon' => 'fa-acorn',
                'sort_order' => 15,
            ],
            [
                'name' => 'Масла и жиры',
                'slug' => 'oils-fats',
                'description' => 'Источники полезных жиров',
                'icon' => 'fa-oil-can',
                'sort_order' => 16,
            ],
            [
                'name' => 'Специи и травы',
                'slug' => 'spices-herbs',
                'description' => 'Ароматические добавки',
                'icon' => 'fa-leaf',
                'sort_order' => 17,
            ],
            [
                'name' => 'Суперфуды',
                'slug' => 'superfoods',
                'description' => 'Продукты с высокой питательной ценностью',
                'icon' => 'fa-star',
                'sort_order' => 18,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
