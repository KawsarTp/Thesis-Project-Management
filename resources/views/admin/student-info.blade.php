@extends('admin.master')

@section('content')
@if(Session::has('msg'))
<h3 class="alert alert-success text-center">{{session('msg')}}</h3>
@endif
@if(Session::has('deactive'))
<h3 class="alert alert-success text-center">{{session('deactive')}}</h3>
@endif
<div class="col-md-10">
	<h3 class="text-center">Student Info</h3>
</div>

<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Student-id</th>
        <th>Address</th>
        <th>Department</th>
        <th>Active</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
      <tr>
        <td>{{$d->name}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->dept_id}}</td>
        <td>{{$d->address}}</td>
        <td>{{$d->department}}</td>
        <td>{{$d->active}}</td>
        <td><img src="{{$d->photo}}" alt="image"></td>
        <td>
        	<a href="" class="btn btn-success glyphicon glyphicon-edit"></a>
        	<a href="" class="btn btn-danger glyphicon glyphicon-trash"></a>
            @if($d->active==0)
            <a href="{{route('activation',$d->id)}}" class="btn btn-warning glyphicon glyphicon-remove-circle"></a>
            @else
            <a href="{{route('deactivation',$d->id)}}" class="btn btn-success glyphicon glyphicon-ok"></a>
            @endif
        </td>
      </tr>
      @endforeach
       
      
    </tbody>
  </table>


@endsection