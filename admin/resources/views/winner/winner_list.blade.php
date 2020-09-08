@extends('layouts.app')
@section('content')  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Winners List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Winners</li>
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
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="winner-list" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.no</th>                                    
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>User ID</th>
                                    <th>Amount</th>
                                    <th>Position</th>
                                    <th>Image</th>                                   
                                    <th>Date</th>                                  
                                    <th>Action</th>                                  
                                </tr>
                            </thead>
                            <tbody>                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S.no</th>                                    
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>User ID</th>
                                    <th>Amount</th>
                                    <th>Position</th>
                                    <th>Image</th>                                   
                                    <th>Date</th>                                  
                                    <th>Action</th>                                 
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
    <!-- /.content -->
</div>

@endsection



