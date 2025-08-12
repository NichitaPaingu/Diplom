<!-- Recipe Card -->
<article class="receipt-recipe-card" data-recipe='{{ json_encode([
    "id" => $recipe->id,
    "title" => $recipe->title,
    "calories" => $recipe->calories_per_100g,
    "protein" => $recipe->protein_per_100g,
    "fat" => $recipe->fat_per_100g,
    "carbs" => $recipe->carbs_per_100g,
    "cooking_time" => $recipe->cookingTime ? $recipe->cookingTime->min_minutes : null,
    "difficulty" => $recipe->difficulty ? $recipe->difficulty->id : null,
    "diet_types" => $recipe->dietTypes->pluck("id")->toArray(),
    "cooking_methods" => $recipe->cookingMethods->pluck("id")->toArray(),
    "goals" => $recipe->goals->pluck("id")->toArray()
]) }}'>
    <div class="receipt-recipe-image">
        @if($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}">
        @else
            <div class="receipt-recipe-placeholder">
                <i class="fas fa-utensils"></i>
            </div>
        @endif

        <div class="receipt-recipe-overlay">
            <button type="button" class="receipt-recipe-favorite" data-recipe-id="{{ $recipe->id }}" title="В избранное">
                <i class="far fa-heart"></i>
            </button>
            <button type="button" class="receipt-recipe-share" title="Поделиться">
                <i class="fas fa-share-alt"></i>
            </button>
        </div>

        @if($recipe->cookingTime)
            <div class="receipt-recipe-badge">
                <div class="receipt-badge-time">
                    <i class="fas fa-clock"></i>
                    {{ $recipe->cookingTime->min_minutes }} мин
                </div>
            </div>
        @endif
    </div>

    <div class="receipt-recipe-info">
        <h3 class="receipt-recipe-title">{{ $recipe->title }}</h3>

        <div class="receipt-recipe-macros">
            <div class="receipt-macro protein">
                <i class="fas fa-dumbbell"></i>
                <span>{{ $recipe->protein_per_100g }}г белка</span>
            </div>
            <div class="receipt-macro fat">
                <i class="fas fa-fire"></i>
                <span>{{ $recipe->fat_per_100g }}г жиров</span>
            </div>
            <div class="receipt-macro carbs">
                <i class="fas fa-bread-slice"></i>
                <span>{{ $recipe->carbs_per_100g }}г углеводов</span>
            </div>
        </div>

        <div class="receipt-recipe-details">
            <div class="receipt-calories">
                <i class="fas fa-fire"></i>
                <span>{{ $recipe->calories_per_100g }} ккал на 100г</span>
            </div>
        </div>

        <div class="receipt-recipe-tags">
            @foreach($recipe->dietTypes as $dietType)
                <span class="receipt-tag">{{ $dietType->name }}</span>
            @endforeach
            @foreach($recipe->cookingMethods as $method)
                <span class="receipt-tag receipt-tag-cooking">{{ $method->name }}</span>
            @endforeach
        </div>

        <div class="receipt-recipe-actions">
            <button type="button" class="receipt-btn-view-recipe" onclick="viewRecipe({{ $recipe->id }})">
                <i class="fas fa-eye"></i>
                Посмотреть рецепт
            </button>
        </div>
    </div>
</article>
