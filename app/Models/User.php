<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'about',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getIsGodAttribute(): bool
    {
        return $this->id == config('auth.god_mode_id');
    }

    public function getAvatarPathAttribute(): string
    {
        return $this->avatar ?: sprintf('https://secure.gravatar.com/avatar/%s?s=200', md5($this->email));
    }

    public function getTwoFactorEnabledAttribute(): bool
    {
        return $this->two_factor_secret ?? false;
    }
}
