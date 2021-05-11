@extends('admin.master')
@section('content')

<div class="content-wrapper">

<h2>{{$data->id}}</h2>
<h2>{{$data->coupon_code}}</h2>
<h2>{{$data->amount}}</h2>

<h2>{{$data->amount_type}}</h2>
<h2>{{$data->expiry_date}}</h2>
<h2>{{$data->status}}</h2>  
</div>
@endsection