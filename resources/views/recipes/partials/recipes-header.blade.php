<!-- Recipes Header -->
<div class="receipt-recipes-header">
    <div class="receipt-recipes-info">
        <h2 class="receipt-recipes-title">Все рецепты</h2>
        <span class="receipt-recipes-count" id="recipesCount">{{ count($recipes) }} рецептов</span>
    </div>
    <div class="receipt-recipes-controls">
        <div class="receipt-sort-control">
            <label class="receipt-sort-label">Сортировка:</label>
            <div class="receipt-custom-dropdown">
                <div class="receipt-dropdown-trigger" data-value="newest">
                    <span class="receipt-dropdown-text">Сначала новые</span>
                    <div class="receipt-dropdown-arrow"></div>
                </div>
                <div class="receipt-dropdown-menu">
                    <div class="receipt-dropdown-option" data-value="newest">Сначала новые</div>
                    <div class="receipt-dropdown-option" data-value="popular">По популярности</div>
                    <div class="receipt-dropdown-option" data-value="calories">По калориям</div>
                    <div class="receipt-dropdown-option" data-value="protein">По белкам</div>
                    <div class="receipt-dropdown-option" data-value="name">По названию</div>
                </div>
            </div>
        </div>
        <div class="receipt-view-toggle">
            <button type="button" class="receipt-view-btn active" data-view="grid" title="Сетка">
                <i class="fas fa-th"></i>
            </button>
            <button type="button" class="receipt-view-btn" data-view="list" title="Список">
                <i class="fas fa-list"></i>
            </button>
        </div>
    </div>
</div>
