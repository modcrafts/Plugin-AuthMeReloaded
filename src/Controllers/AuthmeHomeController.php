<?php

namespace Azuriom\Plugin\Authme\Controllers;

use Azuriom\Http\Controllers\Controller;

class AuthmeHomeController extends Controller
{
    /**
     * Show the home plugin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authme::index');
    }
}
