<?php

namespace App\Http\Controllers\Admin\Customer;

use App\Http\Controllers\Admin\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.customer.index');
    }
}
