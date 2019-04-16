@extends('frontend.student.master')
@section('content')
<div class="container mt-4">
<ul class="list-group">
   
      <ul class="breadcrumb">
        <li class="breadcrumb-item " aria-current="page">{{$repo}}/{{$path}}</li>
    </ul>

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
</div>
@endsection