@extends('frontend.student.master')
@section('content')
<div class="container mt-4" >

    <nav aria-label="breadcrumb" style="margin-bottom: 20px;">
      <ol class="breadcrumb">
        <li class="breadcrumb-item" aria-current="page">{{$repo}}</li>
    </ol>
</nav>


<ol class="breadcrumb">
    <li><a href="{{ $file['download_url'] }}" target="_blank" class="mr-4 btn btn-primary">View Full code</a></li>
    <li><a href="{{ $file['html_url'] }}" target="_blank"  class="btn btn-primary">View file in Github</a></li>
</ol>



<div></div>
    <form action='/update' method ='post'>
    {{csrf_field()}}
    <input name="path" value="{{ $path }}" type="hidden"/>
    <input name="repo" value="{{ $repo }}" type="hidden"/>
    <div class="form-group">
        <label for="content">File content:</label>
        <textarea class="form-control" name="content" id="content" cols="10" rows="15">{{ $content }}</textarea>
    </div>

    <div class="form-group d-none">
        <label for="commit">Commit message:</label>
        <input class="form-control" type="hidden" id="commit" name="commit" value="{{ $commitMessage }}"/>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-control" value="Commit" />
    </div>
</form>
</div>
@endsection