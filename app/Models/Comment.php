<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'recipe_id',
        'user_id',
        'content',
        'report',
        'like',
        'dislike',
    ];

    protected $casts = [
        'report' => 'integer',
        'like' => 'integer',
        'dislike' => 'integer',
    ];

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
