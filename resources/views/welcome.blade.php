<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Smart VMS - Visitor Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 13px;
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
            margin: 0;
            padding: 0;
            overflow-x: hidden;

        }

        .header {
            padding: 15px 50px;
        }

        .nav-link {
            color: #333;
            margin-right: 20px;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #007bff;
        }

        .btn-custom {
            font-size: 13px;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .hero-section {
            padding: 60px 50px;
        }

        .hero-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .hero-desc {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
            line-height: 1.8;
        }

        .footer {
            padding: 10px;
            font-size: 12px;
            text-align: center;
            color: #aaa;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: 10px;
        }

        .logo-img {
            height: 60px;
            /* Adjust height as needed */
            width: auto;
            /* Auto width to maintain aspect ratio */
            object-fit: contain;
            /* Make sure the image is contained without cropping */
        }

        .custom-hero-img {
            height: 350px;
            /* Adjust this height as needed */
            width: 100%;
            /* Maintain aspect ratio */
            object-fit: cover;
            /* Optional: cover to fill height and crop excess */
            border-radius: 10px;
            /* Optional: Rounded corners */
        }

        /* Make responsive for small devices */
        @media (max-width: 768px) {
            .custom-hero-img {
                height: 250px;
                /* Smaller height for mobile */
            }
        }
        .btn-custom{
            background: #950606 !important;
            color: #fff !important;
        }
        .btn-outline-custom{
            background: #fff !important;
            color: #950606 !important;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-img">
        </div>
        <div>
            {{-- <a href="#" class="nav-link d-inline-block">Pricing</a>
            <a href="#" class="nav-link d-inline-block">Features</a>
            <a href="#" class="nav-link d-inline-block">Testimonials</a>
            <a href="#" class="nav-link d-inline-block">FAQs</a>
            <a href="#" class="nav-link d-inline-block">Contact Us</a> --}}
            @if (Route::has('login'))
                <div class="mb-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-custom btn-custom">Dashbaord</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-custom btn-custom">Login</a>
                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-custom">Sign Up</a>
                        @endif --}}
                    @endauth
                </div>
            @endif

        </div>
    </div> 

    

    <!-- Hero Section -->
    <div class="hero-section row align-items-center">
        <div class="col-md-6">
            <h1 class="hero-title">Streamline Visitor Management Effortlessly</h1>
            <p class="hero-desc w-75">
                Enhance security, improve visitor experience, and automate check-ins with our Smart VMS.
                Designed for multi-company buildings and individual businesses, our system ensures seamless
                visitor tracking, real-time notifications, and compliance with ease.
            </p>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-custom">Get Started</a>
        </div>
        <div class="col-md-6 hero-image">
            <img src="/images/buildingBanner.jpg" alt="Smart VMS" class="custom-hero-img">
        </div>
    </div>



    <!-- Footer -->
    <div class="w-100 bg-light">
        @include('components.footer')
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
