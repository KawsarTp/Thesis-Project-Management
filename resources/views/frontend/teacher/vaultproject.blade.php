@extends('frontend.teacher.master')
@section('content')

@if($project->finished == 1)

<div class="row justify-content-center">
	<div class="col-lg-11 col-xl-10">


		<div>
			<span style="color: red;">Project Title:<strong style="font-size: 32px;color: blue;">{{$project->project_title}}</strong></span>
			
		</div>
		

	</div>
</div>
@else
<script>
	window.location = "/teacher/project/"+ {!! $project->id!!};
</script>
@endif



@endsection