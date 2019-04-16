@extends('frontend.student.master')
@section('content')


    <div class="container mt-4">
        <div class="row">
        <div class="col-md-6">
            <h3 class="text-success">Git hub Repositories </h3>
        <div class="list-group">
        @foreach($repos as $repo)
            <a class="list-group-item" href="/finder?repo={{ $repo['name'] }}">
                <h4 class="list-group-item-heading">{{ $repo['name'] }}</h4>
                <p class="list-group-item-text">{{ $repo['description'] }}</p>
            </a>
        @endforeach
    </div>
    </div>

    <div class="col-md-6">
        <h3 class="text-success">Create Repositories </h3>
       <form action="/git/repo" method="get">
           <div class="form-group">
               <input type="text" name="repo" class="form-control" placeholder="Name of the Repositories">
           </div>
           <div class="form-group">
               <input type="text" name="description" class="form-control" placeholder="description of the Project">
           </div>
           <div class="form-group">
               <input type="submit" name="" class="btn btn-primary">
           </div>
       </form> 
    </div>
        
        </div>
    </div>
@endsection
   