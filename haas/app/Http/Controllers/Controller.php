<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function user_id() {
        if(Session::has('user_id')) {
            return Session::get('user_id');
        } else {
            return $this->cookie('user_id');
        }

    }

    public function dd($data) {
        echo "<pre>";
            var_dump($data);
        echo "</pre>";
        exit;
    }

    function setCookie($arr = [], $time) {
        foreach ($arr as $key => $value) {
            setcookie($key, $value, time() + 60 * $time);
        }
    }

    function cookie($name) {
       return @$_COOKIE[$name];
    }

    function destroy_cookie($arr = [], $time) {
        foreach ($arr as $key => $value) {
            setcookie($key, $value, time() - 60 * $time);
        }
    }

    public function dateFormat($date, $format) {
        $date = new DateTime($date);
        $date = $date->format($format);
        return $date;
    }
}
