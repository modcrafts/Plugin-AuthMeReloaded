<?php

namespace Azuriom\Plugin\AuthMe\Controllers;

use Azuriom\Http\Controllers\Controller;

class AuthMeHomeController extends Controller
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
