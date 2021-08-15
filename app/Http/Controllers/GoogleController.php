<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
            // dd($user);
            $findUser = User::where('google_id', $user->getId())->first();
            if($findUser) {
                Auth::login($findUser);
                return redirect()->intended('dashboard');
            } else {
                // tambah data ke table user
                // dd($user->id);
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('RahasiaYes'),
                    // 'remember_token' => $user->token,
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
