import './bootstrap';

// Импортируем компоненты
import { initBurgerMenu } from './components/burger-menu';
import { initHealthyEatingTags, initCardAnimations } from './components/healthy-eating-tags';
import './components/subscribe-section';
import './components/recipes-preview';

// Инициализация при загрузке DOM
$(document).ready(function () {
    // Инициализируем все компоненты
    initBurgerMenu();
    initHealthyEatingTags();
    initCardAnimations();
});
