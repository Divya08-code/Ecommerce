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

<p class="alert alert-success text-center">
  {{session('message')}}
</p>
@endif
	
<div class="container">
	<div class="content-wrapper">
		<br><br>
		<h1 class="text-warning">Category</h1>
		
  <form method="post" action="{{url('cat/save')}}" enctype="multipart/form-data">
  	@csrf

       <div class="form-group">
       	<label>Name:</label>
        <input type="text" name="name" class="form-control">
       </div>
<div class="form-group">
		<label>Description:</label>
		<input type="text" name="description"  class="form-control">
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
		<input type="text" name="status"  class="form-control">
		</div>

		<input type="submit" name="" class="btn btn-danger" value="submit">


</form>
</div>

</body>
</html>

@endsection