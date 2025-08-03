export function initBurgerMenu() {
    $('.burger-menu').click(function() {
        $('.burger-menu').toggleClass('active');
        $('.main-nav').toggleClass('active');

        // Блокировка скролла при открытом меню
        if ($('.main-nav').hasClass('active')) {
            $('body').css('overflow', 'hidden');
        } else {
            $('body').css('overflow', '');
        }
    });

    // Закрытие меню при клике на ссылку
    $('.nav-link').click(function() {
        $('.burger-menu').removeClass('active');
        $('.main-nav').removeClass('active');
        $('body').css('overflow', '');
    });

    // Закрытие меню при клике вне его
    $(document).click(function(event) {
        if (!$(event.target).closest('.burger-menu, .main-nav').length) {
            $('.burger-menu').removeClass('active');
            $('.main-nav').removeClass('active');
            $('body').css('overflow', '');
        }
    });

    // Закрытие меню при нажатии Escape
    $(document).keydown(function(event) {
        if (event.key === 'Escape') {
            $('.burger-menu').removeClass('active');
            $('.main-nav').removeClass('active');
            $('body').css('overflow', '');
        }
    });
}
