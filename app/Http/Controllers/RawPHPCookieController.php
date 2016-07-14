<?php

namespace App\Http\Controllers;

use App\Http\Requests;

class RawPHPCookieController extends Controller
{
    public function setCookie()
    {
        if (isset($_COOKIE['counter'])) {
            $counter = $_COOKIE['counter'];
            $counter++;
        } else {
            $counter = 0;
        }

        setcookie('counter', $counter, time() + 3600); // 1 hour

        return view('cookie')->with(['counter' => $counter]);
    }

    public function unsetCookie()
    {
        if (isset($_COOKIE['counter'])) {
            setcookie('counter', '', -1);
        }

        return redirect('/cookie-sample/raw/set');
    }
}
