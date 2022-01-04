<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    protected $table = 'schedule';
    protected $fillable = [
        'shr','smin','period','sync','ehr','emin'
    ];
    public $timestamps = [];
}
