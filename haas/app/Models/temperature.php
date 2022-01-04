<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class temperature extends Model
{
    protected $table = 'temperature';
    protected $fillable = [
        'room_temperature', 'user_id'
    ];
    public $timestamps = [];
}
