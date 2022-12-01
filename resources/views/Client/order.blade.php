@extends('Client.Layout.master')
@section('content')
    <!-- start form -->
    <form id="regForm" action="" class="border border-3 rounded-3">

        <h1 class="mb-5">سفارش و رزرو</h1>

        <!-- One "tab" for each step in the form: -->
        <div class="tab mb-2 text-danger">
            <label for="name"><span class="fs-6">نام :</span></label>
            <p><input name="name" class="rounded-3" placeholder="نام خود را وارد کنید..." oninput="this.className = ''"></p>

            <label for="phone"><span class="fs-6">تلفن :</span></label>
            <p><input name="phone" class="rounded-3" placeholder="شماره موبایل..." oninput="this.className = ''"></p>


            <div class="d-flex flex-column flex-md-row justify-content-between">
                <div>
                    <label for="date"><span class="fs-6">تاریخ :</span></label>
                    <input name="date" placeholder="تاریخ رزرو..." oninput="this.className = ''" class="rounded-3 example1" type="text" />
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
                        <select name="time" id="time" class="form-select form-control" aria-label="Default select example">
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
                        <select name="time" id="time" class="form-select form-control" aria-label="Default select example">
                            <option value="11:00">19:00</option>
                            <option value="11:30">19:30</option>
                            <option value="12:00">20:00</option>
                            <option value="12:30">20:30</option>
                            <option value="13:00">21:00</option>
                            <option value="13:30">21:30</option>
                        </select>
                    </div>
                </div>


            </div>

        </div>

        <div class="tab">
            <div>
                <label for="guest"><span class="fs-6 text-danger">تعداد افراد :</span></label>
                <p><input type="number" min="0" max="10" name="guest" class="rounded-3" placeholder="تعداد ..." oninput="this.className = ''"></p>
            </div>
            <div>
                <label for="table" class="text-danger">انتخاب میز</label>
                <select name="table" id="table" class="form-select form-control" aria-label="Default select example">
                    <option value="11:00"><span>میز شماره 1</span>-<span>2 نفره</span></option>
                    <option value="11:00"><span>میز شماره 2</span>-<span>4 نفره</span></option>
                    <option value="11:00"><span>میز شماره 3</span>-<span>1 نفره</span></option>
                </select>
            </div>

            <div class="d-flex flex-column flex-md-row py-3 justify-content-between flex-wrap">
                <div class="mt-3 mt-md-0">
                    <label for="" class="text-dark">انتخاب غذای فرد <span>1</span></label>
                    <select name="food1" id="" class="form-select form-control" aria-label="Default select example">
                        <option value="11:00"><span>قورمه سبزی</span></option>
                        <option value="11:00"><span>قورمه سبزی</span></option>
                        <option value="11:00"><span>قورمه سبزی</span></option>
                    </select>
                </div>
                <div class="mt-3 mt-md-0">
                    <label for="" class="text-dark">انتخاب غذای فرد <span>2</span> </label>
                    <select name="food2" id="" class="form-select form-control" aria-label="Default select example">
                        <option value="11:00"><span>قورمه سبزی</span></option>
                        <option value="11:00"><span>قورمه سبزی</span></option>
                        <option value="11:00"><span>قورمه سبزی</span></option>
                    </select>
                </div>
                <div class="mt-3 mt-md-0">
                    <label for="" class="text-dark">انتخاب غذای فرد <span>3</span></label>
                    <select name="food3" id="" class="form-select form-control" aria-label="Default select example">
                        <option value="11:00"><span>قورمه سبزی</span></option>
                        <option value="11:00"><span>قورمه سبزی</span></option>
                        <option value="11:00"><span> سبزی پلو با ماهی</span></option>
                    </select>
                </div>
            </div>
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
