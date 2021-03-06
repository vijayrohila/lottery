@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Menu</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </div>
            <div class="col-sm-6">    
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 m-auto">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Menu</h3>
                    </div>                    
                    <!-- form start -->
                        {!! Form::open(['route' => ['menu.store'],'method'=>'post','id'=>'add-menu','files' => true]) !!}
                    
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="oldpassword">Menu Name</label>
                                {{Form::text('name','', ['class' => 'form-control','id'=>'name','required' => 'required','placeholder'=>"Enter the menu name"])}}
                            </div>
                            
                            <div class="form-group">
                                <label for="password_confirmation">Menu Items</label>
                                {{Form::text('item_name','', ['class' => 'form-control','id'=>'item_name','required' => 'required','placeholder'=>"Menu Items"])}}
                            </div>  
                            <div class="form-group">
                                <label for="country">Image</label> 
                                {{Form::file('image', ['class' => 'form-control','id'=>'image','required' => 'required'])}}
                            </div> 
                            <div class="form-group">
                                <label for="address">Price</label> 
                                {{Form::number('price','', ['class' => 'form-control','id'=>'price','required' => 'required','placeholder'=>"Enter the price"])}}
                            </div> 
                            <div class="form-group">
                                <label for="address">Menu Type</label> 
                                <select id="menu_type" name="menu_type" required="" class = 'form-control'>
                                    <option value="">Select Menu Type</option>
                                    <option value="starter">Starter</option>
                                    <option value="main_course">Main Course</option>
                                    <option value="dessert">Desert</option>
                                </select>
                            </div>                                                  
                             <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">ADD</button>
                            </div>                        
                        </div> 
                    {!! Form::close() !!}
                </div>                          
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

</div>



@endsection

@section('js')

<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDqP1TdIK9QoKX6Ym5DVgrtfTV7PNxMGKw"></script>

 <script src="{{asset('public/js/jquery.geocomplete.js')}}"></script>     

   
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@stop

@section('css')

<link rel="stylesheet" href="{{asset('public/css/jquery.geocomplete.min.css')}}"> 
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">      

@stop