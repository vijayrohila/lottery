<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('public/dist/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light ">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <!-- <li class="nav-item has-treeview">
                    <a href="{{url('/')}}" class="nav-link @if(\Request::route()->getName() == 'home') {{'active'}} @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard                            
                        </p>
                    </a>                    
                </li> -->

                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'calculation') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                          Calculations
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('calculation') }}" class="nav-link @if(\Request::route()->getName() == 'calculation') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Calculations</p>
                            </a>
                        </li>                        
                    </ul>
                </li> 

                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'change-password') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-key"></i>
                        <p>
                          Change Password
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('change-password') }}" class="nav-link @if(\Request::route()->getName() == 'change-password') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>                        
                    </ul>                    
                </li> 

                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'donate.index' || \Request::route()->getName() == 'donation.add') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-donate"></i>
                        <p>
                          Donations
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('donate.index') }}" class="nav-link @if(\Request::route()->getName() == 'donate.index') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Donations List</p>
                            </a>
                        </li>                        
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('add-donation')}}" class="nav-link @if(\Request::route()->getName() == 'donation.add') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Donation</p>
                            </a>
                        </li>                        
                    </ul>
                </li> 
                
                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'product.add' || \Request::route()->getName() == 'product.index') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                          Products
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{url('/add-product')}}" class="nav-link @if(\Request::route()->getName() == 'product.add') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('product.index')}}" class="nav-link @if(\Request::route()->getName() == 'product.index') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Products List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'statistic') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-chart-bar"></i>
                        <p>
                          Statistics
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('statistic') }}" class="nav-link @if(\Request::route()->getName() == 'statistic') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistics</p>
                            </a>
                        </li>                        
                    </ul>                    
                </li>

                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'user.index' || \Request::route()->getName() == '') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.index')}}" class="nav-link @if(\Request::route()->getName() == 'user.index') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                 

                <li class="nav-item has-treeview @if(\Request::route()->getName() == 'winner.index') {{'menu-open'}} @endif" >
                    <a href="#" class="nav-link">
                        <i class="fa fa-briefcase"></i>
                        <p>
                          Winners
                            <i class="fas fa-angle-left right"></i>                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('winner.index')}}" class="nav-link @if(\Request::route()->getName() == 'winner.index') {{'active'}} @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Winners List</p>
                            </a>
                        </li>                        
                    </ul>
                </li>             
  
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>