<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('public/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('public/css/toastr.css')}}">
        @yield('css')
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <script>
        var base_url = "{{ url('/')}}";
    </script>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div id="loading" style="display: none">
            <img id="loading-image" src="{{url('public/loading.gif')}}" alt="Loading..." />
        </div>
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>               

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">                    
                    <li class="nav-item">                      

                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>        
                    </li>
                </ul>
            </nav>

            @extends("layouts.sidebar")

            @yield('content')

            @extends("layouts.footer")
            <!-- REQUIRED SCRIPTS -->
            <!-- jQuery -->
            <script src="{{ asset('public/plugins/jquery/jquery.min.js')}}"></script>

            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
            <!-- Bootstrap -->
            <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <!-- overlayScrollbars -->
            <script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
            <!-- AdminLTE App -->
            <script src="{{ asset('public/dist/js/adminlte.js')}}"></script>

            <!-- OPTIONAL SCRIPTS -->
            <script src="{{ asset('public/dist/js/demo.js')}}"></script>

            <!-- PAGE PLUGINS -->
            <!-- jQuery Mapael -->
            <script src="{{ asset('public/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
            <script src="{{ asset('public/plugins/raphael/raphael.min.js')}}"></script>
            <script src="{{ asset('public/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
            <script src="{{ asset('public/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
            <!-- ChartJS -->
            <script src="{{ asset('public/plugins/chart.js/Chart.min.js')}}"></script>

            <script src="{{ asset('public/plugins/datatables/jquery.dataTables.js')}}"></script>
            <script src="{{ asset('public/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <!-- PAGE SCRIPTS -->
<!--            <script src="{{ asset('public/dist/js/pages/dashboard2.js')}}"></script>-->
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script src="{{asset('public/js/custom.js')}}"></script>
            <script src="{{asset('public/js/toastr.js')}}"></script>
            <script src="{{asset('public/js/jquery.validate.min.js')}}"></script>

            
            <!-- Include per-page JS -->
            @yield('js')
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