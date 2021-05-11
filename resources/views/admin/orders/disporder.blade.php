@extends('admin.master')

@section('content')

@if(session('message'))

<p class="alert alert-primary text-center">
  {{session('message')}}
</p>

@endif

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View All Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- code start-->
     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                     
                      <th>Order Id</th>
                      <th>Useremail</th>
                      <th>Product Name</th>
                     
                      <th>Product Quantity</th>
                      <th>Image</th>
                      <th>Payment Method</th>
                      <th>Grand Total</th>
                     
                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($detail as $detail)
                    <tr>
                      <td>{{$detail->order_id}}</td>
                      <td>{{$detail->useremail}}</td>
                      <td>{{$detail->product_name}}</td>
                      <td>{{$detail->product_quantity}}</td>
                       <td><img src="{{url('/upload/'.$detail->product_image)}}" style="height:50px; width:100px;">
                      </td>
                      <td>{{$detail->payment_method}}</td>
                      
                      <td>{{$detail->grand_total}}</td>
                     
                      
                      
                      
                        
                   
                      <td>
                        <a class="btn btn-info" href="{{url('vieworder/'.$detail->order_id)}}">Show</a>
                         <a class="btn btn-success" href="{{url('orderinvoice/'.$detail->order_id)}}">Invoice</a>
                        
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
</section>
            <!-- /.card -->
    <!-- code end-->
    <!-- /.content-wrapper -->
</div>

@endsection