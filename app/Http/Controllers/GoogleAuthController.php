<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exeption;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        try{
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getID())->first();

            if($user){
                Auth::login($user);
                return redirect()->intended('home');
            }
            else{
                $new_user = User::create([
                    'name'=> $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getID()
                ]);
                Auth::login($new_user);
                return redirect()->intended('userposts');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
