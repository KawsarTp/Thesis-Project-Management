@extends('frontend.student.master')
@section('content')
<div class="container">
	<div class="row">
	<div class="col-md-8">
		<h3 class="alert alert-primary ml-5 mt-4">Create Project Proposal</h3>
<form action="/create" method="post">
				{{csrf_field()}}
				<div class="form-group row align-items-center">
					<label class="col-3">Name</label>
					<input class="form-control col" type="text" placeholder="Project name" name="projecttitle" />
				</div>
				<div class="form-group row">
					<label class="col-3">Description</label>
					<textarea class="form-control col" rows="3" placeholder="Project description" name="projectbody"></textarea>
				</div>
				<hr>
				<div class="form-group row">
					<label class="col-3">Technology used:</label>
					<textarea class="form-control col" rows="3" placeholder="Project description" name="language"></textarea>
				</div>
				<div class="form-group row" >
                                   <label class="col-3">Select Category</label>
                                    <select class="form-control col" name="category">
                                    	<option disabled selected>Select Category</option>
                                      @foreach($category as $category_list)
                                        <option value="{{$category_list->id}}">{{$category_list->name}}</option>
                                      @endforeach
                                  </select>
                                    
                       </div>
				<div class="form-group row">
					<label class="col-3">Select Supervisor</label>
					<select name="teacherid" id="" class="form-control col">
						<!-- @if(count($teacher_list)==0)
						<option value="na">No Supervisor</option>
						@else
						@foreach($teacher_list as $teachers)
						<option value="{{$teachers->id}}">{{$teachers->name}}</option>
						@endforeach
						@endif -->
					</select>
				</div>
				<hr>
				<div class="form-group row">
					@if(count($teacher_list)==0)
					<input type="submit" class="btn btn-primary" disabled value="Create Project">
					@else
					<input type="submit" id='teacher_submit'class="btn btn-primary" value="Create Project">
					@endif
				</div>
	</form>
</div>
</div>
</div>


@endsection