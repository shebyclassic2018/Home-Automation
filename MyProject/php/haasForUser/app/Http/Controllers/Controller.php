<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function now($format){
        $tz_obj = new DateTimeZone("Africa/Nairobi");
        $now = new DateTime('now', $tz_obj);
        return $now->format($format);
    }
}
