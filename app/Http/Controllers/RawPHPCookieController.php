<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class RawPHPCookieController extends Controller
{
    public function setCookie()
    {
        if (isset($_COOKIE['counter'])) {       // check cookie
            $counter = $_COOKIE['counter'];     // read
            $counter++;
        } else {
            $counter = 1;
        }

        setcookie('counter', $counter, time() + 3600); // set for 1 hour

        return view('cookie')->with(['counter' => $counter]);
    }

    public function unsetCookie()
    {
        if (isset($_COOKIE['counter'])) {
            // set a cookie with an expiration date in the past
            setcookie('counter', '', -1);
        }

        return redirect('/cookie-sample/raw/set');
    }
}
