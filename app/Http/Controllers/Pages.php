<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Pages extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
}
