<section class="hero-section">
    <div class="hero-bg-container">
        <div class="circle-1"></div>
    </div>
    <div class="hero-bg">
        @php
            $images = [
                'apple_1',
                'kiwi_1',
                'pear_1',
                'apple_2',
                'kiwi_2',
                'pear_2',
            ];
        @endphp
        @for ($i = 0; $i < 3; $i++)
            @foreach ($images as $image)
                <img src="{{ asset('storage/balance/' . $image . '.png') }}" alt="Яблоко" class="hero-bg-image">
            @endforeach
        @endfor
    </div>
    <div class="hero-content">
        <div class="hero-text-block">
            <div class="hero-text-block-inner">
                <h1 class="hero-title">
                    Сбалансированное<br>&amp; здоровое<br>
                    <span class="hero-title-bold">Питание дома</span>
                </h1>
                <button class="hero-btn" type="button">Оформить подписку</button>
            </div>
        </div>
        <div class="hero-image-block">
            <img src="{{ asset('storage/dishes/omlet.png') }}" alt="Омлет с овощами" class="hero-image">
        </div>
    </div>
</section>
