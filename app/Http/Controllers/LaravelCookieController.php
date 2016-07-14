<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;

class LaravelCookieController extends Controller
{
    public function setCookie(Request $request)
    {
        $hasCounter = $request->hasCookie('counter');   // check
        $hasCounter = Cookie::has('counter');

        if ($hasCounter) {
            $counter = $request->cookie('counter');     // read
            $counter = Cookie::get('counter');

            $counter++;
        } else {
            $counter = 1;
        }

        $response = response()
            ->view('cookie', ['counter' => $counter]);

        $response->withCookie('counter', $counter);

//        $response->withCookie(cookie()->forever('counter', $counter)); // for 5 years

        return $response;

    }

    public function unsetCookie()
    {
        return redirect('/cookie-sample/laravel/set')
            ->withCookie(Cookie::forget('counter'));
    }
}
