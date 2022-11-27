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
        <tr>
            <th scope="row">1</th>
            <td>علیرضا فهیمی</td>
            <td>4</td>
            <td>1</td>
            <td>14 : 30</td>
            <td>2 آذر</td>
            <td><a href="#"><i class="fa fa-eye" style="font-size: 20px"></i></a></td>
        </tr>
        </tbody>
    </table>
@endsection
