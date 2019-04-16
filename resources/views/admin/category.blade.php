@extends('admin.master')

@section('content')
<div style="position: absolute; right:10; top:100px;" id="msg">
      @if ($errors->has('category'))
      <span class="alert alert-danger warning-s">{{ $errors->first('category') }}</span>
      @endif
      </div>
		<div class="col-md-6 col-md-offset-3">
				@if(Session::has('category'))
				<span class="alert alert-success" id="fade">{{session('category')}}</span>
				@endif
				

	<h3 class="text-center">Add Student Information</h3>
	<form class="form-horizontal" action="{{route('admin.category')}}" method="post">
		{{csrf_field()}}
 	<div class="form-group">
    <label class="control-label col-sm-2" for="name">Category:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="input_category" placeholder="Enter name" name="category">
      
    </div>
  	</div>

  	<div class="form-group">
   
    <div class="col-sm-3 col-md-offset-3">
      <input type="submit" class="form-control btn btn-primary" >
    </div>
  	</div>

 </form>
</div>
<!-- <script >
  
  var str = document.getElementById('input_category').value;
    camelize(str);
    function camelize(str) {
      return str.replace(/\W+(.)/g, function(match, chr)
       {
            return chr.toUpperCase();
        });
    }
</script> -->


@endsection