@extends('admin.master')
@section('content')

<div class="content-wrapper">

<h2>{{$data->id}}</h2>
<h2>{{$data->product_name}}</h2>
<h2>{{$data->product_code}}</h2>
<h2>{{$data->product_description}}</h2>
<h2><img src="{{ url('/upload/'.$data->product_image) }}" style="height: 150px; width: 150px; border-radius: 100%;"></h2>
<h2>{{$data->product_size}}</h2>
<h2>{{$data->product_quantity}}</h2>
<h2>{{$data->product_price}}</h2>
<h2>{{$data->status}}</h2>  
</div>
@endsection