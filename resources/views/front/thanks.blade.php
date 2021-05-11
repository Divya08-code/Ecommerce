@extends('front.master')

@section('content')

<!-- breadcrumb-section start -->
<nav class="breadcrumb-section theme1 bg-lighten2 pt-110 pb-110" style="background: url('{{ url('https://image.freepik.com/free-photo/cyber-monday-retail-sales_23-2148688493.jpg') }}'); background-repeat:no-repeat; background-position: center bottom; background-size: cover;">
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <ol class="breadcrumb bg-transparent m-0 p-0 align-items-center justify-content-left">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
                </ol>
            </div>
        </div>
    </div>
</nav>
<!-- breadcrumb-section end -->
<div class="text-center">
	<img src="https://i.gifer.com/7efs.gif" class="col-md-3">
	<h2 class="text text-lighten text-uppercase animated mb-25 text-center" data-animation-in="zoomIn" data-delay-in="1">Order Placed Succesfully</i></h2>
</div>
<div class="container mt-100 mb-100">
	<div class="row">
		<div class="h-auto shadow-lg">

			<h3 class="alert alert-info text-center mb-100">Order Details</h3>
				
				<div class="row">

					<div class="col-md-1">
					</div>

					<div class="col-md-10">

						@foreach($data as $data)
							<div class="row mb-50">
					
								<p class="col-md-6">Customer's Name: </p>
								<p class="col-md-6"> {{$data->name}}</p>
							
							</div>
							<div class="row mb-50">
					
								<p class="col-md-6">Customer's Address:</p>
								<p class="col-md-6"> {{$data->address}}</p>
							
							</div>
							<div class="row mb-50">
							
								<p class="col-md-6">Phone Number: </p>
								<p class="col-md-6">{{$data->phone}}</p>
							
							</div>
							<div class="row mb-50">
					
								<p class="col-md-6">Order Id: </p>
								<p class="col-md-6">{{$data->id}}</p>
							
							</div>
							<div class="row mb-50">

								<p class="col-md-6">Order Total: </p>
								<p class="col-md-6">{{$data->grand_total}}</p>
							
							</div>

						@endforeach
							
						@foreach ($productdata as $productdata)

							<div class="row mb-50">
							
								<p class="col-md-6">Product Name: </p>
								<p class="col-md-6">{{$productdata->product_name}}</p>
							
							</div>
							<div class="row mb-50">

								<p class="col-md-6">Quantity: </p>
								<p class="col-md-6">{{$productdata->product_quantity}}</p>
							
							</div>
							
						@endforeach
					</div>
				</div>
						
				
		</div>
	</div>
</div>
@endsection