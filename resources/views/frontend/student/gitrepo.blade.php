@extends('frontend.student.master')
@section('content')

  <div id="side" class="col-md-4" style="border:1px solid lightgray;padding: 5px;margin-left: 35%; box-shadow: 2px 3px 4px  lightgray;margin-top: 10%">
  	<h2 class="text-success">Upload Files In Github</h2>
  <form id="githubForm" onsubmit="return false;" class="form-group">
  	<div class="form-group">
    <input type="file" name="folder" id="folder" class="form-control" webkitdirectory directory required />
</div>
	<div class="form-group">
    <input type="text" name="username" id="username" value="{{$a->user_name}}" placeholder="GitHub Username" class="form-control" required disabled />
</div>
<div class="form-group">
    <input type="hidden" name="password" value="{{$a->password}}" id="password" placeholder="GitHub Password" class="form-control" required />
</div>
    <div class="form-group">
    <input type="text" name="name" id="name" placeholder="Repo Name" value="{{request()->get('repo')}}" required disabled="" class="form-control" />
</div>
<div class="form-group">
    <input type="text" name="description" id="description" placeholder="Repo Description" required class="form-control" />
</div>
<div class="form-group">
    <input type="submit" id="submit" value="Submit to GitHub" class="btn btn-primary" />
</div>
  </form>
  </div>
  <div id="results"></div>
</div>


@endsection