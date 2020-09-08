@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Live Players</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Live Players</li>
                </ol>
            </div>
            <div class="col-sm-6">    
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row d-flex align-items-stretch">
            @foreach($products as $product)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                  <div class="card bg-light">
                <form method="post" action="{{url('/lottery')}}" class="lottery"> 
                @csrf   
                    <div class="card-header text-muted border-bottom-0">                      
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>{{$product['name']}}</b></h2>
                          <p class="text-muted text-sm"><b>Product Cost: 
                            </b> {{$product['cost']}} </p>
                          <p class="text-muted text-sm"><b>Product ID: 
                            </b> {{$product['product_id']}} 
                          </p>
                          <p class="text-muted text-sm"><b>User ID: </b> 
                            @if(empty($product['winner']))
                            <select class="form-control mySelect2" required="" name="user">
                                <option value="">Select User ID</option>
                                @foreach($product['batting'] as $user)
                                    <option value="{{$user['id']}}">{{$user['user']['user_id']}}</option>
                                @endforeach
                            </select>
                            @else
                            {{$product['winner'][0]['user']['user_id']}}
                            @endif
                          </p>
                          <p class="text-muted text-sm"><b>Position: </b>
                          @if(empty($product['winner']))
                            <select class="form-control" required="" name="position">
                                <option value="">Select Position</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                                <option value="HR">Highest Referrals</option>
                                <option value="RP">Regular Player</option>
                            </select> 
                          @else
                          {{$product['winner'][0]['position']}}
                          @endif  

                          </p>                          
                        </div>
                        <div class="col-5 text-center">
                          <img src="{{url('/public/product/'.$product['image'])}}" alt="" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    @if(empty($product['winner']))
                    <div class="card-footer">
                      <div class="text-right">
                        <button type="Submit" class="btn btn-sm btn-primary">Submit</button> 
                      </div>
                    </div>
                    @endif
                </form>
                  </div>
                </div>
            @endforeach                     
          </div>
        </div>        
      </div>
</section>
</div>
@endsection
