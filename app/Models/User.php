<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Utils\Helper;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'login_password',
        'password',
        'trojan_token',
        'subscription_token',
        'expire_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'login_password',
        'password',
        'remember_token',
        'trojan_token',
        'subscription_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_admin' => 'boolean',
            'email_verified_at' => 'datetime',
            'expire_at' => 'datetime',
        ];
    }

    // 覆盖 Illuminate\Auth\Authenticatable trait 中的属性
    protected $authPasswordName = 'login_password';

    public function isAdmin(): bool 
    {
        return $this->is_admin === true;
    }

    public static function generateTrojanToken()
    {
        return Helper::generateRandomCode();
    }
    public static function generateSubscriptionToken()
    {
        return Helper::generateRandomCode();
    }
}
