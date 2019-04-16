@extends('frontend.teacher.master')
@section('content')


<div class="container-fluid mt-3">

<div class="row justify-content-center">
	<div class="col-lg-11 col-xl-10">
			
				
				<b><span class="text-primary">Name Of The Task:-</span>{{$task->description}}</b>
				<p>Attached File: <a href="{{URL::to('/images'.$task->file)}}" target="_blank">{{$task->file}}</a></p>
				
				Mark The Task As Complete:
					
				@if($task->status == 0)
				<a href="" class="btn btn-success">Complete</a>
				@else
				<a href="" class="btn btn-danger">Incompleted</a>
				@endif
				
				<div class="">
					<h2>Student Submission</h2>

				</div>

			</div>

		</div>
	</div>





@endsection