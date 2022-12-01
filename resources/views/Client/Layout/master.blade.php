<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Client/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>رستوران</title>
</head>
<body dir="rtl" class="my-secondary-bg">
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa-solid fa-square-caret-up"></i></button>
<!-- Main Container -->
<section class="my-4 mx-4 my-white-bg border-5">
    <section class="container">
        <!-- nav -->
        <nav class="navbar justify-content-center navbar-expand-lg navbar-light bg-light mb-5 bg-white">
            <div class="container-fluid d-lg-none">
                <img src="/Client/images/logo.png" id="logo" width="100" class="navbar-brand" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="nav-bar navbar-nav">
                    <li class="nav-item ml-5">
                        <a class="nav-link " aria-current="page" href="#">پروفایل</a>
                    </li>
                    <li class="nav-item mx-5">
                        <a class="nav-link " aria-current="page" href="{{ route('order') }}">رزرو</a>
                    </li>
                    <a href="{{ route('home') }}" class="navbar-brand mx-5">
                        <img src="/Client/images/logo.png" id="logo" width="100" class="" alt="">
                    </a>
                    <li class="nav-item mx-5">
                        <a class="nav-link" href="{{ route('home') }}#menu">منو</a>
                    </li>
                    <li class="nav-item mr-5">
                        <a class="nav-link" href="{{ route('home') }}#about">درباره ما</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- end nav -->

        @yield('content')

        <!-- start footer -->
        <footer class="d-flex flex-column justify-content-between mt-5  flex-md-row pt-md-5">

            <div>
                <div style="width: 100px;" class="mx-auto mx-md-0">
                    <img class="w-100 " src="/Client/images/logo.png" alt="logo">
                </div>
                <p class="text-wrap mx-auto mx-md-0 w-75 mt-3 text-center text-md-end">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و ب
                    ا استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است
                </p>
                <div class="d-flex justify-content-center justify-content-md-start">
                    <div>
                        <a class="text-dark " href="#"> <i class="s-hover fa-brands fa-instagram"></i></a>
                    </div>
                    <div>
                        <a class="text-dark" href="#"><i class="s-hover fa-brands fa-facebook-f mx-5"></i></a>
                    </div>
                    <div>
                        <a class="text-dark" href="#"><i class="s-hover fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="mt-5 mt-md-0 mx-md-4" style="min-width: 300px;">
                <h5 class="text-center text-md-end">ساعت های کار</h5>
                <ul class="list-group text-center text-md-end">
                    <li class="list-group-item border-0"><span class="text-danger">نهار:</span> <span>11 الی 14</span></li>
                    <li class="list-group-item border-0"><span class="text-danger">شام:</span> <span>18 الی 22</span></li>
                </ul>
            </div>

            <div>
                <h5 class="mt-4 mt-md-0 text-center text-md-end">تماس با ما</h5>
                <p class="text-center">
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                </p>
                <ul class="list-group text-center text-md-end">
                    <li class="list-group-item border-0"><span class="text-danger">شماره تماس :</span> 33390962-021</li>
                    <li class="list-group-item border-0"><span class="text-danger">آدرس:</span> <span>تهران، شهر ری، دولت آباد</span></li>
                </ul>
            </div>


        </footer>
        <!-- end footer -->

        <div class="py-5 text-center ">
            <small>
                علیرضا فهیمی - پروژه دوره کارشناسی - دانشگاه صنعتی بیرجند
                <br>
                پاییز 1401
            </small>
        </div>
    </section>
</section>
<!-- End Main Container -->

<!-- scripts -->
<script src="/Client/js/js.js"></script>
</body>
</html>
