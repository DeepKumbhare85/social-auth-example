<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {

        try {
            $user = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            return redirect('/')->with('error', `Google authentication failed.`);
        }


        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::updateOrCreate([
                'email' => $user->email
            ], [
                'name' => $user->name,
                'password' => bcrypt(request(Str::random())), // Set a random password for the user
                'email_verified_at' => now()
            ]);
            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
}
