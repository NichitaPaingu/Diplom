<header class="site-header">
    <div class="container header-container">
        <a href="{{ route('home') }}" class="logo-block">
            <span class="logo-icon" aria-hidden="true">
                <img src="{{ asset('storage/header/leaf.png') }}" alt="Листочек" class="logo-image">
            </span>
            <span class="logo-text logo-text-desktop">
                <span class="logo-title">Здоровое</span>
                <span class="logo-subtitle">питание</span>
            </span>
        </a>
        <div class="header-nav-block">
            <span class="logo-text logo-text-mobile">
                <span class="logo-title">Здоровое питание</span>
            </span>
        </div>

        <button class="burger-menu" aria-label="Открыть меню" type="button">
            <span class="burger-line"></span>
            <span class="burger-line"></span>
            <span class="burger-line"></span>
        </button>

        <nav class="main-nav" aria-label="Главная навигация">
            <ul class="nav-list">
                <li><a href="{{ route('advices') }}" class="nav-link">Советы</a></li>
                <li><a href="{{ route('recipes') }}" class="nav-link">Рецепты</a></li>
                <li><a href="{{ route('individuals') }}" class="nav-link">Индивидуальный подход</a></li>
                <li><a href="{{ route('template') }}" class="nav-link">Шаблоны</a></li>
                <li><a href="{{ route('values') }}" class="nav-link">Ценности</a></li>
            </ul>
        </nav>
    </div>
</header>
