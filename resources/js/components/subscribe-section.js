$(document).ready(function() {
    const $subscribeSection = $('.subscribe-section');
    const $subscribeBtn = $('.subscribe-btn');
    const $images = $('.subscribe-img');

    if ($subscribeSection.length === 0) return;

    // Intersection Observer для анимации при появлении секции
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).addClass('section-visible');
                sectionObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    sectionObserver.observe($subscribeSection[0]);

    // Обработчик клика по кнопке
    if ($subscribeBtn.length > 0) {
        $subscribeBtn.on('click', function(e) {
            e.preventDefault();

            const $btn = $(this);

            // Добавляем эффект пульсации
            $btn.addClass('btn-clicked');

            // Имитация отправки данных
            const $btnText = $btn.find('.btn-text');
            const originalText = $btnText.text();
            $btnText.text('Обработка...');
            $btn.prop('disabled', true);

            // Здесь можно добавить реальную логику подписки
            setTimeout(() => {
                $btnText.text(originalText);
                $btn.prop('disabled', false);
                $btn.removeClass('btn-clicked');

                // Показываем уведомление об успехе
                showNotification('Подписка успешно оформлена!', 'success');
            }, 2000);
        });
    }

    // Обработчики для изображений
    $images.each(function(index) {
        const $img = $(this);

        // Добавляем задержку для анимации появления
        $img.css('animationDelay', `${0.1 + index * 0.1}s`);

        // Обработчик ошибки загрузки изображения
        $img.on('error', function() {
            $img.addClass('error');
            console.warn(`Failed to load image: ${this.src}`);
        });

        // Обработчик успешной загрузки
        $img.on('load', function() {
            $img.addClass('loaded');
        });

        // Добавляем обработчик для мобильных устройств
        $img.on('touchstart', function() {
            $img.css('transform', 'scale(1.1)');
        });

        $img.on('touchend', function() {
            $img.css('transform', '');
        });
    });

    // Функция показа уведомлений
    function showNotification(message, type = 'info') {
        const $notification = $(`
            <div class="notification notification-${type}">
                <div class="notification-content">
                    <span class="notification-message">${message}</span>
                    <button class="notification-close" aria-label="Закрыть уведомление">×</button>
                </div>
            </div>
        `);

        // Добавляем стили для уведомления
        $notification.css({
            position: 'fixed',
            top: '20px',
            right: '20px',
            background: type === 'success' ? '#4CAF50' : '#2196F3',
            color: 'white',
            padding: '1rem 1.5rem',
            borderRadius: '8px',
            boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
            zIndex: 1000,
            transform: 'translateX(100%)',
            transition: 'transform 0.3s ease',
            maxWidth: '300px'
        });

        $('body').append($notification);

        // Анимация появления
        setTimeout(() => {
            $notification.css('transform', 'translateX(0)');
        }, 100);

        // Обработчик закрытия
        $notification.find('.notification-close').on('click', () => {
            $notification.css('transform', 'translateX(100%)');
            setTimeout(() => {
                $notification.remove();
            }, 300);
        });

        // Автоматическое закрытие через 5 секунд
        setTimeout(() => {
            if ($notification.length > 0) {
                $notification.css('transform', 'translateX(100%)');
                setTimeout(() => {
                    if ($notification.length > 0) {
                        $notification.remove();
                    }
                }, 300);
            }
        }, 5000);
    }

    // Добавляем обработчик для клавиатуры
    $(document).on('keydown', function(e) {
        if (e.key === 'Enter' && $subscribeBtn.is(':focus')) {
            $subscribeBtn.trigger('click');
        }
    });

    // Добавляем поддержку жестов для мобильных устройств
    let touchStartY = 0;
    let touchEndY = 0;

    $subscribeSection.on('touchstart', function(e) {
        touchStartY = e.originalEvent.changedTouches[0].screenY;
    });

    $subscribeSection.on('touchend', function(e) {
        touchEndY = e.originalEvent.changedTouches[0].screenY;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartY - touchEndY;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Свайп вверх - можно добавить дополнительную функциональность
                console.log('Swiped up');
            } else {
                // Свайп вниз - можно добавить дополнительную функциональность
                console.log('Swiped down');
            }
        }
    }

    // Добавляем поддержку предзагрузки изображений
    function preloadImages() {
        const imageUrls = [
            '/storage/subscribe-section/dish-1.png',
            '/storage/subscribe-section/dish-2.png',
            '/storage/subscribe-section/dish-3.png',
            '/storage/subscribe-section/dish-4.png',
            '/storage/subscribe-section/dish-5.png',
            '/storage/subscribe-section/dish-6.png',
            '/storage/subscribe-section/dish-7.png',
            '/storage/subscribe-section/dish-8.png',
            '/storage/subscribe-section/dish-9.png'
        ];

        imageUrls.forEach(url => {
            const $link = $('<link>', {
                rel: 'preload',
                as: 'image',
                href: url
            });
            $('head').append($link);
        });
    }

    // Запускаем предзагрузку если страница еще загружается
    if (document.readyState === 'loading') {
        $(document).on('DOMContentLoaded', preloadImages);
    } else {
        preloadImages();
    }

    // Добавляем CSS классы для анимаций
    const $style = $('<style>').text(`
        .section-visible .subscribe-text-block {
            animation: slideInLeft 1s ease-out;
        }

        .section-visible .subscribe-images-grid {
            animation: slideInRight 1s ease-out 0.3s both;
        }

        .btn-clicked {
            animation: buttonPulse 0.3s ease-in-out;
        }

        @keyframes buttonPulse {
            0% { transform: scale(1); }
            50% { transform: scale(0.95); }
            100% { transform: scale(1); }
        }

        .img-loaded {
            opacity: 1;
            transform: scale(1);
        }

        .subscribe-img {
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .notification-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .notification-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0;
            line-height: 1;
            opacity: 0.8;
            transition: opacity 0.2s ease;
        }

        .notification-close:hover {
            opacity: 1;
        }
    `);

    $('head').append($style);
});
