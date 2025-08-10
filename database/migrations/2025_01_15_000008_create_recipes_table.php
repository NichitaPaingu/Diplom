<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('instructions');
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();

            // Питательная ценность на 100г
            $table->decimal('calories_per_100g', 8, 2);
            $table->decimal('protein_per_100g', 8, 2);
            $table->decimal('fat_per_100g', 8, 2);
            $table->decimal('carbs_per_100g', 8, 2);

            // Время приготовления
            $table->integer('prep_time_minutes')->nullable();
            $table->integer('cook_time_minutes')->nullable();
            $table->integer('total_time_minutes');

            // Порции
            $table->integer('servings')->default(1);
            $table->string('serving_size')->nullable();

            // Связи
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('difficulty_id')->constrained()->onDelete('cascade');
            $table->foreignId('cooking_time_id')->constrained()->onDelete('cascade');

            // Подписка
            $table->string('subscription_required')->nullable();
            $table->boolean('is_premium')->default(false);

            $table->boolean('is_active')->default(true);
            $table->integer('views_count')->default(0);
            $table->integer('likes_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
