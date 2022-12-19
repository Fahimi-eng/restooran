<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Order;
use App\Models\Setting;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Morilog\Jalali\CalendarUtils;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;


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
//        check the same reserve
        $same_time = Order::query()->where('date' , \request('date'))->where('time' , \request('time'))->first();
        $same_table = Table::query()->find(\request('table'))->get();
        if ($same_table != null && $same_time != null)
        {
            return redirect()->back();
        }
//        calculate the food numbers
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
//        calculate the bill of order
        $bill = 0;
        for ($i=0 ; $i < count($food) ; $i++)
        {
            $cost = Food::query()->where('id', $food[$i])->first();
            $bill += ($cost->price*$counts[$i]);
        }
//        shetabit and Payment gateway
        $this->pay(intval($bill));
//        convert persian date to gregorian
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

    public function pay($bill){
//        $invoice = new Invoice;
//        // Set invoice amount.
//        $invoice->amount($bill);
//        $invoice->detail(['detailName' => 'your detail goes here']);
//        Payment::purchase($invoice,function($driver, $transactionId) {
//            // We can store $transactionId in database.
//        })->pay()->render();

        return Payment::purchase(
            (new Invoice)->amount(1000),
            function($driver, $transactionId) {
                // Store transactionId in database.
                // We need the transactionId to verify payment in the future.
            }
        )->pay()->render();
    }
}
