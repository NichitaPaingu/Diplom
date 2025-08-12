<!-- Filters Sidebar -->
<aside class="receipt-filters-sidebar">
    <div class="receipt-filters-header">
        <h3>Фильтры</h3>
        <button type="button" id="clearFilters" class="receipt-clear-filters-btn">
            <i class="fas fa-times"></i>
            Очистить
        </button>
    </div>

    <form id="filtersForm">
        <!-- Тип питания -->
        <div class="receipt-filter-section">
            <div class="receipt-filter-section-header active" data-filter="diet-types">
                <h4 class="receipt-filter-title">
                    <i class="fas fa-leaf"></i>
                    Тип питания
                </h4>
                <i class="fas fa-chevron-down receipt-filter-toggle-icon"></i>
            </div>
            <div class="receipt-filter-options show">
                @foreach($dietTypes as $dietType)
                    <label class="receipt-filter-checkbox">
                        <input type="checkbox" name="diet_types[]" value="{{ $dietType->id }}" class="receipt-filter-input"
                            {{ in_array($dietType->id, request('diet_types', [])) ? 'checked' : '' }}>
                        <span class="receipt-checkmark"></span>
                        <span class="receipt-filter-label">{{ $dietType->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Способ готовки -->
        <div class="receipt-filter-section">
            <div class="receipt-filter-section-header" data-filter="cooking-methods">
                <h4 class="receipt-filter-title">
                    <i class="fas fa-utensils"></i>
                    Способ готовки
                </h4>
                <i class="fas fa-chevron-down receipt-filter-toggle-icon"></i>
            </div>
            <div class="receipt-filter-options">
                @foreach($cookingMethods as $method)
                    <label class="receipt-filter-checkbox">
                        <input type="checkbox" name="cooking_methods[]" value="{{ $method->id }}" class="receipt-filter-input"
                            {{ in_array($method->id, request('cooking_methods', [])) ? 'checked' : '' }}>
                        <span class="receipt-checkmark"></span>
                        <span class="receipt-filter-label">{{ $method->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Время готовки -->
        <div class="receipt-filter-section">
            <div class="receipt-filter-section-header" data-filter="cooking-time">
                <h4 class="receipt-filter-title">
                    <i class="fas fa-clock"></i>
                    Время готовки
                </h4>
                <i class="fas fa-chevron-down receipt-filter-toggle-icon"></i>
            </div>
            <div class="receipt-filter-options">
                @foreach($cookingTimes as $key => $time)
                    <label class="receipt-filter-radio">
                        <input type="radio" name="cooking_time" value="{{ $key }}" class="receipt-filter-input"
                            {{ request('cooking_time') == $key ? 'checked' : '' }}>
                        <span class="receipt-radio-mark"></span>
                        <span class="receipt-filter-label">{{ $time['name'] }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Цель -->
        <div class="receipt-filter-section">
            <div class="receipt-filter-section-header" data-filter="goals">
                <h4 class="receipt-filter-title">
                    <i class="fas fa-bullseye"></i>
                    Цель
                </h4>
                <i class="fas fa-chevron-down receipt-filter-toggle-icon"></i>
            </div>
            <div class="receipt-filter-options">
                @foreach($goals as $goal)
                    <label class="receipt-filter-checkbox">
                        <input type="checkbox" name="goals[]" value="{{ $goal->id }}" class="receipt-filter-input"
                            {{ in_array($goal->id, request('goals', [])) ? 'checked' : '' }}>
                        <span class="receipt-checkmark"></span>
                        <span class="receipt-filter-label">{{ $goal->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Сложность -->
        <div class="receipt-filter-section">
            <div class="receipt-filter-section-header" data-filter="difficulty">
                <h4 class="receipt-filter-title">
                    <i class="fas fa-signal"></i>
                    Сложность
                </h4>
                <i class="fas fa-chevron-down receipt-filter-toggle-icon"></i>
            </div>
            <div class="receipt-filter-options">
                @foreach($difficulties as $difficulty)
                    <label class="receipt-filter-checkbox">
                        <input type="checkbox" name="difficulty[]" value="{{ $difficulty->id }}" class="receipt-filter-input"
                            {{ in_array($difficulty->id, request('difficulty', [])) ? 'checked' : '' }}>
                        <span class="receipt-checkmark"></span>
                        <span class="receipt-filter-label">{{ $difficulty->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="receipt-apply-filters-btn">
            <i class="fas fa-search"></i>
            Применить фильтры
        </button>
    </form>
</aside>
