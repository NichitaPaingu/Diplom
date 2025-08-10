<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'instructions',
        'image',
        'video_url',
        'calories_per_100g',
        'protein_per_100g',
        'fat_per_100g',
        'carbs_per_100g',
        'prep_time_minutes',
        'cook_time_minutes',
        'total_time_minutes',
        'servings',
        'serving_size',
        'category_id',
        'difficulty_id',
        'cooking_time_id',
        'subscription_required',
        'is_premium',
        'is_active',
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
        'calories_per_100g' => 'decimal:2',
        'protein_per_100g' => 'decimal:2',
        'fat_per_100g' => 'decimal:2',
        'carbs_per_100g' => 'decimal:2',
        'prep_time_minutes' => 'integer',
        'cook_time_minutes' => 'integer',
        'total_time_minutes' => 'integer',
        'servings' => 'integer',
        'views_count' => 'integer',
        'likes_count' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class);
    }

    public function cookingTime(): BelongsTo
    {
        return $this->belongsTo(CookingTime::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients')
            ->withPivot('amount', 'unit', 'notes', 'is_optional')
            ->withTimestamps();
    }

    public function dietTypes(): BelongsToMany
    {
        return $this->belongsToMany(DietType::class, 'recipe_diet_types');
    }

    public function cookingMethods(): BelongsToMany
    {
        return $this->belongsToMany(CookingMethod::class, 'recipe_cooking_methods');
    }

    public function goals(): BelongsToMany
    {
        return $this->belongsToMany(Goal::class, 'recipe_goals');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeByDifficulty($query, $difficultyId)
    {
        return $query->where('difficulty_id', $difficultyId);
    }

    public function scopeByCookingTime($query, $cookingTimeId)
    {
        return $query->where('cooking_time_id', $cookingTimeId);
    }

    public function scopeByDietType($query, $dietTypeId)
    {
        return $query->whereHas('dietTypes', function ($q) use ($dietTypeId) {
            $q->where('diet_type_id', $dietTypeId);
        });
    }

    public function scopeByGoal($query, $goalId)
    {
        return $query->whereHas('goals', function ($q) use ($goalId) {
            $q->where('goal_id', $goalId);
        });
    }

    public function scopeBySubscription($query, $subscriptionLevel)
    {
        return $query->where('subscription_required', $subscriptionLevel)
            ->orWhere('subscription_required', null);
    }

    public function scopePopular($query)
    {
        return $query->orderBy('views_count', 'desc');
    }

    public function scopeLiked($query)
    {
        return $query->orderBy('likes_count', 'desc');
    }

    public function getFormattedPrepTimeAttribute(): string
    {
        if ($this->prep_time_minutes) {
            return "{$this->prep_time_minutes} мин.";
        }
        return 'Не указано';
    }

    public function getFormattedCookTimeAttribute(): string
    {
        if ($this->cook_time_minutes) {
            return "{$this->cook_time_minutes} мин.";
        }
        return 'Не указано';
    }

    public function getFormattedTotalTimeAttribute(): string
    {
        return "{$this->total_time_minutes} мин.";
    }
}
