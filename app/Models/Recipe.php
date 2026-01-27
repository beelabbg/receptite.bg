<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Recipe extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'sections',
        'slug',
        'title',
        'description',
        'ingredients',
        'instructions',
        'prep_time_minutes',
        'cook_time_minutes',
        'total_time_minutes',
        'servings',
        'difficulty',
        'image_id',
        'no_comments',
        'comments_counter',
        'report',
        'like',
        'dislike',
        'votes',
        'published_on',
        'active',
        'tags',
    ];

    protected $casts = [
        'sections' => 'array',
        'tags' => 'array',
        'published_on' => 'datetime',
        'prep_time_minutes' => 'integer',
        'cook_time_minutes' => 'integer',
        'total_time_minutes' => 'integer',
        'servings' => 'integer',
        'no_comments' => 'boolean',
        'active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'recipe_category');
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id');
    }

    public function media(): BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'recipe_media')
            ->withPivot('description', 'position')
            ->orderBy('position');
    }

    public function nutrition(): HasOne
    {
        return $this->hasOne(RecipeNutrition::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(Collection::class, 'collection_recipe');
    }

    public function scopePublished($query)
    {
        return $query->where('active', true)->whereNotNull('published_on');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public static function generateSlug(string $title): string
    {
        $slug = Str::slug($title);
        $count = static::withTrashed()->where('slug', 'like', $slug . '%')->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function getTotalTimeAttribute(): ?int
    {
        if ($this->total_time_minutes) {
            return $this->total_time_minutes;
        }

        if ($this->prep_time_minutes === null && $this->cook_time_minutes === null) {
            return null;
        }

        return ($this->prep_time_minutes ?? 0) + ($this->cook_time_minutes ?? 0);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->image?->url;
    }
}
