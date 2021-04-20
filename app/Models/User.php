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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'slug',
        'about',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * A 'User' has many 'Posts'
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * "God mode" meaning the user can do _anything_
     *
     * @return bool
     */
    public function getIsGodAttribute(): bool
    {
        return $this->id == config('auth.god_mode_id');
    }

    /**
     * Get users' Gravatar
     *
     * @return string
     */
    public function getAvatarAttribute(): string
    {
        return sprintf('https://secure.gravatar.com/avatar/%s?s=200', md5($this->email));
    }

    public function getTwoFactorEnabledAttribute(): bool
    {
        return $this->two_factor_secret ?? false;
    }
}
