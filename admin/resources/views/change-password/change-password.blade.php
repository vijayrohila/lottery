@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change password</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Change password</li>
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
                        <h3 class="card-title">Change password</h3>
                    </div>                    
                    <!-- form start -->
                        {!! Form::open(['url' => ['change-password'],'method'=>'post','id'=>'change-password']) !!}
                    
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="oldpassword">Old Password</label>
                                {{Form::password('old_password', ['class' => 'form-control','id'=>'old_password','required' => 'required','placeholder'=>"Enter Old Pssword"])}}
                            </div>                            
                            <div class="form-group">
                                <label for="password_confirmation">New Password</label>
                                {{Form::password('password', ['class' => 'form-control','id'=>'password','required' => 'required','placeholder'=>"Enter Password"])}}
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password</label>
                                {{Form::password('password_confirmation', ['class' => 'form-control','id'=>'password_confirmation','required' => 'required','placeholder'=>"Enter Confirm Password"])}}
                            </div> 
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Change Password</button>
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

