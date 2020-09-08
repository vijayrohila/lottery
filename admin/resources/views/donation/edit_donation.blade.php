@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"> Dashboard</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
                        <h3 class="card-title">Edit Product</h3>
                    </div>                    
                    <!-- form start -->
                {!! Form::open(['route' => ['donate.update', $donation->id],'method'=>'post','id'=>'add-donation','files' => true]) !!}
                    {{ method_field('PATCH') }}
                        <div class="card-body">                            
                            <div class="form-group">
                                <label for="oldpassword">Trust Name</label>
                                {{Form::text('trust_name',$donation->trust_name, ['class' => 'form-control','id'=>'trust_name','required' => 'required','placeholder'=>"Trust name"])}}
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select id="country" name="country" class="form-control" required>
                                    <option value="">Select Country</option>
                                    <option value="india" selected="">India</option>
                                </select>
                            </div> 
                            <div class="form-group">
                                <label for="state">State</label>
                                <select id="state" name="state" class="form-control" required>
                                    <option value="">Select State</option>
                                    @foreach($state as $st)
                                        <option code="{{$st->state_code}}" @if($donation->state == $st->state_name) {{"selected"}} @endif  value="{{$st->state_name}}">{{$st->state_name}}</option> 
                                    @endforeach
                                </select>
                            </div>                           
                            <div class="form-group">
                                <label for="country">Image</label> 
                                {{Form::file('image', ['class' => 'form-control','id'=>'image'])}}
                            </div>
                            <div class="form-group">
                            <img src="{{url('/public/donate/'.$donation->image)}}" width="100px"> 
                            </div>
                            <div class="form-group">
                                <label for="start">Date</label>
                                {{Form::text('date',$donation->date, ['class' => 'form-control','id'=>'date','required' => 'required','placeholder'=>"Date"])}}
                            </div>
                            <div class="form-group">
                                <label for="end">Amount</label>
                                {{Form::number('amount',$donation->amount, ['class' => 'form-control','id'=>'amount','required' => 'required','placeholder'=>"Amount"])}}
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

