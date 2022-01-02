<?php

namespace App\Http\Controllers;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
           
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/login');
     
            }else{
                $newUser = User::create([
                    'first_name' => $user->name,
                    'last_name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'role' => 0,
                    'password' => encrypt('123456dummy')
                ]);
    
                Auth::login($newUser);
     
                return redirect('/login');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
