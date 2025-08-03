// Recipes Preview Section - Simple Effects
document.addEventListener('DOMContentLoaded', function() {
    const recipeCards = document.querySelectorAll('.recipe-card');

    // Ripple эффект при клике
    recipeCards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Добавляем класс для CSS анимации
            this.classList.add('ripple');

            // Убираем класс через время анимации
            setTimeout(() => {
                this.classList.remove('ripple');
            }, 600);
        });
    });
});
