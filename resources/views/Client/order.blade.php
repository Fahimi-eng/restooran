@extends('Client.Layout.master')
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $(".example1").pDatepicker({
                format: 'YYYY,MM,DD',
                initialValue: false,
                formatter: function (unixDate){
                    var self = this;
                    var pdate = new persianDate(unixDate);
                    pdate.formatPersian = false;
                    return pdate.format(self.format);
                }
            });
        });
    </script>

    <script type="text/javascript">
        let select_lunch = document.getElementById("time1");
        let select_dinner = document.getElementById("time2");
    </script>

    <script type="text/javascript">
        function checkDate(){
            console.log(321)
            const dateInput = document.querySelector('#date');
            let time='';
            let class_name = '';
            let dd = document.getElementById('lunch-time').classList;
            dd.forEach((item)=>{
                class_name = item;
            })
            if(class_name == '')
            {
                 time = document.querySelector('#time1').selectedOptions[0].value;
            }
            else {
                 time = document.querySelector('#time2').selectedOptions[0].value;
            }
            console.log('this is time ->',time);
            let date = dateInput.value;
            $.ajax({
                url:'/ajax/order/checkDate',
                type:'POST',
                data:{
                    _token: '{{ csrf_token() }}',
                    date: date,
                    time: time
                },
                success:function (data){
                    console.log(data)
                }
            })
        }
    </script>
    <script type="text/javascript">
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
    <script type="text/javascript">
        function selectePerson(selected){
            $.ajax({
                url: 'http://127.0.0.1:8000/ajax/get/food',
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    let select = `<select name="foods[]" id="" class="form-select form-control" aria-label="Default select example">`;
                    data.forEach((item) => {
                        select += `<option value='${item.id}'>${item.name}</option>`;
                    })
                    select += `</select>`;
                    const foodPerson = document.querySelector('#foodPerson');
                    let foods = ``;
                    for(let i=0; i < selected.value; i++){
                    foods += `<div class="mt-3 mt-md-4 mx-md-2">
                        <label for="" class="text-dark">انتخاب غذای فرد <span> ${1+i} </span></label>` +
                         select +
                        `</div>`;
                    }
                    foodPerson.innerHTML = foods;
                }
            })
        }
    </script>
@endpush
@push('links')
    <link rel="stylesheet" href="/Client/css/persian-datepicker.min.css">
    <script src="/Client/js/persian-date.min.js"></script>
    <script src="/Client/js/persian-datepicker.min.js"></script>
@endpush


@section('content')

    <!-- start form -->
    <form id="regForm" action="{{ route('order.submit') }}" method="post" class="border border-3 rounded-3">
        @csrf
        @method('POST')
        <h1 class="mb-5">سفارش و رزرو</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="tab mb-2 text-danger">
            <label for="name"><span class="fs-6">نام :</span></label>
            <p><input name="name" class="rounded-3" placeholder="نام خود را وارد کنید..." oninput="this.className = ''"></p>
            <label for="phone"><span class="fs-6">تلفن :</span></label>
            <p><input name="phone" class="rounded-3" placeholder="شماره موبایل..." oninput="this.className = ''"></p>
            <div>
                <label for="guest"><span class="fs-6 text-danger">تعداد افراد :</span></label>
                <p><input name="guest" onchange='selectePerson(this)' type="number" min="1" max="10" class="rounded-3" placeholder="تعداد ..." oninput="this.className = ''"></p>
            </div>
            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div>
                    <label for="date"><span class="fs-6">تاریخ :</span></label>
                        <input id="date" name="date" placeholder="تاریخ رزرو..." oninput="this.className = ''" class="rounded-3 example1" type="text" />
                </div>
                <div class="d-flex justify-content-between">
                    <div class="ms-2">
                        <label for="meal">وعده:</label>
                        <select name="meal" id="selectbox" class="form-select form-control" aria-label="Default select example">
                            <option value="lunch" selected>نهار</option>
                            <option value="dinner">شام</option>
                        </select>
                    </div>
                    <div id="lunch-time">
                        <label for="time"><span class="fs-6">ساعت :</span></label>
                        <select name="time" id="time1" class="form-select form-control" aria-label="Default select example">
                            <option value="11:00">11:00</option>
                            <option value="11:30">11:30</option>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                        </select>
                    </div>
                    <div id="dinner-time" class="d-none">
                        <label for="time">ساعت</label>
                        <select name="time" id="time2" class="form-select form-control" aria-label="Default select example">
                            <option value="19:00">19:00</option>
                            <option value="19:30">19:30</option>
                            <option value="20:00">20:00</option>
                            <option value="20:30">20:30</option>
                            <option value="21:00">21:00</option>
                            <option value="21:30">21:30</option>
                        </select>
                    </div>
                </div>
                <div class="text-center">
                    <button class="mt-4 btn btn-danger my-auto" onclick="checkDate()" type="button">بررسی تاریخ رزرو</button>
                </div>
            </div>

            <div>
                <label for="table" class="text-danger mt-3">انتخاب میز</label>
                <select  name="table" id="table" class="form-select form-control" aria-label="Default select example" >
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}"><span>{{ $table->name }}</span>-<span>{{ $table->capacity }} نفره</span></option>
                    @endforeach
                </select>
            </div>
            <div id='foodPerson' class="d-flex flex-wrap flex-column flex-md-row py-3 justify-content-start flex-wrap">
                <div class="d-none mt-3 mt-md-2">
                    <label for="" class="text-dark">انتخاب غذای فرد <span>1</span></label>
                    <select name="food3" id="" class="form-select form-control" aria-label="Default select example">
                        <option><span>تعداد افراد را مشخص نمایید</span></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="tab">
            صورتحساب و پرداخت
        </div>
        <div class="mt-5" style="overflow:auto;">
            <div style="float:right;">
                <button class="btn btn-outline-danger" type="button" id="prevBtn" onclick="nextPrev(-1)">قبلی</button>
                <button class="btn btn-danger" type="button" id="nextBtn" onclick="nextPrev(1)">بعدی</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
    <!-- end form -->
@endsection
