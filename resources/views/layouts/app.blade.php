<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '|Home') }}</title>


    <link rel="shortcut icon" href="{{ asset('assets/dist/img/meesaqblack.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/dist/img/meesaqblack.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/main/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/plugins/testimonial/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/testimonial/css/owl.theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/main/css/style.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.css') }}">
</head>
<style>
th{
text-align: center;
}
</style>
<body>

    
    <header class="shadow-md">
        <div class="hed-top bg-secondary d-sm-block border-bottom">
            <div class="container-xl">
                <div class="p-2 row">
                    <div class="col-lg-9 d-none d-lg-block">
                        <ul class=" leftlist ld fs-8 fw-bold">
                            <li class="p-2 px-3 float-start">
                                <i class="bi text-primary bi-envelope "></i> contact@meesaq.com
                            </li>
                            <li class="p-2 px-3 float-start">
                                <i class="bi text-primary bi-telephone"></i> 03028248442
                            </li>
                            <li class="p-2 px-3 float-start">
                                <i class="bi text-primary bi-geo-alt"></i> PECHS, Karachi
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <ul class=" float-end">
                            <li class="p-3 py-2 float-start fs-8"><a href="https://www.facebook.com/profile.php?id=61558644660474"> <i class="bi bi-facebook"></i></a></li>
                            {{-- <li class="p-3 py-2 float-start fs-8"><a href="https://www.linkedin.com/showcase/103469328/admin/feed/posts/"> <i class="bi bi-twitter"></i></a></li>
                            <li class="p-3 py-2 float-start fs-8"><a href="https://www.linkedin.com/showcase/103469328/admin/feed/posts/"> <i class="bi bi-instagram"></i</a>></li> --}}
                            <li class="p-3 py-2 float-start fs-8"><a href="https://www.linkedin.com/showcase/103469328/admin/feed/posts/"> <i class="bi bi-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-jk" class="bg-white nav-part">
            <div class="container-xl">
                <div class="bg-white row navcol">
                    <div class="col-lg-1">
                        <img class="py-3 max-230" src="{{ asset('assets/dist/img/meesaqblack.png') }}" alt=""
                            height="120">
                        <a data-bs-toggle="collapse" data-bs-target="#menu" class="pt-4 float-end d-lg-none ps-3"><i
                                class="bi fs-1 cp bi-list"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 align-self-center d-none d-lg-block">
                        <ul class="mb-3 fw-bold float-md-end mb-md-0 nacul fs-7">
                            <li class="p-3 px-4 float-md-start active"><a href="{{ route('home') }}">Home</a></li>
                            <li class="p-3 px-4 float-md-start"><a href="{{ route('about') }}">About us</a></li>
                            <li class="p-3 px-4 float-md-start"><a href="{{ route('services') }}">Product & Services</a></li>
                            {{-- <li class="p-3 px-4 float-md-start"><a href="{{ route('pricing') }}">Pricing</a></li>
                            <li class="p-3 px-4 float-md-start"><a href="{{ route('posts.index') }}">Documentation</a></li> --}}
                            <li class="p-3 px-4 float-md-start"><a href="{{ route('contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 d-none d-lg-block align-self-center float-end">
                        @guest
                        @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="px-3 py-3 btn btn-primary btn-sm d-inline fw-bolder">Login</a>


                        @endif

                        {{-- @if (Route::has('register'))

                            <a href="{{ route('register') }}" class="px-3 py-3 btn btn-primary btn-sm d-inline fw-bolder">Demo</a>

                        @endif --}}
                    @else
                    <a href="{{ route('dashboard') }}" class="px-3 py-3 btn btn-primary btn-sm d-inline fw-bolder">Dashboard</a>

                    <a class="px-3 py-3 btn btn-primary btn-sm d-inline fw-bolder" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}</a>

                <form class="was-validated" id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                </form>
                    @endguest
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        @yield('content')
    </div>
    {{-- <div class="container"> --}}
        <div class="py-5 footer-cta bg-secondary">
            <div class="container-xl">

          <div class="text-center row">
            <div class="col-sm-6 col-xl-4 mb-30">
              <div class="single-cta">
                {{-- <i class="fas fa-map-marker-alt"></i> --}}
                <div class="cta-text">
                   <img src="{{ asset('assets/dist/img/phone.png') }}" alt="">
                  <h3 class="mt-2">Call us</h3>
                  <span>03028248442</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-30">
              <div class="single-cta">
                {{-- <i class="fas fa-phone"></i> --}}
                <div class="cta-text">
                    <img src="{{ asset('assets/dist/img/email.png') }}" alt="">
                    <h3 class="mt-2">Mail us</h3>
                    <span>contact@meesaq.com</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-4 mb-30">
              <div class="single-cta">
                {{-- <i class="fas fa-envelope-open"></i> --}}
                <div class="cta-text">
                    <a href="https://www.linkedin.com/showcase/103469328/admin/feed/posts/">
                        <img src="{{ asset('assets/dist/img/linkedin.png') }}" alt="">
                    </a>
                  <h3 class="mt-2">Follow us</h3>
                  <span>Message</span>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <footer class="bg-primary text-light big-padding">
        <div class="container-xl">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-light fw-bolder fs-5">Meesaq</h3>
                    <p>The Org. Studio is a boutique advisory firm that specializes in business transformation and operational excellence.
                        Our seasoned professionals bring a wealth of experience and expertise, offering strategic insights, market analysis, and customized advisory services that enable our clients to make informed decisions and drive sustainable growth. Whether you are a start-up, a small or medium-sized enterprise, or a multinational corporation, our services are tailored to guide you through challenges, capitalize on opportunities, and optimize your business performance. Fore more information please visit www.theorgstudio.com
                        </p>

                    <div class="pt-4 d-flex">
                        <div class="icon">
                            <i class="p-2 bi fs-2 bi-telephone-forward"></i>
                        </div>
                        <div class="text-white detail">
                            <h6 class="text-white">Talk with Expert</h6>
                            <h3 class="text-white fs-5 fw-bolder">03028248442</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <h3 class="text-light fw-bolder fs-5">Quick links</h3>
                    <ul class="list-unstyled fw-bolder">
                        <li class="p-2 "><a class="text-white" href="{{ route('home') }}"><i class="bi bi-caret-right-fill"></i>
                                Home</a></li>
                        <li class="p-2"><a class="text-white" href="{{ route('about') }}"><i class="bi bi-caret-right-fill"></i>
                                About us</a></li>
                        <li class="p-2"><a class="text-white" href="{{ route('services') }}"><i class="bi bi-caret-right-fill"></i>
                                Services</a></li>
                        {{-- <li class="p-2"><a class="text-white" href="{{ route('pricing') }}"><i
                                    class="bi bi-caret-right-fill"></i> Pricing</a></li> --}}

                        <li class="p-2"><a class="text-white" href="{{ route('contact') }}"><i
                                    class="bi bi-caret-right-fill"></i> Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="text-light fw-bolder fs-5">Our Services</h3>
                    <ul class="list-unstyled fw-bolder">
                        <li class="p-2 "><a class="text-white" href="#"><i
                                    class="bi bi-caret-right-fill"></i> Governance</a></li>
                        <li class="p-2"><a class="text-white" href="#"><i
                                    class="bi bi-caret-right-fill"></i> Sustainability Reporting</a></li>
                        <li class="p-2"><a class="text-white" href="#"><i
                                    class="bi bi-caret-right-fill"></i> ESG Strategy</a></li>
                        <li class="p-2"><a class="text-white" href="#"><i
                                    class="bi bi-caret-right-fill"></i> ESG data and audit readiness</a></li>

                    </ul>
                </div>
                <div class="col-md-3">
                    <h3 class="text-light fw-bolder fs-5">Reach us</h3>
                    <div class="pt-4 d-flex ">
                        <div class="p-2 icon">
                            <i class="p-2 bi fs-2 bi-telephone-forward"></i>
                        </div>
                        <div class="text-white detail">
                            <h6 class="text-white">For Support</h6>
                            <h3 class="text-white fs-6 fw-bolder">03028248442</h3>
                        </div>
                    </div>
                    <div class="pt-4 d-flex">
                        <div class="p-2 icon">
                            <i class="p-2 bi fs-2 bi-envelope"></i>
                        </div>
                        <div class="text-white detail">
                            <h6 class="text-white">Email us</h6>
                            <h3 class="text-white fs-6 fw-bolder">contact@meesaq.com</h3>
                        </div>
                    </div>
                    <div class="pt-4 d-flex">
                        <div class="p-2 icon">
                            <i class="p-2 bi fs-2 bi-geo-alt"></i>
                        </div>
                        <div class="text-white detail">
                            <h6 class="text-white">Address</h6>
                            <h3 class="text-white fs-7 fw-bolder">
                                No 12/145, Johar, Karachi, Sindh, Pakistan, - 755206
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->
    <div class="text-center copy">
        <div class="container">
            <a href="">2024 &copy; All Rights Reserved | Designed and Developed by Scitforte</a>

        </div>
    </div>





</body>
<script src="{{ asset('assets/main/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/plugins/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/main/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('assets/plugins/testimonial/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/typewrite.min.js') }}"></script>
<script src="{{ asset('assets/main/js/script.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#monthly').on('change', function () {
            if ($(this).is(':checked')) {
                $('#monthly-plans').show();
                $('#annual-plans').hide();
            }
        });

        $('#annual').on('change', function () {
            if ($(this).is(':checked')) {
                $('#monthly-plans').hide();
                $('#annual-plans').show();
            }
        });
    });
</script>
</html>
