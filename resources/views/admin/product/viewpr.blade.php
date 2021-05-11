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
                      <th style="width: 10px">ID</th>
                      <th>Category Id</th>
                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Product Size</th>
                      <th>Description</th>
                      <th>Image</th>
                      <th>quantity</th>
                      <th>Price</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $a)
                    <tr>
                      <td>{{$a->id}}</td>
                      <td>{{$a->category_id}}</td>
                      <td>{{$a->product_name}}</td>
                      <td>{{$a->product_code}}</td>
                      <td>{{$a->product_size}}</td>
                      <td>{{$a->product_description}}</td>
                      <td><img src="{{url('/upload/'.$a->product_image)}}" style="height:50px; width:100px;">
                      </td>
                      <td>{{$a->product_quantity}}</td>
                      <td>{{$a->product_price}}</td>
                      <td>{{$a->status}}</td>
                      
                      
                        
                   
                      <td>
                        <a class="btn btn-info" href="{{url('product/show/'.$a->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{url('product/edit/'.$a->id)}}">Edit</a>
                        <a class="btn btn-warning" href="{{url('product/delete/'.$a->id)}}">Delete</a>
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