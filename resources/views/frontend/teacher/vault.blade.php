@extends('frontend.teacher.master')
@section('content')
<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-xl-10">
                        	<h1 class="alert alert-dark" style="margin-top: 10px;">Project Vault Gellary</h1>
<div class="content-list-body row">
@foreach($project as $pro)
<div class="col-md-6">						

											
                                            <div class="card card-team">
                                                <div class="card-body">
                                                    <h4 class="alert alert-danger">Project Finished</h4>
                                                    
                                                    <div class="card-title">
                                                        <a href="{{route('teacher.project.vault',['id'=>$pro->id])}}">
                                                            <h5 data-filter-by="text">{{$pro->project_title}}</h5>
                                                        </a>
                                                        Name: <span>{{$pro->student->name}}</span>
                                                        <br>
                                                        ID: <span>{{$pro->student->dept_id}}</span>
                                                    </div>
                                                    <ul class="avatars">
                                                           <li>
                                                            <a href="#" data-toggle="tooltip" title="Marcus">
                                                                <img alt="Marcus Simmons" class="avatar" src="{{asset('/images/'.$pro->student->photo)}}" />


                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                       		
                                        </div>
@endforeach
</div>
</div>
</div>
</div>
@endsection