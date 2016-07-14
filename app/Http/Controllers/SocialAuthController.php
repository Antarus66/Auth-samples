<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{

    protected $redirectPath = '/';

    public function redirectToProvider(Request $request) {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        // Get a github user info
        $socialUser = Socialite::driver('github')->user();

        // Search in database
        $user = User::where(['email' => $socialUser->email])->first();

        // Create if not found
        if (is_null($user)) {
            $user = User::create([
                'name' => $socialUser->user['login'],
                'email' => $socialUser->email,
            ]);
        }

        Auth::login($user);

        return redirect($this->redirectPath);
    }
}
