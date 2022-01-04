<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appliance extends Model
{
    use HasFactory;
    protected $table = 'appliance';
    protected $fillable = [
        'app_name', 'switch_no','access','user_id', 'pin', 'schedule_id', 'state'
    ];
    public $timestamps = [];
}
