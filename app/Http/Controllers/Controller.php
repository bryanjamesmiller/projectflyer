<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        // It would be much better to put this in a service provider
        // and provide it to all routes.  This is basically
        // creating two variables, "signedIn" and "user",
        // that are slightly more readable than Auth::check() and Auth::user().
        view()->share('signedIn', Auth::check());
        view()->share('user', Auth::user());
    }
}
