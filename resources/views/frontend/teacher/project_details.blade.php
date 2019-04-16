@extends('frontend.teacher.master')
@section('content')

<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-xl-10">

                        		<div class="table table-bordered mt-4">

								<h3>Project Title:<span style="color:blue">{{$project_details->project_title}}</span></h3>

								</div>

								<div>

									<h3>Project Body:</h3>
									<p>{{$project_details->project_body}}</p>
									
								</div>

								<div>
									<h3>Language Used:</h3>
									<p>{{$project_details->language}}</p>
								</div>

								<div>
									<h3>Category Name:</h3>
									<p>{{$project_details->category->name}}</p>
								</div>
								<input type="hidden" value="{{$project_details->id}}" id="pro_id">
								<a href="{{route('teacher.accept',['id'=>$project_details->id])}}" class="btn btn-success" id="accept">Accept</a>
                    			<a href="{{route('teacher.deny',['id'=>$project_details->id])}}" class="btn btn-danger">Deny</a>



                        </div>
                    </div>
</div>


@endsection