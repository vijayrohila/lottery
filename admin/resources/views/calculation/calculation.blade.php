@extends('layouts.app')
@section('content')  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calculations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Calculations</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">          
                <!-- /.card -->
                <div class="card">   
                    <div class="card-header">
                        <form method="post" id="search-calucation" class="form-horizontal" action="#">
                            <h3 class="card-title">
                                <label>Start Date:</label>
                                <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Start Date" required="">                          
                            </h3>
                            <h3 class="card-title">
                                <label> End Date:</label>
                                <input type="text" name="end_date" id="end_date" class="form-control" placeholder="End Date" required="">                            
                            </h3>
                            <h3 class="card-title">
                                <label></label>
                                <button type="button" class="btn btn-primary" id="cal-find">Search</button>
                            </h3>
                        </form>
                    </div>                 
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="search-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Income</th>                                    
                                    <th>Product Cost</th>
                                    <th>Donation</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody id="cal-tb"> 
                                <tr>
                                    <td>{{$income}}</td>                                    
                                    <td>{{$product}}</td>
                                    <td>{{$donation}}</td>
                                    <td>{{$income-$donation}}</td>
                                </tr>                               
                            </tbody>                            
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
    <!-- /.content -->
</div>

@endsection



