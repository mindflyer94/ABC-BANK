<?php

namespace App\Repositories;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AuthRepository
{
    
    public function register($data) {
        $user = new User();
        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);
        $user->is_policy_accepted = $data->is_policy_accepted;
        $user->save();
        if($user){
            Auth::login($user);
                return redirect(RouteServiceProvider::HOME)
                    ->withSuccess('You have successfully logged in!');
    
        }
    }

   
}
