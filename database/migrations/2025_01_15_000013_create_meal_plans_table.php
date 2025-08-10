<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('meal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('image')->nullable();

            // Общая питательная ценность
            $table->decimal('total_calories', 8, 2);
            $table->decimal('total_protein', 8, 2);
            $table->decimal('total_fat', 8, 2);
            $table->decimal('total_carbs', 8, 2);

            // Цель плана
            $table->foreignId('goal_id')->constrained()->onDelete('cascade');

            // Подписка
            $table->string('subscription_required')->nullable();
            $table->boolean('is_premium')->default(false);

            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meal_plans');
    }
};
