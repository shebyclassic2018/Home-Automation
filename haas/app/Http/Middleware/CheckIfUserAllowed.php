<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckIfUserAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ctrl = new Controller();
        if(!Session::has('user_id') && $ctrl->cookie('user_id') == null){
            
            // $wrong_url  = $req->url();
            // Session::put('403_error', $wrong_url);
            return redirect('/403_error');
        }
        return $next($request);
    }
}
