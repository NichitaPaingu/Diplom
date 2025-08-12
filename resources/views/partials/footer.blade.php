<footer class="site-footer">
    <div class="container footer-content">
        <!-- Верхний блок -->
        <div class="footer-top">
            <a href="{{ route('home') }}" class="logo-block">
                <span class="logo-icon" aria-hidden="true">
                    <img src="{{ asset('storage/header/leaf.png') }}" alt="Листочек" class="logo-image">
                </span>
                <span class="logo-text">
                    <span class="logo-title">Здоровое</span>
                    <span class="logo-subtitle">питание</span>
                </span>
            </a>
            <div class="footer-nav-block">
                <nav class="footer-nav" aria-label="Навигация в подвале">
                    <ul class="footer-nav-list">
                        <li><a href="{{ route('advices') }}" class="footer-nav-link">Советы</a></li>
                        <li><a href="{{ route('recipes') }}" class="footer-nav-link">Рецепты</a></li>
                        <li><a href="{{ route('individuals') }}" class="footer-nav-link">Индивидуальный подход</a></li>
                        <li><a href="{{ route('template') }}" class="footer-nav-link">Шаблоны</a></li>
                        <li><a href="{{ route('values') }}" class="footer-nav-link">Ценности</a></li>
                    </ul>
                </nav>
                <div class="footer-bottom-right">
                    <div class="footer-socials">
                        <!-- Тестовая иконка -->
                        <a href="#" class="footer-social-link" aria-label="Test">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                        <a href="#" class="footer-social-link" aria-label="WhatsApp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="#" class="footer-social-link" aria-label="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="footer-social-link" aria-label="TikTok">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                        <a href="#" class="footer-social-link" aria-label="VK">
                            <i class="fa-brands fa-vk"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copyright">
                <span>©2025 — Healthy food</span>
            </div>
            <div>
                <a href="#" class="footer-privacy">
                    <span>Privacy Policy</span>
                </a>
            </div>
        </div>
    </div>
</footer>
