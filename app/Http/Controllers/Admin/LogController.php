<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logs(Request $request)
    {
        return response()->download(storage_path("logs/laravel.log"));
    }
}
