@extends('Admin.Layouts.master')
@section('content')
    <div>
        <h4 class="m-5">لیست سفارشات</h4>
    </div>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">سفارش دهنده</th>
            <th scope="col">تعداد میهمان </th>
            <th scope="col">شماره میز</th>
            <th scope="col">ساعت</th>
            <th scope="col">تاریخ</th>
            <th scope="col">جزئیات</th>
        </tr>
        </thead>

        <tbody>
        @foreach($orders as $key=>$order)
        <tr>
            <th scope="row">{{ $key }}</th>
            <td>{{ $order->customer }}</td>
            <td>{{ $order->guests }}</td>
            <td>{{ $order->tables[0]->name }}</td>
            <td>{{ $order->time }}</td>
            @php
                $date = new \Carbon\Carbon($order->date);
                $date = \Morilog\Jalali\CalendarUtils::tojalali($date->year, $date->month, $date->day);
            @endphp
            <td>{{ implode('/',$date) }}</td>
{{--            <td>{{ $order->pivot->counts }}</td>--}}
            <td><a href="{{ route('panel.order.show',$order->id) }}"><i class="fa fa-eye" style="font-size: 20px"></i></a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
