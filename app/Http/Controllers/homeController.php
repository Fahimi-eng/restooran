<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Table;
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
        return view('Client.order',[
            'tables' => Table::all()
        ]);
    }

    public function submit(Request $request)
    {
        dd($request);
    }
}
