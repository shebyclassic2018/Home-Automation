<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    
    protected $table = 'schedule';
    protected $fillable = [
        'shr','smin','period','sync','ehr','emin', 'app_id'
    ];
    public $timestamps = [];
}
