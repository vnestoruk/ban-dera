<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const _RESERVED_NICKNAMES = [
        'admin',
        'administrator',
        'bandera',
        'ban-dera',
        'ban_dera',
        's-bandera',
        's_bandera',
        'stepan-bandera',
        'stepan_bandera',
        'putin',
        'v-putin',
        'v_putin',
        'vova-putin',
        'vova_putin',
        'vladimir-putin',
        'vladimir_putin',
        'zelensky',
        'v-zelensky',
        'v_zelensky',
        'vova-zelensky',
        'vova_zelensky',
        'volodymyr-zelensky',
        'volodymyr_zelensky',
        'boris-johnson',
        'boris_johnson'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function suggestions()
    {
        return $this->hasMany(Target::class, 'suggested_by');
    }
}
