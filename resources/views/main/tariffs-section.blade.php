@php
    $tariffs = [
        [
            'title' => 'Базовый',
            'price' => '1299Р',
            'old_price' => null,
            'discount' => null,
            'features' => [
                'Персональное недельное меню',
                'Списки покупок на каждый день',
                'Поддержка по e-mail',
                'Советы по замене продуктов',
                'Доступ ко всем рецептам',
                '2 онлайн-разбора питания в месяц',
                'Индивидуальный план питания с учетом анализа рациона и здоровья',
                'Чек-листы для мотивации и контроля прогресса',
                'Приглашение на закрытые вебинары и онлайн-кулинарные мастер-классы'
            ],
            'is_premium' => false,
            'disabled' => false,
            'disabled_start_index' => 4
        ],
        [
            'title' => 'Премиум',
            'price' => '2449Р',
            'old_price' => '3449Р',
            'discount' => '-15%',
            'features' => [
                'Персональное недельное меню',
                'Списки покупок на каждый день',
                'Поддержка по e-mail',
                'Советы по замене продуктов',
                'Доступ ко всем рецептам',
                '2 онлайн-разбора питания в месяц',
                'Индивидуальный план питания с учетом анализа рациона и здоровья',
                'Чек-листы для мотивации и контроля прогресса',
                'Приглашение на закрытые вебинары и онлайн-кулинарные мастер-классы'
            ],
            'is_premium' => true,
            'disabled' => false,
            'disabled_start_index' => 9999
        ],
        [
            'title' => 'Оптимальный',
            'price' => '1999Р',
            'old_price' => null,
            'discount' => null,
            'features' => [
                'Персональное недельное меню',
                'Списки покупок на каждый день',
                'Поддержка по e-mail',
                'Советы по замене продуктов',
                'Доступ ко всем рецептам',
                '2 онлайн-разбора питания в месяц',
                'Индивидуальный план питания с учетом анализа рациона и здоровья',
                'Чек-листы для мотивации и контроля прогресса',
                'Приглашение на закрытые вебинары и онлайн-кулинарные мастер-классы'
            ],
            'is_premium' => false,
            'disabled' => false,
            'disabled_start_index' => 6
        ]
    ];
@endphp

<section class="tariffs-section">
    <div class="container tariffs-content">
        <h2 class="section-title">Тарифы</h2>
        <div class="tariffs-grid">
            @foreach($tariffs as $tariff)
                <div class="tariff-card {{ $tariff['is_premium'] ? 'tariff-card-premium' : '' }} {{ $tariff['disabled'] ? 'tariff-card-disabled' : '' }}">
                    @if($tariff['discount'])
                        <div class="tariff-discount">{{ $tariff['discount'] }}</div>
                    @endif
                    <h3 class="tariff-title">{{ $tariff['title'] }}</h3>
                    <div class="tariff-price">
                        {{ $tariff['price'] }}
                        @if($tariff['old_price'])
                            <span class="tariff-old-price">{{ $tariff['old_price'] }}</span>
                        @endif
                    </div>
                    <ul class="tariff-features">
                        @foreach($tariff['features'] as $index => $feature)
                            <li class="{{ $index >= $tariff['disabled_start_index'] ? 'feature-disabled' : '' }}">
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    <button class="tariff-btn" type="button" {{ $tariff['disabled'] ? 'disabled' : '' }}>
                        {{ $tariff['disabled'] ? 'Недоступно' : 'Оформить подписку' }}
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</section>
