@extends('Client.Layout.master')
@section('content')
    <!-- start form -->
    <form id="regForm" action="{{ route('order.submit') }}" method="post" class="border border-3 rounded-3">
        @csrf
        @method('POST')
        <h1 class="mb-5">پرداخت</h1>
        <!-- One "tab" for each step in the form: -->
        @dd($bill)
        <div style="float:right;">
            <button class="btn btn-danger" type="submit" id="nextBtn">پرداخت</button>
        </div>
        <div style="text-align:center;margin-top:40px;">
            <span class="step "></span>
            <span class="step active"></span>
        </div>
    </form>
    <!-- end form -->
@endsection
