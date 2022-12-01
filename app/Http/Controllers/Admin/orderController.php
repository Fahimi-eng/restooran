<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }

    public function create()
    {
        return view('Admin.Order.create');
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
