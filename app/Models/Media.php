<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'mediable_type',
        'mediable_id',
        'collection',
        'file_name',
        'description',
        'source',
        'keywords',
        'mime_type',
        'size',
        'type',
        'width',
        'height',
        'duration',
        'meta',
        'converted',
        'converted_progress',
        'embed',
    ];

    protected $casts = [
        'meta' => 'array',
        'converted' => 'boolean',
        'size' => 'integer',
        'width' => 'integer',
        'height' => 'integer',
        'duration' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mediable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getUrlAttribute(): ?string
    {
        if ($this->embed) {
            return $this->embed;
        }

        if ($this->file_name) {
            return asset('storage/media/' . $this->file_name);
        }

        return null;
    }
}
