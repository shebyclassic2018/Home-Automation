<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;
    protected $fillable = [
        'name', 'role', 'password',
    ];
    protected $table = 'user';
    public $timestamps = [];

}
