<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('Client.index',[
            'foods' => Food::all()
        ]);
    }

    public function order()
    {
        return view('Client.order');
    }
}
