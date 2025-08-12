
    let allRecipes = [];
    let filteredRecipes = [];
    let currentView = 'grid';

    // Инициализация при загрузке страницы
    document.addEventListener('DOMContentLoaded', function() {
        initializeRecipes();
        initializeFilters();
        initializeSorting();
        initializeViewToggle();
        initializeFavorites();
    });

    // Инициализация рецептов
    function initializeRecipes() {
        const recipeCards = document.querySelectorAll('.receipt-recipe-card:not(.receipt-premium-recipe)');
        allRecipes = Array.from(recipeCards).map(card => {
            const data = JSON.parse(card.dataset.recipe);
            return {
                element: card,
                data: data
            };
        });
        filteredRecipes = [...allRecipes];
        updateRecipesCount();
    }

    // Инициализация фильтров
    function initializeFilters() {
        const filterInputs = document.querySelectorAll('.receipt-filter-input');
        filterInputs.forEach(input => {
            input.addEventListener('change', function() {
                // Автоматическое применение фильтров при изменении
                setTimeout(applyFilters, 100);
            });
        });

        // Очистка фильтров
        document.getElementById('clearFilters').addEventListener('click', clearAllFilters);

        // Инициализация toggle фильтров
        initializeFilterToggles();
    }

    // Инициализация toggle фильтров
    function initializeFilterToggles() {
        const filterHeaders = document.querySelectorAll('.receipt-filter-section-header');

        filterHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const filterSection = this.closest('.receipt-filter-section');
                const filterOptions = filterSection.querySelector('.receipt-filter-options');
                const isActive = this.classList.contains('active');

                // Закрываем все фильтры
                filterHeaders.forEach(h => {
                    h.classList.remove('active');
                    h.closest('.receipt-filter-section').querySelector('.receipt-filter-options').classList.remove('show');
                });

                // Если фильтр был неактивен, открываем его
                if (!isActive) {
                    this.classList.add('active');
                    filterOptions.classList.add('show');
                }
            });
        });
    }

    // Применение фильтров
    function applyFilters() {
        const form = document.getElementById('filtersForm');
        const formData = new FormData(form);

        // Создаем объект с параметрами фильтров
        const filters = {
            diet_types: formData.getAll('diet_types[]'),
            cooking_methods: formData.getAll('cooking_methods[]'),
            cooking_time: formData.get('cooking_time'),
            goals: formData.getAll('goals[]'),
            difficulty: formData.getAll('difficulty[]')
        };

        // Фильтруем рецепты
        filteredRecipes = allRecipes.filter(recipe => {
            return matchesFilters(recipe.data, filters);
        });

        // Обновляем отображение
        updateRecipesDisplay();
        updateRecipesCount();
        updateURL(filters);
    }

    // Проверка соответствия рецепта фильтрам
    function matchesFilters(recipe, filters) {
        // Фильтр по типу питания
        if (filters.diet_types.length > 0) {
            const hasMatchingDietType = filters.diet_types.some(dietTypeId =>
                recipe.diet_types.includes(parseInt(dietTypeId))
            );
            if (!hasMatchingDietType) return false;
        }

        // Фильтр по способу готовки
        if (filters.cooking_methods && filters.cooking_methods.length > 0) {
            const hasMatchingCookingMethod = filters.cooking_methods.some(methodId =>
                recipe.cooking_methods.includes(parseInt(methodId))
            );
            if (!hasMatchingCookingMethod) return false;
        }

        // Фильтр по цели
        if (filters.goals.length > 0) {
            const hasMatchingGoal = filters.goals.some(goalId =>
                recipe.goals.includes(parseInt(goalId))
            );
            if (!hasMatchingGoal) return false;
        }

        // Фильтр по времени готовки
        if (filters.cooking_time && recipe.cooking_time !== parseInt(filters.cooking_time)) {
            return false;
        }

        // Фильтр по сложности
        if (filters.difficulty && filters.difficulty.length > 0) {
            const hasMatchingDifficulty = filters.difficulty.some(difficultyId =>
                recipe.difficulty === parseInt(difficultyId)
            );
            if (!hasMatchingDifficulty) return false;
        }

        return true;
    }

    // Обновление отображения рецептов
    function updateRecipesDisplay() {
        const container = document.getElementById('recipesContainer');

        // Скрываем все рецепты
        allRecipes.forEach(recipe => {
            recipe.element.style.display = 'none';
        });

        // Показываем отфильтрованные
        filteredRecipes.forEach(recipe => {
            recipe.element.style.display = 'block';
        });

        // Применяем текущий вид отображения
        applyViewMode();
    }

    // Очистка всех фильтров
    function clearAllFilters() {
        const form = document.getElementById('filtersForm');
        const inputs = form.querySelectorAll('input');

        inputs.forEach(input => {
            if (input.type === 'checkbox') {
                input.checked = false;
            } else if (input.type === 'radio') {
                input.checked = false;
            }
        });

        // Сбрасываем фильтры
        filteredRecipes = [...allRecipes];
        updateRecipesDisplay();
        updateRecipesCount();
        updateURL({});
    }

    // Инициализация сортировки
    function initializeSorting() {
        // Инициализация кастомного dropdown
        initializeCustomDropdown();
    }

    // Инициализация кастомного dropdown
    function initializeCustomDropdown() {
        const $dropdown = document.querySelector('.receipt-custom-dropdown');
        const $trigger = $dropdown.querySelector('.receipt-dropdown-trigger');
        const $menu = $dropdown.querySelector('.receipt-dropdown-menu');
        const $options = $dropdown.querySelectorAll('.receipt-dropdown-option');
        const $text = $dropdown.querySelector('.receipt-dropdown-text');

        // Устанавливаем начальное значение
        const initialValue = $trigger.dataset.value;
        const initialOption = Array.from($options).find(opt => opt.dataset.value === initialValue);
        if (initialOption) {
            initialOption.classList.add('selected');
        }

        // Обработчик клика по триггеру
        $trigger.addEventListener('click', function(e) {
            e.stopPropagation();
            toggleDropdown();
        });

        // Обработчики клика по опциям
        $options.forEach(option => {
            option.addEventListener('click', function(e) {
                e.stopPropagation();
                selectOption(this);
            });
        });

        // Закрытие по клику вне dropdown
        document.addEventListener('click', function(e) {
            if (!$dropdown.contains(e.target)) {
                closeDropdown();
            }
        });

        // Клавиатурная навигация
        $trigger.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                toggleDropdown();
            } else if (e.key === 'Escape') {
                closeDropdown();
            }
        });

        // Навигация по стрелкам
        $menu.addEventListener('keydown', function(e) {
            const currentOption = $menu.querySelector('.receipt-dropdown-option.selected');
            let nextOption = null;

            switch (e.key) {
                case 'ArrowDown':
                    e.preventDefault();
                    nextOption = currentOption?.nextElementSibling || $options[0];
                    break;
                case 'ArrowUp':
                    e.preventDefault();
                    nextOption = currentOption?.previousElementSibling || $options[$options.length - 1];
                    break;
                case 'Enter':
                case ' ':
                    e.preventDefault();
                    if (currentOption) {
                        selectOption(currentOption);
                    }
                    break;
                case 'Escape':
                    closeDropdown();
                    $trigger.focus();
                    break;
            }

            if (nextOption) {
                highlightOption(nextOption);
            }
        });

        // Функции управления dropdown
        function toggleDropdown() {
            if ($menu.classList.contains('show')) {
                closeDropdown();
            } else {
                openDropdown();
            }
        }

        function openDropdown() {
            $menu.classList.add('show');
            $trigger.classList.add('active');
            $trigger.setAttribute('aria-expanded', 'true');

            // Фокус на первую опцию
            const firstOption = $options[0];
            if (firstOption) {
                highlightOption(firstOption);
            }
        }

        function closeDropdown() {
            $menu.classList.remove('show');
            $trigger.classList.remove('active');
            $trigger.setAttribute('aria-expanded', 'false');

            // Убираем выделение со всех опций
            $options.forEach(option => {
                option.classList.remove('highlighted');
            });
        }

        function selectOption(option) {
            // Убираем выделение со всех опций
            $options.forEach(opt => {
                opt.classList.remove('selected', 'highlighted');
            });

            // Выделяем выбранную опцию
            option.classList.add('selected');

            // Обновляем текст триггера
            $text.textContent = option.textContent;

            // Обновляем значение в data-атрибуте
            $trigger.dataset.value = option.dataset.value;

            // Закрываем dropdown
            closeDropdown();

            // Фокус на триггер
            $trigger.focus();

            // Вызываем сортировку
            sortRecipes(option.dataset.value);
        }

        function highlightOption(option) {
            // Убираем выделение со всех опций
            $options.forEach(opt => {
                opt.classList.remove('highlighted');
            });

            // Выделяем текущую опцию
            option.classList.add('highlighted');

            // Прокручиваем к опции если нужно
            option.scrollIntoView({ block: 'nearest' });
        }
    }

    // Сортировка рецептов
    function sortRecipes(sortBy) {
        filteredRecipes.sort((a, b) => {
            switch(sortBy) {
                case 'newest':
                    return b.data.id - a.data.id;
                case 'popular':
                    // Здесь можно добавить логику популярности
                    return 0;
                case 'calories':
                    return a.data.calories - b.data.calories;
                case 'protein':
                    return b.data.protein - a.data.protein;
                case 'name':
                    return a.data.title.localeCompare(b.data.title);
                default:
                    return 0;
            }
        });

        updateRecipesDisplay();
    }

    // Инициализация переключения вида
    function initializeViewToggle() {
        const viewBtns = document.querySelectorAll('.receipt-view-btn');
        viewBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const view = this.dataset.view;
                setViewMode(view);
            });
        });
    }

    // Установка режима отображения
    function setViewMode(view) {
        currentView = view;

        // Обновляем активную кнопку
        document.querySelectorAll('.receipt-view-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.view === view);
        });

        // Применяем стили
        applyViewMode();
    }

    // Применение режима отображения
    function applyViewMode() {
        const container = document.getElementById('recipesContainer');
        container.className = `receipt-recipes-${currentView}`;
    }

    // Инициализация избранного
    function initializeFavorites() {
        // Загружаем избранное из localStorage
        loadFavorites();

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('receipt-recipe-favorite')) {
                toggleFavorite(e.target);
            } else if (e.target.classList.contains('receipt-recipe-share')) {
                shareRecipe(e.target);
            }
        });
    }

    // Загрузка избранного
    function loadFavorites() {
        const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        favorites.forEach(recipeId => {
            const button = document.querySelector(`[data-recipe-id="${recipeId}"]`);
            if (button) {
                button.innerHTML = '<i class="fas fa-heart"></i>';
                button.classList.add('favorited');
            }
        });
    }

    // Шаринг рецепта
    function shareRecipe(button) {
        const recipeCard = button.closest('.receipt-recipe-card');
        const recipeTitle = recipeCard.querySelector('.receipt-recipe-title').textContent;
        const recipeUrl = window.location.href;

        if (navigator.share) {
            navigator.share({
                title: recipeTitle,
                url: recipeUrl
            });
        } else {
            // Fallback для браузеров без поддержки Web Share API
            const shareText = `${recipeTitle}\n${recipeUrl}`;
            navigator.clipboard.writeText(shareText).then(() => {
                showNotification('Ссылка скопирована в буфер обмена');
            });
        }
    }

    // Переключение избранного
    function toggleFavorite(button) {
        const recipeId = button.dataset.recipeId;
        const isFavorite = button.querySelector('i').classList.contains('fas');

        if (isFavorite) {
            button.innerHTML = '<i class="far fa-heart"></i>';
            button.classList.remove('favorited');
            // Удаляем из избранного
            removeFromFavorites(recipeId);
        } else {
            button.innerHTML = '<i class="fas fa-heart"></i>';
            button.classList.add('favorited');
            // Добавляем в избранное
            addToFavorites(recipeId);
        }
    }

    // Добавление в избранное
    function addToFavorites(recipeId) {
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        if (!favorites.includes(recipeId)) {
            favorites.push(recipeId);
            localStorage.setItem('favorites', JSON.stringify(favorites));
            showNotification('Рецепт добавлен в избранное');
        }
    }

    // Удаление из избранного
    function removeFromFavorites(recipeId) {
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        favorites = favorites.filter(id => id !== recipeId);
        localStorage.setItem('favorites', JSON.stringify(favorites));
        showNotification('Рецепт удален из избранного');
    }

    // Просмотр рецепта
    function viewRecipe(recipeId) {
        // Здесь можно загрузить детали рецепта через AJAX
        showNotification('Функция просмотра рецепта в разработке');
    }

    // Обновление счетчика рецептов
    function updateRecipesCount() {
        const countElement = document.getElementById('recipesCount');
        countElement.textContent = `${filteredRecipes.length} рецептов`;
    }

    // Обновление URL
    function updateURL(filters) {
        const params = new URLSearchParams();

        Object.entries(filters).forEach(([key, value]) => {
            if (Array.isArray(value) && value.length > 0) {
                value.forEach(v => params.append(key, v));
            } else if (value) {
                params.append(key, value);
            }
        });

        const newURL = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
        window.history.pushState({}, '', newURL);
    }

    // Показ уведомлений
    function showNotification(message) {
        const container = document.getElementById('notificationContainer');
        const notification = document.createElement('div');
        notification.className = 'receipt-notification';
        notification.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        `;

        container.appendChild(notification);

        // Анимация появления
        setTimeout(() => notification.classList.add('show'), 100);

        // Автоматическое скрытие
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Модальное окно
    const modal = document.getElementById('recipeModal');
    const closeBtn = document.querySelector('.receipt-close');

    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
