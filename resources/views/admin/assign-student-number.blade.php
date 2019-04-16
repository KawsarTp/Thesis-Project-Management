@extends('admin.master')

@section('content')

<div class="col-md-6 col-md-offset-3">
	<h3 class="text-center">Add Student Information</h3>
	<form class="form-horizontal" action="">

 <div class="form-group">
    <label class="control-label col-sm-2" for="name">Assign Number of Student</label>
    <div class="col-sm-10">
      <input type="number" name="" class="form-control" min="1" max="4">
    </div>
  </div>

  <div class="form-group">
  	<div class="col-md-10 col-md-offset-2">
    	<input type="submit" name="" value="Assign" class="btn btn-block btn-primary">
    </div>
  </div>
</form>
</div>

@endsection