<!-- Hero Section -->
<section class="receipt-hero-section">
    <div class="receipt-hero-content">
        <h1 class="receipt-hero-title">Найдите идеальный рецепт</h1>
        <p class="receipt-hero-subtitle">Тысячи проверенных рецептов для здорового питания</p>

        <div class="receipt-hero-stats">
            <div class="receipt-stat-item">
                <span class="receipt-stat-number">{{ count($recipes) }}</span>
                <span class="receipt-stat-label">Рецептов</span>
            </div>
            <div class="receipt-stat-item">
                <span class="receipt-stat-number">{{ count($dietTypes) }}</span>
                <span class="receipt-stat-label">Типов питания</span>
            </div>
            <div class="receipt-stat-item">
                <span class="receipt-stat-number">{{ count($cookingMethods) }}</span>
                <span class="receipt-stat-label">Способов готовки</span>
            </div>
        </div>
    </div>

    <div class="receipt-hero-visual">
        <div class="receipt-floating-shapes">
            <div class="receipt-shape receipt-shape-1"></div>
            <div class="receipt-shape receipt-shape-2"></div>
            <div class="receipt-shape receipt-shape-3"></div>
        </div>
    </div>
</section>
