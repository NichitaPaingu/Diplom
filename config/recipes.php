<?php

return [
    'defaults' => [
        'servings' => 1,
        'serving_size' => '100 грамм',
        'prep_time' => 10,
        'cook_time' => 20,
    ],

    'nutrition' => [
        'units' => [
            'calories' => 'ккал',
            'protein' => 'г',
            'fat' => 'г',
            'carbs' => 'г',
        ],
    ],

    'difficulty_levels' => [
        'beginner' => [
            'name' => 'Начинающий',
            'slug' => 'beginner',
            'level' => 1,
            'color' => '#28a745',
            'description' => 'Очень простые рецепты для новичков',
        ],
        'easy' => [
            'name' => 'Легко',
            'slug' => 'easy',
            'level' => 2,
            'color' => '#20c997',
            'description' => 'Простые рецепты для начинающих',
        ],
        'medium' => [
            'name' => 'Средне',
            'slug' => 'medium',
            'level' => 3,
            'color' => '#ffc107',
            'description' => 'Рецепты средней сложности',
        ],
        'intermediate' => [
            'name' => 'Продвинутый',
            'slug' => 'intermediate',
            'level' => 4,
            'color' => '#fd7e14',
            'description' => 'Рецепты для опытных кулинаров',
        ],
        'hard' => [
            'name' => 'Сложно',
            'slug' => 'hard',
            'level' => 5,
            'color' => '#dc3545',
            'description' => 'Сложные рецепты для профессионалов',
        ],
        'expert' => [
            'name' => 'Эксперт',
            'slug' => 'expert',
            'level' => 6,
            'color' => '#6f42c1',
            'description' => 'Экспертные рецепты высокой сложности',
        ],
    ],

    'cooking_times' => [
        'ultra-fast' => [
            'name' => 'Ультра-быстрые (5-10 мин.)',
            'slug' => 'ultra-fast',
            'min_minutes' => 5,
            'max_minutes' => 10,
        ],
        'fast' => [
            'name' => 'Быстрые (10-20 мин.)',
            'slug' => 'fast',
            'min_minutes' => 10,
            'max_minutes' => 20,
        ],
        'medium-fast' => [
            'name' => 'Средне-быстрые (20-30 мин.)',
            'slug' => 'medium-fast',
            'min_minutes' => 20,
            'max_minutes' => 30,
        ],
        'medium' => [
            'name' => 'Средние (30-45 мин.)',
            'slug' => 'medium',
            'min_minutes' => 30,
            'max_minutes' => 45,
        ],
        'medium-long' => [
            'name' => 'Средне-долгие (45-60 мин.)',
            'slug' => 'medium-long',
            'min_minutes' => 45,
            'max_minutes' => 60,
        ],
        'long' => [
            'name' => 'Долгие (1-2 часа)',
            'slug' => 'long',
            'min_minutes' => 60,
            'max_minutes' => 120,
        ],
        'very-long' => [
            'name' => 'Очень долгие (2+ часа)',
            'slug' => 'very-long',
            'min_minutes' => 120,
            'max_minutes' => null,
        ],
    ],

    'cuisines' => [
        'russian' => [
            'name' => 'Русская кухня',
            'slug' => 'russian',
            'description' => 'Традиционные русские блюда',
            'color' => '#dc3545',
        ],
        'italian' => [
            'name' => 'Итальянская кухня',
            'slug' => 'italian',
            'description' => 'Классические итальянские блюда',
            'color' => '#28a745',
        ],
        'mediterranean' => [
            'name' => 'Средиземноморская кухня',
            'slug' => 'mediterranean',
            'description' => 'Здоровые блюда Средиземноморья',
            'color' => '#007bff',
        ],
        'asian' => [
            'name' => 'Азиатская кухня',
            'slug' => 'asian',
            'description' => 'Блюда стран Азии',
            'color' => '#fd7e14',
        ],
        'mexican' => [
            'name' => 'Мексиканская кухня',
            'slug' => 'mexican',
            'description' => 'Острые мексиканские блюда',
            'color' => '#ffc107',
        ],
        'indian' => [
            'name' => 'Индийская кухня',
            'slug' => 'indian',
            'description' => 'Ароматные индийские блюда',
            'color' => '#6f42c1',
        ],
        'french' => [
            'name' => 'Французская кухня',
            'slug' => 'french',
            'description' => 'Изысканная французская кухня',
            'color' => '#e83e8c',
        ],
        'greek' => [
            'name' => 'Греческая кухня',
            'slug' => 'greek',
            'description' => 'Традиционная греческая кухня',
            'color' => '#20c997',
        ],
        'thai' => [
            'name' => 'Тайская кухня',
            'slug' => 'thai',
            'description' => 'Острая тайская кухня',
            'color' => '#fd7e14',
        ],
        'japanese' => [
            'name' => 'Японская кухня',
            'slug' => 'japanese',
            'description' => 'Традиционная японская кухня',
            'color' => '#dc3545',
        ],
    ],

    'seasons' => [
        'spring' => [
            'name' => 'Весна',
            'slug' => 'spring',
            'description' => 'Весенние блюда',
            'color' => '#28a745',
        ],
        'summer' => [
            'name' => 'Лето',
            'slug' => 'summer',
            'description' => 'Летние блюда',
            'color' => '#ffc107',
        ],
        'autumn' => [
            'name' => 'Осень',
            'slug' => 'autumn',
            'description' => 'Осенние блюда',
            'color' => '#fd7e14',
        ],
        'winter' => [
            'name' => 'Зима',
            'slug' => 'winter',
            'description' => 'Зимние блюда',
            'color' => '#6c757d',
        ],
        'all-year' => [
            'name' => 'Круглый год',
            'slug' => 'all-year',
            'description' => 'Блюда для любого времени года',
            'color' => '#007bff',
        ],
    ],

    'subscription_levels' => [
        'basic' => 'Базовый',
        'optimal' => 'Оптимальный',
        'premium' => 'Премиум',
    ],

    'meal_types' => [
        'breakfast' => [
            'name' => 'Завтрак',
            'slug' => 'breakfast',
            'description' => 'Утренние блюда',
            'icon' => 'fa-sun',
        ],
        'brunch' => [
            'name' => 'Бранч',
            'slug' => 'brunch',
            'description' => 'Поздний завтрак',
            'icon' => 'fa-coffee',
        ],
        'lunch' => [
            'name' => 'Обед',
            'slug' => 'lunch',
            'description' => 'Дневные блюда',
            'icon' => 'fa-utensils',
        ],
        'dinner' => [
            'name' => 'Ужин',
            'slug' => 'dinner',
            'description' => 'Вечерние блюда',
            'icon' => 'fa-moon',
        ],
        'snack' => [
            'name' => 'Перекус',
            'slug' => 'snack',
            'description' => 'Легкие перекусы',
            'icon' => 'fa-apple-alt',
        ],
        'dessert' => [
            'name' => 'Десерт',
            'slug' => 'dessert',
            'description' => 'Сладкие блюда',
            'icon' => 'fa-ice-cream',
        ],
        'appetizer' => [
            'name' => 'Закуска',
            'slug' => 'appetizer',
            'description' => 'Легкие закуски',
            'icon' => 'fa-cheese',
        ],
        'soup' => [
            'name' => 'Супы',
            'slug' => 'soup',
            'description' => 'Первые блюда',
            'icon' => 'fa-mug-hot',
        ],
        'salad' => [
            'name' => 'Салаты',
            'slug' => 'salad',
            'description' => 'Свежие салаты',
            'icon' => 'fa-leaf',
        ],
        'main-course' => [
            'name' => 'Основное блюдо',
            'slug' => 'main-course',
            'description' => 'Главные блюда',
            'icon' => 'fa-drumstick-bite',
        ],
        'side-dish' => [
            'name' => 'Гарнир',
            'slug' => 'side-dish',
            'description' => 'Дополнительные блюда',
            'icon' => 'fa-carrot',
        ],
        'beverage' => [
            'name' => 'Напитки',
            'slug' => 'beverage',
            'description' => 'Различные напитки',
            'icon' => 'fa-glass-whiskey',
        ],
    ],
];
