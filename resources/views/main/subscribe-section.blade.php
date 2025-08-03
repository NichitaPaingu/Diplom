<section class="subscribe-section" aria-labelledby="subscribe-title">
    <div class="subscribe-content">
        <div class="subscribe-text-block">
            <h2 class="subscribe-title" id="subscribe-title">Скорее подпишись</h2>
            <p class="subscribe-desc">
                Оформи подписку прямо сейчас и открой доступ к более чем 100 эксклюзивным рецептам, которые недоступны на бесплатном тарифе!<br><br>
                Открой для себя новые вкусы, кулинарные техники и вдохновение для каждого дня.
            </p>
            <button class="subscribe-btn" type="button" aria-label="Оформить подписку на премиум рецепты">
                <span class="btn-text">Оформить подписку</span>
                <span class="btn-icon" aria-hidden="true">→</span>
            </button>
        </div>
        <div class="subscribe-images-grid" role="img" aria-label="Галерея блюд из премиум рецептов">
            @php
                $images = [
                    'dish-1.png',
                    'dish-2.png',
                    'dish-3.png',
                    'dish-4.png',
                    'dish-5.png',
                    'dish-6.png',
                    'dish-7.png',
                    'dish-8.png',
                    'dish-9.png',
                ];
            @endphp
            @foreach ($images as $image)
                <img src="{{ asset('storage/subscribe-section/' . $image) }}"
                    alt="Эксклюзивное блюдо {{ $loop->iteration }} из премиум коллекции"
                    class="subscribe-img"
                    loading="lazy"
                    decoding="async"
                >
            @endforeach
        </div>
    </div>
</section>
