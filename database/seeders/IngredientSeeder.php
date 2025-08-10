<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use Illuminate\Support\Str;
use App\Models\Category;

class IngredientSeeder extends Seeder
{
    public function run(): void
    {
        $ingredients = [
            // Овощи
            ['name' => 'Брокколи', 'category_id' => 8, 'calories' => 34, 'protein' => 2.8, 'fat' => 0.4, 'carbs' => 7, 'fiber' => 2.6, 'vitamin_c' => 89.2, 'vitamin_k' => 101.6],
            ['name' => 'Шпинат', 'category_id' => 8, 'calories' => 23, 'protein' => 2.9, 'fat' => 0.4, 'carbs' => 3.6, 'fiber' => 2.2, 'iron' => 2.7, 'vitamin_a' => 469],
            ['name' => 'Капуста белокочанная', 'category_id' => 8, 'calories' => 25, 'protein' => 1.3, 'fat' => 0.2, 'carbs' => 5.8, 'fiber' => 2.5, 'vitamin_c' => 36.6],
            ['name' => 'Морковь', 'category_id' => 8, 'calories' => 41, 'protein' => 0.9, 'fat' => 0.2, 'carbs' => 9.6, 'fiber' => 2.8, 'vitamin_a' => 835, 'beta_carotene' => 8285],
            ['name' => 'Свекла', 'category_id' => 8, 'calories' => 43, 'protein' => 1.6, 'fat' => 0.2, 'carbs' => 9.6, 'fiber' => 2.8, 'folate' => 109, 'nitrates' => 250],
            ['name' => 'Тыква', 'category_id' => 8, 'calories' => 26, 'protein' => 1, 'fat' => 0.1, 'carbs' => 6.5, 'fiber' => 0.5, 'vitamin_a' => 8513, 'potassium' => 340],
            ['name' => 'Цукини', 'category_id' => 8, 'calories' => 17, 'protein' => 1.2, 'fat' => 0.3, 'carbs' => 3.1, 'fiber' => 1, 'vitamin_c' => 17.9, 'potassium' => 261],
            ['name' => 'Баклажан', 'category_id' => 8, 'calories' => 25, 'protein' => 1, 'fat' => 0.2, 'carbs' => 6, 'fiber' => 3, 'antioxidants' => 15, 'nasunin' => 0.1],
            ['name' => 'Перец болгарский', 'category_id' => 8, 'calories' => 31, 'protein' => 1, 'fat' => 0.3, 'carbs' => 7, 'fiber' => 2.1, 'vitamin_c' => 127.7, 'vitamin_a' => 3131],
            ['name' => 'Помидоры', 'category_id' => 8, 'calories' => 18, 'protein' => 0.9, 'fat' => 0.2, 'carbs' => 3.9, 'fiber' => 1.2, 'lycopene' => 2573, 'vitamin_c' => 13.7],
            ['name' => 'Огурцы', 'category_id' => 8, 'calories' => 16, 'protein' => 0.7, 'fat' => 0.1, 'carbs' => 3.6, 'fiber' => 0.5, 'vitamin_k' => 16.4, 'potassium' => 147],
            ['name' => 'Лук репчатый', 'category_id' => 8, 'calories' => 40, 'protein' => 1.1, 'fat' => 0.1, 'carbs' => 9.3, 'fiber' => 1.7, 'quercetin' => 20, 'vitamin_c' => 7.4],
            ['name' => 'Чеснок', 'category_id' => 8, 'calories' => 149, 'protein' => 6.4, 'fat' => 0.5, 'carbs' => 33.1, 'fiber' => 2.1, 'allicin' => 5.8, 'vitamin_c' => 31.2],
            ['name' => 'Имбирь', 'category_id' => 8, 'calories' => 80, 'protein' => 1.8, 'fat' => 0.8, 'carbs' => 17.8, 'fiber' => 2, 'gingerol' => 0.5, 'vitamin_c' => 5],
            ['name' => 'Куркума', 'category_id' => 8, 'calories' => 354, 'protein' => 8, 'fat' => 10, 'carbs' => 65, 'fiber' => 21, 'curcumin' => 3.1, 'iron' => 41.4],

            // Фрукты
            ['name' => 'Яблоко', 'category_id' => 9, 'calories' => 52, 'protein' => 0.3, 'fat' => 0.2, 'carbs' => 14, 'fiber' => 2.4, 'quercetin' => 4.4, 'vitamin_c' => 4.6],
            ['name' => 'Банан', 'category_id' => 9, 'calories' => 89, 'protein' => 1.1, 'fat' => 0.3, 'carbs' => 23, 'fiber' => 2.6, 'potassium' => 358, 'vitamin_b6' => 0.4],
            ['name' => 'Апельсины', 'category_id' => 9, 'calories' => 47, 'protein' => 0.9, 'fat' => 0.1, 'carbs' => 12, 'fiber' => 2.4, 'vitamin_c' => 53.2, 'folate' => 30],
            ['name' => 'Клубника', 'category_id' => 9, 'calories' => 32, 'protein' => 0.7, 'fat' => 0.3, 'carbs' => 8, 'fiber' => 2, 'vitamin_c' => 58.8, 'ellagic_acid' => 0.1],
            ['name' => 'Черника', 'category_id' => 9, 'calories' => 57, 'protein' => 0.7, 'fat' => 0.3, 'carbs' => 14, 'fiber' => 2.4, 'anthocyanins' => 163, 'vitamin_k' => 19.3],
            ['name' => 'Малина', 'category_id' => 9, 'calories' => 52, 'protein' => 1.2, 'fat' => 0.7, 'carbs' => 12, 'fiber' => 6.5, 'ellagic_acid' => 0.2, 'vitamin_c' => 26.2],
            ['name' => 'Виноград', 'category_id' => 9, 'calories' => 62, 'protein' => 0.6, 'fat' => 0.2, 'carbs' => 16, 'fiber' => 0.9, 'resveratrol' => 0.1, 'vitamin_k' => 14.6],
            ['name' => 'Ананас', 'category_id' => 9, 'calories' => 50, 'protein' => 0.5, 'fat' => 0.1, 'carbs' => 13, 'fiber' => 1.4, 'bromelain' => 0.1, 'vitamin_c' => 47.8],
            ['name' => 'Манго', 'category_id' => 9, 'calories' => 60, 'protein' => 0.8, 'fat' => 0.4, 'carbs' => 15, 'fiber' => 1.6, 'vitamin_a' => 54, 'vitamin_c' => 36.4],
            ['name' => 'Авокадо', 'category_id' => 9, 'calories' => 160, 'protein' => 2, 'fat' => 15, 'carbs' => 9, 'fiber' => 6.7, 'healthy_fats' => 14.7, 'potassium' => 485],

            // Белки животного происхождения
            ['name' => 'Куриная грудка', 'category_id' => 10, 'calories' => 165, 'protein' => 31, 'fat' => 3.6, 'carbs' => 0, 'fiber' => 0, 'vitamin_b6' => 0.6, 'niacin' => 13.7],
            ['name' => 'Индейка', 'category_id' => 10, 'calories' => 189, 'protein' => 29, 'fat' => 7, 'carbs' => 0, 'fiber' => 0, 'selenium' => 27.6, 'vitamin_b6' => 0.7],
            ['name' => 'Говядина постная', 'category_id' => 10, 'calories' => 250, 'protein' => 26, 'fat' => 15, 'carbs' => 0, 'fiber' => 0, 'iron' => 2.6, 'vitamin_b12' => 2.1],
            ['name' => 'Свинина постная', 'category_id' => 10, 'calories' => 242, 'protein' => 27, 'fat' => 14, 'carbs' => 0, 'fiber' => 0, 'thiamine' => 0.9, 'selenium' => 36.5],
            ['name' => 'Баранина', 'category_id' => 10, 'calories' => 294, 'protein' => 25, 'fat' => 21, 'carbs' => 0, 'fiber' => 0, 'iron' => 1.6, 'vitamin_b12' => 2.7],
            ['name' => 'Кролик', 'category_id' => 10, 'calories' => 173, 'protein' => 33, 'fat' => 3.5, 'carbs' => 0, 'fiber' => 0, 'phosphorus' => 240, 'vitamin_b12' => 6.8],

            // Рыба и морепродукты
            ['name' => 'Лосось', 'category_id' => 11, 'calories' => 208, 'protein' => 25, 'fat' => 12, 'carbs' => 0, 'fiber' => 0, 'omega_3' => 2.3, 'vitamin_d' => 11.1],
            ['name' => 'Тунец', 'category_id' => 11, 'calories' => 144, 'protein' => 30, 'fat' => 1, 'carbs' => 0, 'fiber' => 0, 'selenium' => 108, 'vitamin_b12' => 2.2],
            ['name' => 'Скумбрия', 'category_id' => 11, 'calories' => 305, 'protein' => 19, 'fat' => 25, 'carbs' => 0, 'fiber' => 0, 'omega_3' => 2.7, 'vitamin_d' => 16.1],
            ['name' => 'Сардины', 'category_id' => 11, 'calories' => 208, 'protein' => 24, 'fat' => 12, 'carbs' => 0, 'fiber' => 0, 'calcium' => 382, 'vitamin_d' => 4.8],
            ['name' => 'Креветки', 'category_id' => 11, 'calories' => 99, 'protein' => 24, 'fat' => 0.3, 'carbs' => 0.2, 'fiber' => 0, 'selenium' => 38, 'vitamin_b12' => 1.7],
            ['name' => 'Мидии', 'category_id' => 11, 'calories' => 86, 'protein' => 12, 'fat' => 2.2, 'carbs' => 3.4, 'fiber' => 0, 'iron' => 6.7, 'vitamin_b12' => 12],

            // Молочные продукты
            ['name' => 'Творог 5%', 'category_id' => 12, 'calories' => 121, 'protein' => 16, 'fat' => 5, 'carbs' => 3, 'fiber' => 0, 'calcium' => 138, 'vitamin_b12' => 0.8],
            ['name' => 'Греческий йогурт', 'category_id' => 12, 'calories' => 59, 'protein' => 10, 'fat' => 0.4, 'carbs' => 3.6, 'fiber' => 0, 'calcium' => 110, 'probiotics' => 1],
            ['name' => 'Кефир', 'category_id' => 12, 'calories' => 64, 'protein' => 3.5, 'fat' => 3.6, 'carbs' => 4.8, 'fiber' => 0, 'calcium' => 130, 'probiotics' => 1],
            ['name' => 'Яйца', 'category_id' => 12, 'calories' => 155, 'protein' => 13, 'fat' => 11, 'carbs' => 1.1, 'fiber' => 0, 'vitamin_d' => 1.1, 'choline' => 147],
            ['name' => 'Сыр фета', 'category_id' => 12, 'calories' => 264, 'protein' => 14, 'fat' => 21, 'carbs' => 4.1, 'fiber' => 0, 'calcium' => 360, 'vitamin_b12' => 1.7],
            ['name' => 'Моцарелла', 'category_id' => 12, 'calories' => 280, 'protein' => 28, 'fat' => 17, 'carbs' => 2.2, 'fiber' => 0, 'calcium' => 505, 'phosphorus' => 354],

            // Крупы и злаки
            ['name' => 'Овсянка', 'category_id' => 13, 'calories' => 389, 'protein' => 17, 'fat' => 7, 'carbs' => 66, 'fiber' => 10.6, 'beta_glucan' => 4, 'iron' => 4.7],
            ['name' => 'Киноа', 'category_id' => 13, 'calories' => 120, 'protein' => 4.4, 'fat' => 1.9, 'carbs' => 22, 'fiber' => 2.8, 'complete_protein' => 1, 'iron' => 1.5],
            ['name' => 'Гречка', 'category_id' => 13, 'calories' => 343, 'protein' => 13, 'fat' => 3.4, 'carbs' => 72, 'fiber' => 10, 'rutin' => 0.1, 'magnesium' => 257],
            ['name' => 'Булгур', 'category_id' => 13, 'calories' => 342, 'protein' => 12, 'fat' => 1.3, 'carbs' => 76, 'fiber' => 18, 'iron' => 2.5, 'magnesium' => 164],
            ['name' => 'Дикий рис', 'category_id' => 13, 'calories' => 101, 'protein' => 4, 'fat' => 0.3, 'carbs' => 21, 'fiber' => 1.8, 'antioxidants' => 30, 'zinc' => 1.3],

            // Бобовые
            ['name' => 'Чечевица красная', 'category_id' => 14, 'calories' => 116, 'protein' => 9, 'fat' => 0.4, 'carbs' => 20, 'fiber' => 7.9, 'iron' => 3.3, 'folate' => 181],
            ['name' => 'Нут', 'category_id' => 14, 'calories' => 164, 'protein' => 8.9, 'fat' => 2.6, 'carbs' => 27, 'fiber' => 7.6, 'iron' => 2.9, 'folate' => 172],
            ['name' => 'Фасоль черная', 'category_id' => 14, 'calories' => 132, 'protein' => 8.9, 'fat' => 0.5, 'carbs' => 24, 'fiber' => 8.7, 'iron' => 2.1, 'antioxidants' => 4184],
            ['name' => 'Горох зеленый', 'category_id' => 14, 'calories' => 84, 'protein' => 5.4, 'fat' => 0.4, 'carbs' => 14, 'fiber' => 5.7, 'vitamin_k' => 24.8, 'vitamin_c' => 40],

            // Орехи и семена
            ['name' => 'Миндаль', 'category_id' => 15, 'calories' => 579, 'protein' => 21, 'fat' => 50, 'carbs' => 22, 'fiber' => 12.5, 'vitamin_e' => 25.6, 'magnesium' => 270],
            ['name' => 'Грецкие орехи', 'category_id' => 15, 'calories' => 654, 'protein' => 15, 'fat' => 65, 'carbs' => 14, 'fiber' => 6.7, 'omega_3' => 9.1, 'antioxidants' => 13598],
            ['name' => 'Кешью', 'category_id' => 15, 'calories' => 553, 'protein' => 18, 'fat' => 44, 'carbs' => 30, 'fiber' => 3.3, 'copper' => 2.2, 'magnesium' => 292],
            ['name' => 'Семена чиа', 'category_id' => 15, 'calories' => 486, 'protein' => 17, 'fat' => 31, 'carbs' => 42, 'fiber' => 34.4, 'omega_3' => 17.8, 'calcium' => 631],
            ['name' => 'Семена льна', 'category_id' => 15, 'calories' => 534, 'protein' => 18, 'fat' => 42, 'carbs' => 29, 'fiber' => 27.3, 'omega_3' => 22.8, 'lignans' => 0.3],
            ['name' => 'Изюм', 'category_id' => 9, 'calories' => 299, 'protein' => 3.1, 'fat' => 0.5, 'carbs' => 79, 'fiber' => 3.7, 'iron' => 1.9, 'potassium' => 749],

            // Масла и жиры
            ['name' => 'Оливковое масло', 'category_id' => 16, 'calories' => 884, 'protein' => 0, 'fat' => 100, 'carbs' => 0, 'fiber' => 0, 'monounsaturated_fats' => 73, 'vitamin_e' => 14.3],
            ['name' => 'Кокосовое масло', 'category_id' => 16, 'calories' => 862, 'protein' => 0, 'fat' => 100, 'carbs' => 0, 'fiber' => 0, 'lauric_acid' => 44.6, 'medium_chain_triglycerides' => 62],
            ['name' => 'Масло авокадо', 'category_id' => 16, 'calories' => 884, 'protein' => 0, 'fat' => 100, 'carbs' => 0, 'fiber' => 0, 'monounsaturated_fats' => 70, 'vitamin_e' => 14.3],

            // Специи и травы
            ['name' => 'Корица', 'category_id' => 17, 'calories' => 247, 'protein' => 4, 'fat' => 1.2, 'carbs' => 81, 'fiber' => 53.1, 'cinnamaldehyde' => 0.1, 'antioxidants' => 267536],
            ['name' => 'Имбирь сушеный', 'category_id' => 17, 'calories' => 335, 'protein' => 9, 'fat' => 4.2, 'carbs' => 71, 'fiber' => 14.1, 'gingerol' => 0.8, 'vitamin_b6' => 0.6],
            ['name' => 'Черный перец', 'category_id' => 17, 'calories' => 251, 'protein' => 10, 'fat' => 3.3, 'carbs' => 64, 'fiber' => 25.3, 'piperine' => 0.1, 'iron' => 9.7],
            ['name' => 'Паприка', 'category_id' => 17, 'calories' => 282, 'protein' => 14, 'fat' => 13, 'carbs' => 54, 'fiber' => 34.9, 'capsaicin' => 0.1, 'vitamin_a' => 2463],
            ['name' => 'Орегано', 'category_id' => 17, 'calories' => 265, 'protein' => 9, 'fat' => 4.3, 'carbs' => 69, 'fiber' => 42.5, 'carvacrol' => 0.1, 'antioxidants' => 159277],
            ['name' => 'Мед', 'category_id' => 9, 'calories' => 304, 'protein' => 0.3, 'fat' => 0, 'carbs' => 82, 'fiber' => 0, 'antioxidants' => 0.1, 'glucose' => 35],

            // Напитки
            ['name' => 'Зеленый чай', 'category_id' => 18, 'calories' => 1, 'protein' => 0.2, 'fat' => 0, 'carbs' => 0.2, 'fiber' => 0, 'catechins' => 0.1, 'l_theanine' => 0.01],
            ['name' => 'Ромашковый чай', 'category_id' => 18, 'calories' => 1, 'protein' => 0, 'fat' => 0, 'carbs' => 0.2, 'fiber' => 0, 'apigenin' => 0.01, 'chamazulene' => 0.001],
            ['name' => 'Мятный чай', 'category_id' => 18, 'calories' => 1, 'protein' => 0, 'fat' => 0, 'carbs' => 0.2, 'fiber' => 0, 'menthol' => 0.01, 'rosmarinic_acid' => 0.001],
            ['name' => 'Кофе черный', 'category_id' => 18, 'calories' => 2, 'protein' => 0.3, 'fat' => 0, 'carbs' => 0, 'fiber' => 0, 'caffeine' => 0.1, 'chlorogenic_acid' => 0.1],
            ['name' => 'Какао порошок', 'category_id' => 18, 'calories' => 228, 'protein' => 20, 'fat' => 14, 'carbs' => 58, 'fiber' => 33, 'flavanols' => 0.5, 'theobromine' => 2.1],

            // Суперфуды
            ['name' => 'Спирулина', 'category_id' => 18, 'calories' => 290, 'protein' => 57, 'fat' => 8, 'carbs' => 24, 'fiber' => 3.6, 'phycocyanin' => 1.5, 'vitamin_b12' => 0.1],
            ['name' => 'Хлорелла', 'category_id' => 18, 'calories' => 410, 'protein' => 58, 'fat' => 9, 'carbs' => 23, 'fiber' => 12, 'chlorophyll' => 2.5, 'vitamin_b12' => 0.1],
            ['name' => 'Моринга', 'category_id' => 18, 'calories' => 37, 'protein' => 2.1, 'fat' => 0.2, 'carbs' => 8.5, 'fiber' => 2.1, 'vitamin_c' => 51.7, 'iron' => 0.9],
            ['name' => 'Ягоды годжи', 'category_id' => 18, 'calories' => 349, 'protein' => 14, 'fat' => 0.4, 'carbs' => 77, 'fiber' => 13, 'zeaxanthin' => 0.1, 'vitamin_c' => 48.4],
            ['name' => 'Асаи', 'category_id' => 18, 'calories' => 70, 'protein' => 1, 'fat' => 5, 'carbs' => 6, 'fiber' => 3, 'anthocyanins' => 0.1, 'antioxidants' => 102700],
        ];

        foreach ($ingredients as $ingredient) {
            // Создаем массив дополнительного питания, исключая только базовые поля
            $additionalNutrition = [];
            foreach ($ingredient as $key => $value) {
                // Исключаем только основные поля, все остальные (vitamin_c, iron, antioxidants и т.д.) попадают в additional_nutrition
                if (!in_array($key, ['name', 'category_id', 'calories', 'protein', 'fat', 'carbs', 'fiber']) && $value !== null) {
                    $additionalNutrition[$key] = $value;
                }
            }

            Ingredient::create([
                'name' => $ingredient['name'],
                'slug' => Str::slug($ingredient['name']),
                'category_id' => $ingredient['category_id'],
                'calories_per_100g' => $ingredient['calories'],
                'protein_per_100g' => $ingredient['protein'],
                'fat_per_100g' => $ingredient['fat'],
                'carbs_per_100g' => $ingredient['carbs'],
                'fiber_per_100g' => $ingredient['fiber'] ?? 0,
                'description' => 'Полезный продукт с высоким содержанием питательных веществ',
                'is_active' => true,
                'sort_order' => rand(1, 100),
                'additional_nutrition' => $additionalNutrition,
            ]);
        }
    }
}
