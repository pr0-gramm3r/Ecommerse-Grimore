<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // change this

class Merchant extends Authenticatable // change this
{
    protected $fillable = [
        'google_id',
        'merchant_name',
        'merchant_email',
        'merchant_password',
        'merchant_phone',
        'merchant_avatar',
        'merchant_avatar_public_id',
        'merchant_address',
        'email_verified_at',
    ];
     
    public function getAuthPassword(){
        return $this->merchant_password;
    }
}