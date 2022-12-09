<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\CalendarUtils;

class homeController extends Controller
{
    public function index()
    {
        return view('Client.index',[
            'foods' => Food::all(),
            'settings' => Setting::query()->first()
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
        $same_time = Order::query()->where('date' , \request('date'))->where('time' , \request('time'))->first();
        $same_table = Table::query()->find(\request('table'))->get();
        if ($same_table != null && $same_time != null)
        {
            return redirect()->back();
        }

        $foods = $request->input('foods');
        $food=array();
        for ($i=0 ; $i<count($foods) ; $i++)
        {
            if (in_array($foods[$i] , $food))
            {
                continue;
            }
            else{
                array_push($food,$foods[$i]);
            }
        }
        $counts=[count($food)];
        for ($i=0; $i<count($food) ; $i++)
        {
            $counts[$i]=0;
            for ($j=0;$j<count($foods);$j++)
            {
                if($foods[$j]==$food[$i])
                {
                    $counts[$i] += 1;
                }
            }
        }
        // در این حلقه پایینی مجموع صورتحساب محاسبه میشود
        $bill = 0;
        for ($i=0 ; $i < count($food) ; $i++)
        {
            $cost = Food::query()->where('id', $food[$i])->first();
            $bill += ($cost->price*$counts[$i]);
        }

        $dates = explode(',', \request('date'));
        $date = CalendarUtils::toGregorian($dates[0], $dates[1], $dates[2]);
        $date = implode('-',$date);
        $order = Order::create([
           'customer' => \request('name'),
           'phone' => \request('phone'),
           'date' => $date,
           'meal' => \request('meal'),
           'time' => \request('time'),
           'guests' => \request('guest'),
           'bill' => $bill
        ]);
//        $user->roles()->syncWithPivotValues([1, 2, 3], ['active' => true]);
//        $book->authors()->sync([5, 2, 10]);

        for ($i=0 ; $i < count($food) ; $i++)
        {
         $order->foods()->attach([$food[$i]],['count' => $counts[$i]]);
        }
         $order->tables()->attach(\request('table'));
         return redirect()->route('home');
    }
}
