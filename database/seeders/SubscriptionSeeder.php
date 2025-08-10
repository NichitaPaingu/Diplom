<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;
use Illuminate\Support\Str;

class SubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $subscriptions = [
            [
                'name' => 'Базовый план',
                'description' => 'Доступ к базовым рецептам и планам питания',
                'price' => 0,
                'currency' => 'RUB',
                'billing_period' => 'monthly',
                'features' => [
                    'basic_recipes' => true,
                    'meal_plans' => false,
                    'premium_content' => false,
                    'personal_coach' => false,
                ],
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Премиум план',
                'description' => 'Полный доступ ко всем рецептам и планам питания',
                'price' => 999,
                'currency' => 'RUB',
                'billing_period' => 'monthly',
                'features' => [
                    'basic_recipes' => true,
                    'meal_plans' => true,
                    'premium_content' => true,
                    'personal_coach' => false,
                ],
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'VIP план',
                'description' => 'Персональный коуч и индивидуальные планы питания',
                'price' => 2999,
                'currency' => 'RUB',
                'billing_period' => 'monthly',
                'features' => [
                    'basic_recipes' => true,
                    'meal_plans' => true,
                    'premium_content' => true,
                    'personal_coach' => true,
                ],
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Годовой план',
                'description' => 'Премиум план со скидкой при оплате за год',
                'price' => 9999,
                'currency' => 'RUB',
                'billing_period' => 'yearly',
                'features' => [
                    'basic_recipes' => true,
                    'meal_plans' => true,
                    'premium_content' => true,
                    'personal_coach' => false,
                ],
                'is_active' => true,
                'sort_order' => 4,
            ],
        ];

        foreach ($subscriptions as $subscriptionData) {
            Subscription::create([
                ...$subscriptionData,
                'slug' => Str::slug($subscriptionData['name'])
            ]);
        }
    }
}
