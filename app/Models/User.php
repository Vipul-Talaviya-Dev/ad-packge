<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    const INACTIVE = 0, ACTIVE = 1;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fist_name', 'last_name', 'email', 'mobile', 'password', 'referral_code', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    
    /**
     * @return string
     * Referral Function
     */
    public static function referralCode()
    {
        $random = 'ADPACKING'.str_random(4);
        if (self::where('referral_code', $random)->first()) {
            $random = 'ADPACKING'.str_random(4);
        }

        return $random;
    }

    public function scopeActive($query)
    {
        return $query->where('users.status', self::ACTIVE);   
    }

    public function scopeInActive($query)
    {
        return $query->where('users.status', self::INACTIVE);   
    }
}
