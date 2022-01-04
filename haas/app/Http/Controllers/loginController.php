<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(Request $req) {
        $data = $req->input();
        $email = $data['username'];
        $password = $data['pwd'];
        $remme = '';
        if(isset($data['remember'])) {
            $remme = $data['remember'];
        } 

        $check_user = User::join ('email as e', [
                        'e.user_id' => 'user.id' 
                    ])
                    -> where([
                        'email_address' => $email,
                        'password' => $password
                    ])
                    ->get();
        if (count($check_user) == 1) {
            foreach($check_user as $user_info) {
                $username = $user_info->name;
                $user_id = $user_info->id;
            }
            if(empty($remme)) {
                Session::put('user_id', $user_id);
                Session::put('username', $username);
                Session::put('email', $email);
            } else { 
                $this->setCookie([
                    'user_id' => $user_id,
                    'username' => $username,
                    'email' => $email
                ], 60 * 24 * 365);
            }
            return $username;
        } else {
            return "user_not_found";
        }  
     }


     public function logout() {
         if (Session::has('user_id') || $this->cookie('user_id') !== null) {
             if(Session::has('user_id')){Session::flush();}
             if($this->cookie('user_id') !== null) {$this->destroy_cookie([
                 'user_id' => 0,
                 'username' => 'John Doe',
                 'email' => 'example@haas.com'
             ], 60 * 24 * 365);}
             return redirect('/');
         }
     }
}
