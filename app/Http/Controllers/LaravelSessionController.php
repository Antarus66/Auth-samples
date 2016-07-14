<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class LaravelSessionController extends Controller
{
    public function setSession(Request $request)
    {
        $hasCounter = $request->session()->has('counter');     // check
        $hasCounter = Session::has('counter');

        if ($hasCounter) {
            $counter = $request->session()->get('counter');    // get
            $counter++;
        } else {
            $counter = 1;
        }

        $request->session()->put('counter', $counter); // set

        return view('session')->with(['counter' => $counter]);

    }

    public function unsetSession()
    {
        Session::forget('counter');     // remove the key
//        Session::flush();             // remove all the keys

        return redirect('/session-sample/laravel/set');
    }
}
