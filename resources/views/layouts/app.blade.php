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
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/slick-theme.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
        <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">  
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">      
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">      
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">      
    </head>
    <body>
<main>
<script>
    var base_url = "{{ url('/')}}";
</script>
<header>
    <nav class="navbar navbar-expand-md navbar-light p-0">
        <div class="container-fluid header_inner py-2 header-wrapper">
            <!-- Brand -->
            {{-- <ion-icon name="add" class="d-none d-sm-block d-md-none d-block d-sm-none" style="font-size: 30px;"></ion-icon> --}}
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
                        <a class="nav-link" href="{{route('lottery.index')}}">Live Lottery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('winner.index')}}">Winners Club</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('donate.index')}}">Donations</a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('cart')}}">Cart({{ \Cart::getContent()->count()}})</a>
                    </li>
                    <li class="nav-item d-block d-sm-none d-none d-sm-block d-md-none">
                        <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                    </li>
                    <li class="nav-item d-block d-sm-none d-none d-sm-block d-md-none">
                        <a class="nav-link" href="{{route('login')}}">Sign In</a>
                    </li>  

                    @else
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('profile')}}">My Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('change-password')}}">Change Password</a>
                      </li>  
                      <li class="nav-item">
                        <a class="nav-link" href="{{url('cart')}}">Cart({{ \Cart::getContent()->count()}})</a>
                      </li>                    
                      <li class="nav-item d-block d-sm-none d-none d-sm-block d-md-none">
                        <a class="nav-link" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Sign Out</a>
                    </li>                                  
                    @endguest
                    
                </ul>
                @guest
                <div class="button_wrap ">
                    @if (Route::has('register'))
                    <div class="left ">
                        <button class="d-none d-sm-block d-sm-none d-md-block">
                        <a href="{{ route('register') }}" class="">Sign Up</a>
                        </button>
                    </div>
                    @endif
                    <div class="right">
                        <button onclick="location.href = 'login.php';" style="cursor: pointer;" class="d-none d-sm-block d-sm-none d-md-block">
                        <a href="{{ route('login') }}">Sign In</a>
                        </button>
                    </div>
                </div>
                @else
                <div class="button_wrap">
                    <div class="left">
                        <button class="d-none d-sm-block d-sm-none d-md-block">
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
                    <a href="{{url('/')}}">
                    {{env('APP_NAME')}}
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
                                <a href="{{url('/about-us')}}">About Us</a>
                            </li>
                            
                            <li class="mb-0">
                                <a href="{{url('/contact-us')}}">Contact Us</a>
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
                                <a href="{{url('/privacy-policy')}}">Privacy Policy</a>
                            </li>
                            
                            <li class="mb-0">
                                <a href="{{url('/term-condition')}}">Terms and Conditions</a>
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
                <p class="color-white lh-6 mb-0 fw-600" style="text-align: center;">© 2020 Lottery Hills.</p>
            </div>
            <div class="col text-sm-right mt-3 mt-sm-0 primary-logo-color"><a class="color-white" href="http://www.anitco.in" target="_blank"> Developed by ANITCO.</a></div>
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        responsiveClass:true,
        autoplay:true,
        responsive:{
            0:{
                items:1,
                nav:true
            }
        }
    })
});
</script>


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


<script type="text/javascript">
    $(function(){
  
      $('.show-password').click(function(){
           
            if($(this).attr('name') == 'eye-off'){
               
              $(this).attr('name','eye');
              
              $(this).prev().attr('type','text');
                
            }else{
             
              $(this).attr('name','eye-off');
              
              $(this).prev().attr('type','password');
            }
        });
});
</script>
