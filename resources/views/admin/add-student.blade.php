@extends('admin.master')

@section('content')
<div class="col-md-6 col-md-offset-3">
	<h3 class="text-center">Add Student Information</h3>
	<form class="form-horizontal" action="">

 <div class="form-group">
    <label class="control-label col-sm-2" for="name">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Enter name">
    </div>
  </div>


  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" placeholder="Enter email">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Student ID:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="id" placeholder="Enter ID">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Address:</label>
    <div class="col-sm-10">
      <textarea class="form-control"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Gender:</label>
    <div class="col-sm-10">
      <input type="radio" name="gender" value="male" >Male
      <input type="radio" name="gender" value="female">Female
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Department:</label>
    <div class="col-sm-10">
      <select name="" class="form-control">
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
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Credit Completed:</label>
    <div class="col-sm-10"> 
      <input type="number" class="form-control" id="pwd" placeholder="Enter password" min="100">
    </div>
  </div>


 <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Image:</label>
    <div class="col-sm-10"> 
      <input type="file" class="form-control" id="pwd" placeholder="Enter password">
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