@extends('admin.master')
@section('content')

<div class="content-wrapper">

<h2>{{$data->id}}</h2>
<h2>{{$data->name}}</h2>
<h2>{{$data->description}}</h2>
<h2><img src="{{ url('/upload/'.$data->image) }}" style="height: 150px; width: 150px; border-radius: 100%;"></h2>
<h2>{{$data->status}}</h2>  
</div>
@endsection