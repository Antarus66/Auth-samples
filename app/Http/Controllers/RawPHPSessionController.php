<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RawPHPSessionController extends Controller
{
    public function setSession()
    {
        session_start();

        if (isset($_SESSION['counter'])){       // check
            $_SESSION['counter']++;             // update
        } else {
            $_SESSION['counter'] = 1;           // set
        }

        return view('session')->with(['counter' => $_SESSION['counter']]);

    }

    public function unsetSession()
    {
        session_start();
        session_destroy();

        return redirect('/session-sample/raw/set');
    }
}
