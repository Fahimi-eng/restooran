<section id="id1" class="fix-switch">
    <i class="fa-solid fa-xmark  menu-close d-lg-none"></i>
    <section class="switch px-3 py-4">
        <section class="logo px-3 py-4">
            <img src="/Admin/images/logo.png" alt="">
        </section>
        <section class="lists">
            <ul class="first-ul px-1 mt-4">
                <li class="first-li first">
                    <i class="fa-solid fa-folder-open"></i>
                    <span>سفارشات</span>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="avvali-ul">
                        <a href="{{ route('panel.dashboard') }}">
                            <li class="second-li my-3 ">
                                <i class="fa-solid fa-utensils"></i>
                                لیست سفارشات
                            </li>
                        </a>
{{--                        <a href="{{ route('panel.order.create') }}">--}}
{{--                            <li class="second-li my-3 ">--}}
{{--                                <i class="fa-solid fa-plus"></i>--}}
{{--                                ثبت سفارش--}}
{{--                            </li>--}}
{{--                        </a>--}}
                    </ul>
                </li>
                <li class="first-li second">
                    <i class="fa-solid fa-cube"></i>
                    <span>غذا و میز</span>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="second-ul">
                        <a href="{{ route('panel.tables') }}" >
                            <li class="second-li my-3 ">
                                <i class="fa-solid fa-chair"></i>
                                لیست میزها
                            </li>
                        </a>
                        <a href="{{ route('panel.tables.create') }}">
                            <li class="second-li my-3">
                                <i class="fa-solid fa-plus"></i>
                                افزودن میز جدید
                            </li>
                        </a>
                        <a href="{{ route('panel.food') }}">
                            <li class="second-li my-3">
                                <i class="fa-solid fa-pizza-slice"></i>
                                لیست غذا
                            </li>
                        </a>
                        <a href="{{ route('panel.food.create') }}">
                            <li class="second-li my-3">
                                <i class="fa-solid fa-plus"></i>
                                افزودن غذا
                            </li>
                        </a>
                    </ul>
                </li>
                <li class="first-li third">
                    <i class="fa-solid fa-wrench"></i>
                    <span>تنظیمات</span>
                    <i class="fa-solid fa-angle-down"></i>
                    <ul class="third-ul">
                        <a href="{{ route('panel.setting.edit') }}">
                            <li class="second-li my-3">
                                تنظیمات
                            </li>
                        </a>
                        <a href="#">
                            <li class="second-li my-3">
                                فعال سازی
                            </li>
                        </a>
                        <a href="#">
                            <li class="second-li my-3">
                                فراموشی رمز عبور
                            </li>
                        </a>
                    </ul>
                </li>
            </ul>
        </section>
    </section>
</section>
