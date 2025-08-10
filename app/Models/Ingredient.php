<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'calories_per_100g',
        'protein_per_100g',
        'fat_per_100g',
        'carbs_per_100g',
        'fiber_per_100g',
        'description',
        'is_active',
        'sort_order',
        'additional_nutrition',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'calories_per_100g' => 'decimal:2',
        'protein_per_100g' => 'decimal:2',
        'fat_per_100g' => 'decimal:2',
        'carbs_per_100g' => 'decimal:2',
        'fiber_per_100g' => 'decimal:2',
        'additional_nutrition' => 'array',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipe_ingredients')
            ->withPivot('amount', 'unit', 'notes', 'is_optional')
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category_id', $category);
    }
}
