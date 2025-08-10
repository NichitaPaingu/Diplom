<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CookingTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'min_minutes',
        'max_minutes',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'min_minutes' => 'integer',
        'max_minutes' => 'integer',
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getTimeRangeAttribute(): string
    {
        if ($this->max_minutes) {
            return "{$this->min_minutes}-{$this->max_minutes} мин.";
        }
        return "от {$this->min_minutes} мин.";
    }
}
