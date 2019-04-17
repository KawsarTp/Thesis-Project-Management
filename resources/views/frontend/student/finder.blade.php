@extends('frontend.student.master')
@section('content')
<div class="container mt-4">
    <div class="row">
<ul class="list-group col-md-6">
   
      <ul class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page">{{$repo}}/{{$path}}</li>
    </ul>
    @foreach($contributors as $contributor)
    <a href="/git/contributor" class="btn btn-primary">Contributors In this Project<span class="badge badge-light">{{$contributor['contributions']}}</span></a>
    @endforeach
    @foreach($items as $item)
        <li class="list-group-item ">
            @if(isset($item['type']) && $item['type'] == 'file')
                <a href="/edit?repo={{ $repo }}&path={{ $item['path'] }}">{{ $item['name'] }}</a>
                
            @else
                <a href="/finder?repo={{ $repo }}&path={{ $item['path'] }}">{{ $item['name'] }}</a>
            
            @endif
        </li>
    @endforeach
</ul>
<div class="col-md-6">
    @foreach($contributors as $contributor)
        <h3>List Of the Contributors</h3>
        <p style="color: red;">Name of the Contributor:- {{$contributor['login']}}</p>
    @endforeach
</div>
</div>
</div>
@endsection