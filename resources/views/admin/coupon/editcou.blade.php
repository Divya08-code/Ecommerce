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

    {{csrf_field()}}
<div class="container">
	<div class="content-wrapper">
		<br><br>
		<h1 class="text-warning">Coupon Details</h1>
		
  <form method="post" action="{{url('coupon/update')}}" >
  	@csrf
    <input type="hidden" name="id" value="{{$data->id}}">

       <div class="form-group">
       	<label>Coupon Code:</label>
        <input type="text" name="coupon_code" class="form-control" value="{{$data->coupon_code}}">
       </div>
<div class="form-group">
		<label>Amount:</label>
		<input type="text" name="amount"  class="form-control" value="{{$data->amount}}">
		</div>

    <div class="form-group">
     <label>Amount Type</label>
        <select name="amount_type"  class="form-control">
           <option>Select</option>
         <option value="Percentage" @if($data->amount_type=='Percentage') selected @endif>Percentage</option>
             <option value="Fixed" @if($data->amount_type=='Fixed') selected @endif>Fixed</option>
        </select>
  </div>
<div class="form-group">
    <label>Expiry Date:</label>
    <input type="date" name="expiry_date"  class="form-control" value="{{$data->expiry_date}}">
    </div>
		
		

		<input type="submit" name="" class="btn btn-danger" value="update">


</form>
</div>

</body>
</html>

@endsection