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
                        <div class="receipt-no-recipes">
                            <div class="receipt-no-recipes-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <h3>Рецепты не найдены</h3>
                            <p>Попробуйте изменить параметры фильтрации</p>
                        </div>
                    @endforelse
                </div>
            </main>
        </div>
    </div>

    @include('recipes.partials.notifications')
</x-app-layout>
