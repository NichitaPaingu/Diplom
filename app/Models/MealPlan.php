<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MealPlan extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'total_calories',
        'total_protein',
        'total_fat',
        'total_carbs',
        'goal_id',
        'subscription_required',
        'is_premium',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'total_calories' => 'decimal:2',
        'total_protein' => 'decimal:2',
        'total_fat' => 'decimal:2',
        'total_carbs' => 'decimal:2',
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function goal(): BelongsTo
    {
        return $this->belongsTo(Goal::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(MealPlanItem::class);
    }
}
