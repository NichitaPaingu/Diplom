# CSS структура для секции Receipts

## Обзор

CSS файлы для страницы рецептов разделены на логические секции для лучшей организации и поддержки кода. Все CSS классы имеют приставку `receipt-` для избежания конфликтов.

## Структура файлов

### 1. `variables.css`

-   CSS переменные с приставкой `receipt-` (цвета, тени, переходы, радиусы)
-   Общие стили для контейнера (`.receipt-modern-container`)
-   Анимации (`receipt-float`)

### 2. `hero-section.css`

-   Hero секция с градиентным фоном (`.receipt-hero-section`)
-   Статистика рецептов (`.receipt-hero-stats`)
-   Анимированные фигуры (`.receipt-shape`)
-   Адаптивность для разных экранов

### 3. `filters-sidebar.css`

-   Боковая панель с фильтрами (`.receipt-filters-sidebar`)
-   Toggle функциональность (`.receipt-filter-section-header`)
-   Кастомные чекбоксы и радио-кнопки (`.receipt-checkmark`, `.receipt-radio-mark`)
-   Анимации открытия/закрытия

### 4. `recipes-header.css`

-   Заголовок страницы рецептов (`.receipt-recipes-header`)
-   Контролы сортировки и переключения вида (`.receipt-recipes-controls`)
-   Адаптивность

### 5. `recipe-cards.css`

-   Карточки рецептов (`.receipt-recipe-card`)
-   Изображения и placeholder'ы (`.receipt-recipe-image`)
-   Макронутриенты и теги (`.receipt-macro`, `.receipt-tag`)
-   Hover эффекты и анимации

### 6. `premium-recipe.css`

-   Стили для премиум рецептов (`.receipt-premium-recipe`)
-   Overlay с информацией о подписке (`.receipt-premium-overlay`)
-   Кнопка оформления подписки (`.receipt-subscribe-btn`)

### 7. `list-view.css`

-   Стили для списка рецептов (`.receipt-recipes-list`)
-   Layout страницы (`.receipt-recipes-page`)
-   Адаптивная сетка
-   Сообщение "Рецепты не найдены" (`.receipt-no-recipes`)

### 8. `notifications-modal.css`

-   Система уведомлений (`.receipt-notification`)
-   Модальные окна (`.receipt-modal`)
-   Анимации появления/исчезновения

### 9. `main.css`

-   Главный файл, импортирующий все секции

## Blade шаблоны (Partials)

### Структура папок:

```
resources/views/recipes/
├── recipes.blade.php (основной файл)
└── partials/
    ├── hero-section.blade.php
    ├── filters-sidebar.blade.php
    ├── recipes-header.blade.php
    ├── recipe-card.blade.php
    ├── notifications.blade.php
    └── scripts.blade.php
```

### Использование в основном файле:

```blade
<x-app-layout>
    <div class="receipt-modern-container">
        @include('recipes.partials.hero-section')

        <div class="receipt-recipes-page">
            @include('recipes.partials.filters-sidebar')

            <main class="receipt-recipes-content">
                @include('recipes.partials.recipes-header')

                <div class="receipt-recipes-grid" id="recipesContainer">
                    @forelse($recipes as $recipe)
                        @include('recipes.partials.recipe-card', ['recipe' => $recipe])
                    @empty
                        <!-- No recipes message -->
                    @endforelse
                </div>
            </main>
        </div>
    </div>

    @include('recipes.partials.notifications')
    @include('recipes.partials.scripts')
</x-app-layout>
```

## Особенности

### Toggle фильтры

-   Первая секция (Тип питания) открыта по умолчанию
-   Остальные секции закрыты
-   При клике на заголовок секция открывается, остальные закрываются
-   Плавные анимации открытия/закрытия

### Приставка `receipt-`

Все CSS классы имеют приставку `receipt-` для избежания конфликтов:

-   `.receipt-hero-section`
-   `.receipt-filter-section`
-   `.receipt-recipe-card`
-   `.receipt-recipes-grid`
-   И так далее...

### Адаптивность

-   Мобильная версия с перестроением layout
-   Фильтры перемещаются под контент на маленьких экранах
-   Адаптивная сетка карточек рецептов

### Анимации

-   Hover эффекты для карточек
-   Плавные переходы для всех интерактивных элементов
-   Анимированные фигуры в hero секции

## Использование

1. Убедитесь, что все CSS файлы находятся в папке `resources/css/receipts/`
2. Основной файл `main.css` импортирует все секции
3. В `app.css` добавлен импорт `receipts/main.css`
4. Все стили автоматически применяются к странице рецептов
5. Используйте `@include` для подключения частичных шаблонов

## Кастомизация

Для изменения цветовой схемы отредактируйте переменные в `variables.css`:

```css
:root {
    --receipt-primary-color: #ff6b35;
    --receipt-secondary-color: #4ecdc4;
    /* ... другие цвета */
}
```

## Преимущества новой структуры

1. **Модульность**: Каждый компонент в отдельном файле
2. **Переиспользование**: Частичные шаблоны можно использовать в других местах
3. **Поддержка**: Легче находить и исправлять ошибки
4. **Масштабируемость**: Просто добавлять новые компоненты
5. **Изоляция**: CSS классы с приставкой не конфликтуют с другими стилями
