<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeDietType extends Model
{
    protected $fillable = [
        'recipe_id',
        'diet_type_id',
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function dietType(): BelongsTo
    {
        return $this->belongsTo(DietType::class);
    }
}
