<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function header()
    {
        return view('Admin.Setting.header',[
            'header' => Setting::query()->get(['header_title','header_body'])->first()
        ]);
    }
}
