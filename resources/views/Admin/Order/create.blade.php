@extends('Admin.Layouts.master')
@push('links')
<link rel="stylesheet" href="/persian-datepicker.min.css">
    <script src="/persian-date.min.js"></script>
    <script src="/persian-datepicker.min.js"></script>
@endpush
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".example1").pDatepicker({
                viewMode: 'day',
                format: 'dddd,MMMM DD'
            });
        });
    </script>


    <script>
        lunchTime = document.getElementById("lunch-time")
        dinnerTime = document.getElementById("dinner-time")

        selectBox = document.getElementById("selectbox")

        selectBox.addEventListener("change",function(e){
        if(this.value == "dinner"){
            lunchTime.classList.add("d-none")
            dinnerTime.classList.remove("d-none")
        }
        if(this.value == "lunch"){
        dinnerTime.classList.add("d-none")
        lunchTime.classList.remove("d-none")
        }
        })
    </script>
@endpush
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="m-5 d-inline-block">ثبت سفارش</h4>
        <a class="btn btn-primary m-5" href="{{ route('panel.food') }}"> بازگشت به صفحه قبل</a>
    </div>

    <form dir="rtl" action="{{ route('panel.food.store') }}" method="post" class="form m-5" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row g-3 align-items-center mb-5">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">نام مشتری</label>
            </div>
            <div class="col-auto">
                <input required name="name" type="text" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">
                مانند "مشتری 1"
                </span>
            </div>
        </div>

        <div class="row g-3 align-items-center mb-5">
            <div class="col-auto">
                <label for="phone" class="col-form-label">تلفن</label>
            </div>
            <div class="col-auto">
                <input required name="name" type="text" id="phone" class="form-control" aria-describedby="passwordHelpInline">
            </div>
            <div class="col-auto">
                <span id="phone" class="form-text">
                شماره موبایل مشتری
                </span>
            </div>
        </div>

        <div class="my-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="selectbox" class="col-form-label">وعده</label>
            </div>
            <div class="col-auto">
                <select name="meal" id="selectbox" class="form-select form-control" aria-label="Default select example">
                    <option value="lunch" selected>نهار</option>
                    <option value="dinner">شام</option>
                </select>
            </div>
            <div class="col-auto">
                <span id="selectbox" class="form-text">
                یک وعده را انتخاب نمایید
                </span>
            </div>
        </div>

{{--        lunch time      --}}

        <div id="lunch-time" class="my-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="time" class="col-form-label">ساعت رزرو</label>
            </div>
            <div class="col-auto">
                <select name="time" id="time" class="form-select form-control" aria-label="Default select example">
                    <option value="11:00">11:00</option>
                    <option value="11:30">11:30</option>
                    <option value="12:00">12:00</option>
                    <option value="12:30">12:30</option>
                    <option value="13:00">13:00</option>
                    <option value="13:30">13:30</option>
                </select>
            </div>
            <div class="col-auto">
                <span id="time" class="form-text">
                هر رزرو به مدت نیم ساعت می باشد
                </span>
            </div>
        </div>

{{--        dinner time       --}}

        <div id="dinner-time" class="d-none my-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="time" class="col-form-label">ساعت رزرو</label>
            </div>
            <div class="col-auto">
                <select name="time" id="time" class="form-select form-control" aria-label="Default select example">
                    <option value="11:00">19:00</option>
                    <option value="11:30">19:30</option>
                    <option value="12:00">20:00</option>
                    <option value="12:30">20:30</option>
                    <option value="13:00">21:00</option>
                    <option value="13:30">21:30</option>
                </select>
            </div>
            <div class="col-auto">
                <span id="time" class="form-text">
                هر رزرو به مدت نیم ساعت می باشد
                </span>
            </div>
        </div>

        <div class="row my-3 g-3 align-items-center">
            <div class="col-auto">
                <label for="date" class="col-form-label">تاریخ</label>
            </div>
            <div class="col-auto">
                <input id="date" type="text" class="example1 form-control" />
            </div>
            <div class="col-auto">
                <span id="date" class="form-text">
                تاریخ رزرو
                </span>
            </div>
        </div>

        <div class="my-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="table" class="col-form-label">تعداد میهمان</label>
            </div>
            <div class="col-auto">
                <input type="number" min="1" max="10" class="form-control">
            </div>
            <div class="col-auto">
                <span id="table" class="form-text">
                تعیین
                </span>
            </div>
        </div>

        <div class="my-3 row g-3 align-items-center">
            <div class="col-auto">
                <label for="table" class="col-form-label">میز</label>
            </div>
            <div class="col-auto">
                <select name="time" id="table" class="form-select form-control" aria-label="Default select example">
                    <option value="1">میز شماره یک - 4 صندلی</option>
                    <option value="2">میز شماره دو - 2 صندلی</option>
                    <option value="3">میز شماره سه - 5 صندلی</option>
                </select>
            </div>
            <div class="col-auto">
                <span id="table" class="form-text">
                تعیین
                </span>
            </div>
        </div>




        {{--        ---------------------------------         --}}
        <div class="mt-5">
            <button type="submit" class="btn btn-primary">ثبت</button>
        </div>
    </form>

@endsection
