<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('Client.index');
    }

    public function order()
    {
        return view('Client.order');
    }
}
