export function initHealthyEatingTags() {
    $('.healthy-eating-tags .tag').click(function() {
        const filter = $(this).data('filter');

        $('.healthy-eating-tags .tag').removeClass('tag-active');
        $(this).addClass('tag-active');

        $('.nutrient-card').each(function() {
            const category = $(this).data('category');
            if (category === filter) {
                $(this).show().css('animation', 'fadeInUp 0.6s ease-out');
            } else {
                $(this).hide();
            }
        });
    });

    $('.nutrient-card').each(function() {
        const category = $(this).data('category');
        if (category === 'variety') {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
}

export function initCardAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                $(entry.target).css({
                    'opacity': '1',
                    'transform': 'translateY(0)'
                });
            }
        });
    }, observerOptions);

    // Наблюдаем за карточками питательных веществ
    $('.nutrient-card').each(function() {
        $(this).css({
            'opacity': '0',
            'transform': 'translateY(30px)',
            'transition': 'all 0.6s ease-out'
        });
        observer.observe(this);
    });
}
