<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class switches extends Model
{
 
    protected $table = 'switches';
    protected $fillable = [
        'sw','pin'
    ];
    public $timestamps = [];
}
