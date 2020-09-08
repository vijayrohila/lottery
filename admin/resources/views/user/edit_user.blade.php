@extends('layouts.app')
@section('content')
<input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users Details</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> Dashboard</a></li>
                    <li class="breadcrumb-item active">Users Details</li>
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
                        <h3 class="card-title">Users Details</h3>
                    </div>                    
                    <!-- form start -->                
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="oldpassword">User Name</label>
                                {{Form::text('name',$user->first_name.' '.$user->last_name, ['class' => 'form-control','required' => 'required','placeholder'=>"Enter the menu name","readonly"])}}
                            </div>
                            
                            <div class="form-group">
                                <label for="password_confirmation">Email</label>
                                {{Form::text('email',$user->email, ['class' => 'form-control','id'=>'item_name','required' => 'required','placeholder'=>"Menu Items","readonly"])}}
                            </div>  
                            <div class="form-group">
                                <label for="address">User ID</label> 
                                {{Form::text('user_id',$user->user_id, ['class' => 'form-control',"readonly"])}}
                            </div>
                            <div class="form-group">
                                <label for="address">Phone</label> 
                                {{Form::text('user_id',$user->phone, ['class' => 'form-control',"readonly"])}}
                            </div> 
                            <div class="form-group">
                                <label for="address">Country</label> 
                                {{Form::text('user_id',$user->country, ['class' => 'form-control',"readonly"])}}
                            </div>
                            <div class="form-group">
                                <label for="address">State</label> 
                                {{Form::text('user_id',$user->state, ['class' => 'form-control',"readonly"])}}
                            </div>
                            <div class="form-group">
                                <label for="address">District</label> 
                                {{Form::text('user_id',$user->district, ['class' => 'form-control',"readonly"])}}
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label> 
                                {{Form::text('user_id',$user->address, ['class' => 'form-control',"readonly"])}}
                            </div> 
                            <div class="form-group">
                                <label for="address">Pin Code</label> 
                                {{Form::text('user_id',$user->pincode, ['class' => 'form-control',"readonly"])}}
                            </div> 
                                                                             
                        </div>                    
                </div>                          
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-12">          
            <!-- /.card -->
            <div class="card">   
                <div class="card-header">
                    <h3 class="card-title">Lottery Played</h3>
                </div>                         
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="user-bat-list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                              <th>Date</th>
                              <th>Product ID/Name</th>
                              <th>INR</th>
                              <th>Position</th>
                              <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>                                
                        </tbody>
                        <tfoot>
                            <tr>
                              <th>Date</th>
                              <th>Product ID/Name</th>
                              <th>INR</th>
                              <th>Position</th>
                              <th>Image</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
</section>

<section class="content">
<div class="row">
    <div class="col-12">          
            <!-- /.card -->
            <div class="card"> 
            <div class="card-header">
                <h3 class="card-title">Products Won</h3>
            </div>     
            <!-- /.card-header -->
            <div class="card-body">
                <table id="user-winner-list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Product ID/Name</th>
                            <th>INR</th>
                            <th>Position</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>                                
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Product ID/Name</th>
                            <th>INR</th>
                            <th>Position</th>
                            <th>Image</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>

</div>
@endsection

