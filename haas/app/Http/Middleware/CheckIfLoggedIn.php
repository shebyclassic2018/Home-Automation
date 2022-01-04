<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CheckIfLoggedIn
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
        if(Session::has('user_id')){
            return redirect('/home/appliance');
        }

        $ctrl = new Controller();

        if ($ctrl->cookie('user_id') !== null) {
            return redirect('/home/appliance');
        }
        return $next($request);
    }
}
