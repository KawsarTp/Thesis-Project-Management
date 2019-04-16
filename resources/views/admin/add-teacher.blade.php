@extends('admin.master')

@section('content')

	<div class="col-md-6 col-md-offset-3">
	<h3 class="text-center">Add Teachers Information</h3>
	<form class="form-horizontal" action="{{route('admin.addteacher')}}" method="post">
  {{csrf_field()}}
 <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="education">Educational Background:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="education"></textarea>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="mobile">Mobile Number:</label>
    <div class="col-sm-10">
      <input type="text" name="mobile" class="form-control">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="research">Research Area:</label>
    <div class="col-sm-10"> 
      <textarea name="" class="form-control" name="research"></textarea>
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="publications">Publications:</label>
    <div class="col-sm-10"> 
      <textarea name="" class="form-control" name="publications"></textarea>
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Address:</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="address"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="gender">Gender:</label>
    <div class="col-sm-10">
      <input type="radio" name="gender" value="M" >Male
      <input type="radio" name="gender" value="F">Female
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Department:</label>
    <div class="col-sm-10">
      <select name="department" class="form-control">
      	<option value="">CSE(Day)</option>
      	<option value="">EEE(Day)</option>
      	<option value="">TEX(Day)</option>
      	<option value="">CSE(EVE)</option>
      	<option value="">EEE(EVE)</option>
      	<option value="">TEX(EVE)</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control"  placeholder="Enter password">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control"  placeholder="Enter password">
    </div>
  </div>

 <div class="form-group">
    <label class="control-label col-sm-2">Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control"  placeholder="Enter password">
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>

@endsection