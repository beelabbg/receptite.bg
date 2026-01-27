<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar_id',
        'about_me',
        'social_links',
        'newsletter_subscribed',
        'newsletter_categories',
        'newsletter_content',
        'provider',
        'provider_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'social_links' => 'array',
        'newsletter_subscribed' => 'boolean',
        'newsletter_categories' => 'array',
        'newsletter_content' => 'array',
    ];

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function collections(): HasMany
    {
        return $this->hasMany(Collection::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function socialAccounts(): HasMany
    {
        return $this->hasMany(SocialAccount::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class);
    }

    public function avatarMedia(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'avatar_id');
    }

    public function getFullNameAttribute(): string
    {
        if ($this->first_name || $this->last_name) {
            return trim("{$this->first_name} {$this->last_name}");
        }

        return $this->name;
    }

    public function getAvatarUrlAttribute(): ?string
    {
        if ($this->avatarMedia) {
            return $this->avatarMedia->url;
        }

        if ($this->avatar) {
            if (str_starts_with($this->avatar, 'http')) {
                return $this->avatar;
            }
            return asset('storage/' . $this->avatar);
        }

        return null;
    }
}
