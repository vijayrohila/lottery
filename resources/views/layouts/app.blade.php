<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <style type="text/css">
            .navbar-light .navbar-brand{
                color: #872166;
                font-weight: 800;
                font-size: 30px;
                padding: 0;
            }
            div#collapsibleNavbar{
                margin-top: 0;
            }
            header .header-wrapper{
                box-shadow: 0 5px 10px 0 rgba(79,36,85,.15)
            }
            .navbar-light .navbar-nav .nav-link{
                color: #872166;
                font-weight: 600;
            }
        </style>
        <style type="text/css">
            body{
                color: #872166;
            }
            .custom-heading{
                padding-top: 50px;
                font-size: 26px;
                color: #872166;
                position: relative;
            }
            .custom-heading:after{
                content: '';
                position: absolute;
                border: 1px solid #872166;
                width: 100px;
                bottom: 15px;
                margin-left: 20px;

            }
            .custom-heading:before{
                content: '';
                position: absolute;
                border: 1px solid #872166;
                width: 100px;
                bottom: 15px;
                margin-left: -120px;

            }
            .about-us-section1 p{
                padding: 50px 100px;
                text-align: center;
                color: #872166;
                line-height:1.8;
            }
            .overview-wrapper > div{
                padding: 30px;
            }
        </style>
    </head>
    <body>
<main>
<script>
    var base_url = "{{ url('/')}}";
</script>
<style type="text/css">
    button:focus{
        outline: 0;
    }
</style>
<header>
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <div class="container-fluid header_inner py-2 header-wrapper">
            <!-- Brand -->
            <a class="navbar-brand" href="{{url('/')}}">
                {{env('APP_NAME')}}
            </a>
            <!-- Toggler/collapsibe Button -->
            <div class="button_wrap align-items-center justify-content-between mobile-inputs">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="true">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="live_lottery.php">Live Lottery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="winners_club.php">Winners Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="donations.php">Donations</a>
                    </li>
                </ul>
                @guest
                <div class="button_wrap">
                    @if (Route::has('register'))
                    <div class="left">
                        <button>
                        <a href="{{ route('register') }}" class="">Sign Up</a>
                        </button>
                    </div>
                    @endif
                    <div class="right">
                        <button onclick="location.href = 'login.php';" style="cursor: pointer;">
                        <a href="{{ route('login') }}">Sign In</a>
                        </button>
                    </div>
                </div>
                @else
                <div class="button_wrap">
                    <div class="left">
                        <button>
                        <a href="{{ route('register') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">Sign Out</a>
                        </button>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
    </nav>
</header>  
    @yield('content')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 last-on-small-screen">
                <div class="inner-footer">
                    <a href="#">
                    OneRupee
                    </a>
                </div>
                <div class="add-footer">
                        <p>3650 abc streat India, IN 100001</p>
                        <p>Phone: 763-000-0000</p>
                    </div>
            </div>
            <div class="col-md-4">
                <div class="inner-footer">
                    <div class="title-foot mb-3">
                        <h4>Quick Links</h4>
                    </div>
                    <div class="menu-footer">
                        <ul class="pl-0 list-unstyled">
                            
                            <li class="mb-3">
                                <a href="about_us.php">About Us</a>
                            </li>
                            
                            <li class="mb-0">
                                <a href="#">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner-footer">
                    <div class="title-foot mb-3">
                        <h4>Quick Links</h4>
                    </div>
                    <div class="menu-footer">
                        <ul class="pl-0 list-unstyled">
                            
                            <li class="mb-3">
                                <a href="privacy_policy.php">Privacy Policy</a>
                            </li>
                            
                            <li class="mb-0">
                                <a href="#">Terms and Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<style type="text/css">
    .primary-logo-color > a{
        color: #872266;
    }
    .primary-logo-color > a:hover{
        color: #212121;
    }
</style>
<div class="copyright py-4">
    <div class="container">
        <div class="row align-items-center" style="opacity: 0.85">
            <div class="col-sm-3 text-sm-left primary-logo-color"><a href="http://www.eraise.in" class="color-white ">
                A Boss Product</a></div>
            <div class="col-sm-6 mt-3 mt-sm-0">
                <p class="color-white lh-6 mb-0 fw-600" style="text-align: center;">© Copyright 2020 Anitco.</p>
            </div>
            <div class="col text-sm-right mt-3 mt-sm-0 primary-logo-color"><a class="color-white" href="http://www.anitco.in" target="_blank"> Developed by Anitco</a></div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('js/toastr.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="{{asset('js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
    
</body>
</html>

@if(session()->has('message'))
<script>
$(document).ready(function () {
    setTimeout(function () {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000,
        }
        ;
                toastr.success('{{ session()->get('message') }}', 'Success');
    }, 300);
});
</script>
@endif
@if(session()->has('error_message'))
<script>
    $(document).ready(function () {
        setTimeout(function () {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            }
            ;
                    toastr.error('{{ session()->get('error_message') }}', 'Error');
        }, 300);
    });
</script>
@endif
