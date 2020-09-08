@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Donation</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Donations</li>
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
                        <h3 class="card-title">Add Donation</h3>
                    </div>                    
                    <!-- form start -->
                        {!! Form::open(['route' => ['donate.store'],'method'=>'post','id'=>'add-donation','files' => true]) !!}
                    
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="oldpassword">Trust Name</label>
                                {{Form::text('trust_name','', ['class' => 'form-control','id'=>'trust_name','required' => 'required','placeholder'=>"Trust name"])}}
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select id="country" name="country" class="form-control" required>
                                    <option value="">Select Country</option>
                                    <option value="india">India</option>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="state">State</label>
                                <select id="state" name="state" class="form-control" required>
                                    <option value="">Select State</option>
                                    @foreach($state as $st)
                                        <option code="{{$st->state_code}}" value="{{$st->state_name}}">{{$st->state_name}}</option> 
                                    @endforeach
                                </select>
                            </div>                           
                            <div class="form-group">
                                <label for="country">Image</label> 
                                {{Form::file('image', ['class' => 'form-control','id'=>'image','required' => 'required'])}}
                            </div>
                            <div class="form-group">
                                <label for="start">Date</label>
                                {{Form::text('date','', ['class' => 'form-control','id'=>'date','required' => 'required','placeholder'=>"Date"])}}
                            </div>
                            <div class="form-group">
                                <label for="end">Amount</label>
                                {{Form::number('amount','', ['class' => 'form-control','id'=>'amount','required' => 'required','placeholder'=>"Amount"])}}
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

