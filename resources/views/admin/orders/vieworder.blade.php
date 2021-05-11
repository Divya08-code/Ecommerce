@extends('admin.master')

@section('content')


<!-- breadcrumb-section end -->

<div class="container col-md-10">
	<div class="content-wrapper">
		<h3 class="alert alert-info text-center mb-100">Order Details</h3>

	<div class="row">
		<h4 class="col-md-6">Customer's Name</h4>
		<p class="col-md-6">{{$data->name}}</p>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Customer's Address</h4>
		<p class="col-md-6">{{$data->address}}</p>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Customer's phone</h4>
		<p class="col-md-6">{{$data->phone}}</p>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Customer's Email</h4>
		<p class="col-md-6">{{$data->useremail}}</p>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Order Id</h4>
		<p class="col-md-6">{{$productdata->order_id}}</p>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Product Name</h4>
		<p class="col-md-6">{{$productdata->product_name}}</p>	
	</div>
	<div class="row">
		<h4 class="col-md-6">Product image</h4>
		 <p class="col-md-6"><img src="{{url('/upload/'.$productdata->product_image)}}" style="height:100px; width:100px;"></p>
	</div>
	<div class="row">
		<h4 class="col-md-6">Product Quantity</h4>
		<p class="col-md-6">{{$productdata->product_quantity}}</p>	
	</div>
<div class="row">
		<h4 class="col-md-6">Order Status</h4>
		<p class="col-md-6">pending</p>	
	</div>
<div class="row">
		<h4 class="col-md-6">Amount</h4>
		<p class="col-md-6">{{$productdata->grand_total}}</p>	
	</div>

</div>
</div>







			
@endsection