@extends('Admin.Layouts.master')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h4 class="m-5 d-inline-block">تنظیمات سربرگ سایت</h4>
    <a class="btn btn-primary m-5" href="{{ route('panel.food') }}"> تنظیمات "درباره ما" سایت</a>
</div>

<form dir="rtl" action="" method="post" class="form m-5" >
    @csrf
    @method('POST')
    <div class="row g-3 align-items-center mb-5">
        <div class="col-auto">
            <label for="inputPassword6" class="col-form-label">عنوان</label>
        </div>
        <div class="col-auto">
            <input value="{{ $header->header_title }}" required name="name" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
        </div>
        <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                مانند "عاشق غذاهای خوشمزه"
                </span>
        </div>
    </div>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="exampleFormControlTextarea1" class="col-form-label">متن شگفتی ساز</label>
        </div>
        <div class="col-auto">
            <textarea required name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" cols="36">
                {{ $header->header_body }}
            </textarea>
        </div>
        <div class="col-auto">
                <span id="exampleFormControlTextarea1" class="form-text">
                 معرفی کوتاه و جذاب شما
                </span>
        </div>
    </div>

    {{--        ---------------------------------         --}}
    <div class="mt-5">
        <button type="submit" class="btn btn-primary">ثبت</button>
    </div>
</form>

@endsection
