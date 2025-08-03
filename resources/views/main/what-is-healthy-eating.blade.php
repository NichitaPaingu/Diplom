<section class="healthy-eating-section">
    <div class="container">
        <div class="healthy-eating-content">
            <div class="section-header">
                <h2 class="section-title">Что такое здоровое питание?</h2>
                <div class="healthy-eating-tags">
                    <button class="tag tag-active" data-filter="variety">Разнообразие</button>
                    <button class="tag" data-filter="moderation">Умеренность</button>
                    <button class="tag" data-filter="regularity">Регулярность</button>
                    <button class="tag" data-filter="balance">Баланс</button>
                    <button class="tag" data-filter="natural">Натуральное</button>
                    <button class="tag" data-filter="taste">Вкус</button>
                </div>
            </div>

            <div class="healthy-eating-grid">
                <div class="nutrients-container">
                    <div class="nutrients-grid">
                        @php
                            $nutrientsData = [
                                'variety' => [
                                    [
                                        'icon' => 'fas fa-palette',
                                        'title' => 'Цвета радуги',
                                        'items' => ['Красные овощи - ликопин', 'Оранжевые - бета-каротин', 'Зеленые - хлорофилл', 'Фиолетовые - антоцианы'],
                                        'class' => 'nutrient-variety-1'
                                    ],
                                    [
                                        'icon' => 'fas fa-seedling',
                                        'title' => 'Разные текстуры',
                                        'items' => ['Хрустящие овощи', 'Сочные фрукты', 'Мягкие бобовые', 'Хрустящие орехи'],
                                        'class' => 'nutrient-variety-2'
                                    ],
                                    [
                                        'icon' => 'fas fa-globe',
                                        'title' => 'Кухни мира',
                                        'items' => ['Средиземноморская', 'Азиатская кухня', 'Латинская Америка', 'Средневосточная'],
                                        'class' => 'nutrient-variety-3'
                                    ],
                                    [
                                        'icon' => 'fas fa-utensils',
                                        'title' => 'Способы готовки',
                                        'items' => ['На пару', 'Запекание', 'Сырые продукты', 'Ферментация'],
                                        'class' => 'nutrient-variety-4'
                                    ]
                                ],
                                'moderation' => [
                                    [
                                        'icon' => 'fas fa-balance-scale',
                                        'title' => 'Порции',
                                        'items' => ['Ладонь для белка', 'Кулак для углеводов', 'Большой палец для жиров', 'Две ладони для овощей'],
                                        'class' => 'nutrient-moderation-1'
                                    ],
                                    [
                                        'icon' => 'fas fa-clock',
                                        'title' => 'Время приема',
                                        'items' => ['Завтрак - 25%', 'Обед - 35%', 'Ужин - 25%', 'Перекусы - 15%'],
                                        'class' => 'nutrient-moderation-2'
                                    ],
                                    [
                                        'icon' => 'fas fa-chart-line',
                                        'title' => 'Калории',
                                        'items' => ['Белки - 20-25%', 'Жиры - 25-30%', 'Углеводы - 45-55%', 'Клетчатка - 25-30г'],
                                        'class' => 'nutrient-moderation-3'
                                    ],
                                    [
                                        'icon' => 'fas fa-tint',
                                        'title' => 'Вода',
                                        'items' => ['8 стаканов в день', 'До еды - 30 мин', 'После еды - 1 час', 'При жажде - сразу'],
                                        'class' => 'nutrient-moderation-4'
                                    ]
                                ],
                                'regularity' => [
                                    [
                                        'icon' => 'fas fa-calendar-alt',
                                        'title' => 'Расписание',
                                        'items' => ['Завтрак - 7-9 утра', 'Обед - 12-14 дня', 'Ужин - 18-20 вечера', 'Перекусы - каждые 3-4 часа'],
                                        'class' => 'nutrient-regularity-1'
                                    ],
                                    [
                                        'icon' => 'fas fa-repeat',
                                        'title' => 'Привычки',
                                        'items' => ['Еда в одно время', 'Медленное пережевывание', 'Без отвлечений', 'Слушать организм'],
                                        'class' => 'nutrient-regularity-2'
                                    ],
                                    [
                                        'icon' => 'fas fa-list-check',
                                        'title' => 'Планирование',
                                        'items' => ['Меню на неделю', 'Список покупок', 'Подготовка заранее', 'Здоровые заготовки'],
                                        'class' => 'nutrient-regularity-3'
                                    ],
                                    [
                                        'icon' => 'fas fa-sync-alt',
                                        'title' => 'Ритм дня',
                                        'items' => ['Утренний ритуал', 'Обеденный перерыв', 'Вечернее расслабление', 'Подготовка ко сну'],
                                        'class' => 'nutrient-regularity-4'
                                    ]
                                ],
                                'balance' => [
                                    [
                                        'icon' => 'fas fa-yin-yang',
                                        'title' => 'Макронутриенты',
                                        'items' => ['Белки - строительный материал', 'Жиры - энергия и гормоны', 'Углеводы - топливо', 'Клетчатка - очищение'],
                                        'class' => 'nutrient-balance-1'
                                    ],
                                    [
                                        'icon' => 'fas fa-microscope',
                                        'title' => 'Микронутриенты',
                                        'items' => ['Витамины A, C, E', 'Витамины группы B', 'Кальций, железо, цинк', 'Омега-3 и Омега-6'],
                                        'class' => 'nutrient-balance-2'
                                    ],
                                    [
                                        'icon' => 'fas fa-pizza-slice',
                                        'title' => 'Пищевые группы',
                                        'items' => ['Овощи и фрукты', 'Злаки и крупы', 'Белковые продукты', 'Молочные продукты'],
                                        'class' => 'nutrient-balance-3'
                                    ],
                                    [
                                        'icon' => 'fas fa-thermometer-half',
                                        'title' => 'pH баланс',
                                        'items' => ['Щелочные продукты - 70%', 'Кислые продукты - 30%', 'Зеленые овощи', 'Цитрусовые фрукты'],
                                        'class' => 'nutrient-balance-4'
                                    ]
                                ],
                                'natural' => [
                                    [
                                        'icon' => 'fas fa-tree',
                                        'title' => 'Органические продукты',
                                        'items' => ['Без пестицидов', 'Без ГМО', 'Без антибиотиков', 'Без гормонов роста'],
                                        'class' => 'nutrient-natural-1'
                                    ],
                                    [
                                        'icon' => 'fas fa-leaf',
                                        'title' => 'Сезонные овощи',
                                        'items' => ['Весна - зелень', 'Лето - ягоды', 'Осень - корнеплоды', 'Зима - капуста'],
                                        'class' => 'nutrient-natural-2'
                                    ],
                                    [
                                        'icon' => 'fas fa-seedling',
                                        'title' => 'Минимальная обработка',
                                        'items' => ['Сырые продукты', 'На пару', 'Запекание', 'Ферментация'],
                                        'class' => 'nutrient-natural-3'
                                    ],
                                    [
                                        'icon' => 'fas fa-water',
                                        'title' => 'Чистая вода',
                                        'items' => ['Фильтрованная', 'Минеральная', 'Родниковая', 'Талая вода'],
                                        'class' => 'nutrient-natural-4'
                                    ]
                                ],
                                'taste' => [
                                    [
                                        'icon' => 'fas fa-pepper-hot',
                                        'title' => 'Пряности',
                                        'items' => ['Куркума - противовоспалительное', 'Имбирь - пищеварение', 'Чеснок - иммунитет', 'Перец - метаболизм'],
                                        'class' => 'nutrient-taste-1'
                                    ],
                                    [
                                        'icon' => 'fas fa-lemon',
                                        'title' => 'Кислоты',
                                        'items' => ['Лимонный сок', 'Яблочный уксус', 'Бальзамический уксус', 'Кислые ягоды'],
                                        'class' => 'nutrient-taste-2'
                                    ],
                                    [
                                        'icon' => 'fas fa-clover',
                                        'title' => 'Натуральные подсластители',
                                        'items' => ['Мед', 'Кленовый сироп', 'Стевия', 'Финики'],
                                        'class' => 'nutrient-taste-3'
                                    ],
                                    [
                                        'icon' => 'fas fa-cheese',
                                        'title' => 'Умами вкус',
                                        'items' => ['Грибы', 'Морские водоросли', 'Пармезан', 'Томаты'],
                                        'class' => 'nutrient-taste-4'
                                    ]
                                ]
                            ];
                        @endphp

                        @foreach($nutrientsData as $category => $nutrients)
                            @foreach($nutrients as $nutrient)
                                <div class="nutrient-card {{ $nutrient['class'] }}" data-category="{{ $category }}">
                                    <div class="nutrient-icon">
                                        <i class="{{ $nutrient['icon'] }}"></i>
                                    </div>
                                    <h3 class="nutrient-title">{{ $nutrient['title'] }}</h3>
                                    <ul class="nutrient-list">
                                        @foreach($nutrient['items'] as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>

                <div class="healthy-eating-image-block">
                    <div class="image-container">
                        <img src="{{ asset('storage/dishes/what-is-healthy.png') }}" alt="Тарелка с полезной едой" class="healthy-eating-image">
                        <div class="image-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
