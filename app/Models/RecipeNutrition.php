<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeNutrition extends Model
{
    use HasFactory;

    protected $table = 'recipe_nutrition';

    protected $fillable = [
        'recipe_id',
        'calories',
        'fat',
        'saturated_fat',
        'carbohydrates',
        'fiber',
        'sugar',
        'protein',
        'salt',
    ];

    protected $casts = [
        'calories' => 'integer',
        'fat' => 'decimal:2',
        'saturated_fat' => 'decimal:2',
        'carbohydrates' => 'decimal:2',
        'fiber' => 'decimal:2',
        'sugar' => 'decimal:2',
        'protein' => 'decimal:2',
        'salt' => 'decimal:2',
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }
}
