<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'media_id',
        'parent_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'position',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'position' => 'integer',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('position');
    }

    public function media(): BelongsTo
    {
        return $this->belongsTo(Media::class);
    }

    public function recipes(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'recipe_category');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
