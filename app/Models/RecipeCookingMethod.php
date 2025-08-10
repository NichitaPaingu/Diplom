<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeCookingMethod extends Model
{
    protected $fillable = [
        'recipe_id',
        'cooking_method_id',
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function cookingMethod(): BelongsTo
    {
        return $this->belongsTo(CookingMethod::class);
    }
}
