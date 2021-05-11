@extends('admin.master')

@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

@if(session('message'))
<p class="alert alert-primary">{{session('message')}}</p>
@endif
	
<div class="container">
	<div class="content-wrapper">
		<br><br>
		<h1 class="text-warning">Category</h1>
		
  <form method="post" action="{{url('category/update')}}" enctype="multipart/form-data">
  	@csrf
  <input type="hidden" name="id" value="{{$data->id}}">
       <div class="form-group">
       	<label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{$data->name}}">
       </div>
<div class="form-group">
		<label>Description:</label>
		<input type="text" name="description"  class="form-control" value="{{$data->description}}">
		</div>

		<div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
		<div class="form-group">
		<label >Status:</label>
		<input type="text" name="status"  class="form-control" value="{{$data->status}}">
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