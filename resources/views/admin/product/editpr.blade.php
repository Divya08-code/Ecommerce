@extends('admin.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
	
<div class="container">
	<div class="content-wrapper">
		<br><br>
		<h1 class="text-warning">Product</h1>
		
  <form method="post" action="{{url('product/update')}}" enctype="multipart/form-data">
    @if(session('message'))
         <p class ="alert alert-success">
          {{session('message')}}
         </p>     
    @endif
  	@csrf
    <input type="hidden" name="id" value="{{$data->id}}">

          <div class="form-group">
            <label>Edit Category</label>
                <select name="category_id">
                    <option >Select Category</option>
                    @foreach($categories as $cat)
                         <option value="{{$cat->id}}" {{$cat->id==$data->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                    @endforeach
                </select>
              </div>
<div class="form-group">
		<label>Product_name:</label>
		<input type="text" name="product_name"  class="form-control" value="{{$data->product_name}}">
		</div>

<div class="form-group">
    <label>Product_code:</label>
    <input type="text" name="product_code"  class="form-control" value="{{$data->product_code}}">
    </div>

<div class="form-group">
    <label>Product_size:</label>
    <input type="text" name="product_size"  class="form-control" value="{{$data->product_size}}">
    </div>
    <div class="form-group">
                    <label name="product_description" row="10" cols="10" >Product Description</label>
                    <textarea class="form-control" name="product_description" value="">{{$data->product_description}}</textarea>
                  </div>

		<div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="product_image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
    <label>Product_price:</label>
    <input type="text" name="product_price"  class="form-control" value="{{$data->product_price}}">
    </div>
    <div class="form-group">
    <label>Product_quantity:</label>
    <input type="text" name="product_quantity"  class="form-control" value="{{$data->product_quantity}}">
    </div>
		

		<input type="submit" name="" class="btn btn-danger" value="update">



</form>


@if(session('message'))
<p class="alert alert-info">{{session('message')}}</p>
@endif
</div>

</body>
</html>

@endsection