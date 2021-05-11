@extends('admin.master')
@section('content')

@if(session('message'))

<p class="alert alert-success text-center">
  {{session('message')}}
</p>

@endif
<div class="content-wrapper">
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    @foreach ($data as $a)
        
    
    <tbody>
      <tr>
        <th scope="row">{{$a->id}}</th>
        <td>{{$a->name}}</td>
        
        <td>{{$a->description}}</td>
        <td><img src="{{ url('/upload/'.$a->image) }}" style="height: 150px; width: 150px; border-radius: 100%;"></td>

        <td>{{$a->status}}</td>
        <td>
            <a class="btn btn-info"  href="{{url('category/showcat/'.$a->id)}}">show </a>
            <a class="btn btn-primary" href="{{url('category/editcat/'.$a->id)}}">Edit </a>
            <a class="btn btn-warning" href="{{url('category/delete/'.$a->id)}}">Delete </a>

        </td>
      </tr>
      
      @endforeach
    </tbody>
  </table>
</div>
  
      
 
@endsection