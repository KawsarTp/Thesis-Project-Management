@extends('frontend.teacher.master')
@section('content')

<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-xl-10">
                            <div class="page-header mb-4">
                                <div class="media">
                                    <img alt="Image" src="{{asset('/images/'.$teacher->photo)}}" class="avatar avatar-lg mt-1" />
                                    <div class="media-body ml-3">
                                        <h1 class="mb-0">{{$teacher->name}}</h1>
                                        <p class="lead">{{$teacher->designation}}</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#teams" role="tab" aria-controls="teams" aria-selected="true">Projects <span class="badge badge-danger">{{$project_count->count()}}</span></a>
                                </li>
                              
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="teams" role="tabpanel" aria-labelledby="teams-tab" data-filter-list="content-list-body">
                                    <div class="row content-list-head">
                                        <div class="col-auto">
                                            <h3>Projects</h3>
                                        </div>
                                    </div>
                                    <!--end of content list head-->
                                    <div class="content-list-body row">
                                        @if($project->count()==0)
                                        <span class="alert alert-primary">No Projects Available</span>
                                        @else
                                        
										@foreach($project as $pro)
                                        @if($pro->finished == 0)
                                        <div class="col-md-6">
                                            <div class="card card-team">
                                                <div class="card-body">
                                                    <h4 class="alert alert-primary">Project Running</h4>
                                                    
                                                    <div class="card-title">
                                                        <a href="{{route('teacher.project',['id'=>$pro->id])}}">
                                                            <h5 data-filter-by="text">{{$pro->project_title}}</h5>
                                                        </a>
                                                        Name: <span>{{$pro->student->name}}</span>
                                                        <br>
                                                        ID: <span>{{$pro->student->dept_id}}</span>
                                                    </div>
                                                    <ul class="avatars">
                                                           <li>
                                                            <a href="#" data-toggle="tooltip" title="{{$pro->student->name}}">
                                                                <img alt="Marcus Simmons" class="avatar" src="{{asset('/images/'.$pro->student->photo)}}" />


                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        
                                        @endif
                                        @endforeach   
                                        @endif                         
                                    </div>
                                    <!--end of content-list-body-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                
                                
                        
@endsection