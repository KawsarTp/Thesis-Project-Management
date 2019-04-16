
@extends('frontend.teacher.master')
@section('content')
@if(!isset($project_id->id))
<script>window.location="http://127.0.0.1:8000/teacher/home";</script>
@else
@if($project_id->finished==0)
<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-xl-10">
                            <div class="page-header mb-4">
                                <div class="media">
                                  
                                    <div class="media-body ml-2">
                                        <h4 class="mb-0">Project Status</h4>
                                            @if($project_id->finished == 0)
                                                <p class="lead text-warning">Incomplete</p>
                                            @else
                                                <p class="lead text-success">Complete</p>
                                            @endif
                                    </div>
                                    
                                    <div class="media-body ml-2">
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Check Attendace</button>
                                    </div>
                                    

                                    <div class="media-body ml-2">
                                        <h4 class="mb-0">Task Percentage</h4>
                                        @if($a == -1)
                                        <p class="lead text-warning">No Task Available</p>
                                        @elseif($a>=40 && $a<= 80 )
                                        <p class="lead text-warning">{{$a}}% Completed out of 100%</p>
                                        @elseif($a==0 && $a < 40)
                                        <p class="lead text-danger">{{$a}}% Completed out of 100%</p>
                                        @else
                                        <p class="lead text-success">{{$a}}% Completed out of 100%</p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="true">Task Completed <span class="badge bg-danger" style="color: white;">{{$task_complete->count()}}</span> out of Task <span class="badge bg-warning" style="color: white;">{{$task_incomplete->count()}}</span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                      <div class="tab-pane fade show active" id="tasks" role="tabpanel" aria-labelledby="tasks-tab" data-filter-list="content-list-body">
                                    <div class="row content-list-head">
                                        <div class="col-auto">
                                            <h3>Tasks</h3>
                                            @if($task_list->count() == 0)
                                             <button class="btn btn-round" data-toggle="modal" data-target="#team-add-modal">
                                                <i class="material-icons">add</i>
                                            </button>
                                            @else
                                            <span class="alert alert-dismissable">You can Assign A task after it expires</span>
                                            @endif
                                        </div>
                                        <form class="col-md-auto">
                                            <div class="input-group input-group-round">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="material-icons">filter_list</i>
                                                    </span>
                                                </div>
                                                <input type="search" class="form-control filter-list-input" placeholder="Filter tasks" aria-label="Filter Tasks" aria-describedby="filter-tasks">
                                            </div>
                                        </form>
                                    </div>
                                    <!--end of content list head-->
                                    <div class="content-list-body row">
                                        @foreach($task as $task_list)
                                        <div class="col-12">
                                            <div class="card card-task">
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" id="progress" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <a href="{{route('teacher.taskdetail',['id'=>$task_list->id])}}">
                                                            <input type="hidden" value="{{$task_list->id}}" id="task_id">
                                                            <h6 data-filter-by="text">{{$task_list->description}}</h6>
                                                        </a>
                                                        <span class="text-small mr-5">{{$task_list->created_at->toFormattedDateString()}} By 
                                                        @if($task_list->teacher->name == auth()->guard('teacher')->user()->name)
                                                            Me
                                                        @else
                                                        {{$task_list->student->name}}
                                                        @endif

                                                        </span>
                                                        @if($task_list->status==0)
                                                        Status:<span class="text-warning ">Incomplete</span>
                                                        @else
                                                        Status:<span class="text-success ">Complete</span>
                                                        @endif
                                                       <!--  @if($task_list->status == 0 )
                                                        <span><a href="{{route('teacher.modify',['id'=>$task_list->id])}}" data-toggle="modal" data-target="#update-modal" class="btn btn-warning ml-5" id="modify">Modify Task</a>
                                                        <input type="text" name="" value="{{$task_list->id}}" id="task_id">
                                                        </span>
                                                        @else
                                                        @endif -->
                                                    </div>
                                                    <div class="card-meta">
                                                    
                                                	<input type="hidden" name="" value="{{$date}}" id="date">
                                                	<input type="hidden" name="" value="{{$month}}" id="month">
                                                	<input type="hidden" name="" value="{{$year}}" id="year">

                                                    @if($task_list->available == 0)
                                                    <span id="demo" style="font-weight:700;font-size: 32px">
                                                    	
                                                    </style></span>
                                                    @else
                                                    <span id="expire" class="text-danger">!!EXPIRED!!</span>
                                                    @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                  </div>
                                    <!--end of content list-->
                                </div>
                            </div>
                            
                            
                            <form class="modal fade" id="team-add-modal" tabindex="-1" role="dialog" aria-labelledby="team-add-modal" aria-hidden="true" action="{{route('task')}}" method="post" enctype="multipart/form-data">
                            	{{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add Task To A Team</h5>
                                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <!--end of modal head-->
                                        <div class="modal-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="team-add-details" role="tabpanel" aria-labelledby="team-add-details-tab">
                                                    <h6>Place Your Task</h6>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Name</label>
                                                        <select name="team" id="" class="form-control col">
                                                        	@foreach($project as $student_info)
                                                        	<option value="{{$student_info->student->id}}">{{$student_info->student->name}}</option>
                                                        	@endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Task Description</label>
                                                        <textarea class="form-control col" rows="3" placeholder="Team description" name="description"></textarea>
                                                    </div>
                                                    <div class="form-group row">
                                                    	<input type="hidden" name="project" value="{{$project_id->id}}">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Submission Date:</label>
                                                        <input type="date" name="date" class="form-control col">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Upload File:</label>
                                                        <input type="file" name="file" class="form-control col">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of modal body-->
                                        <div class="modal-footer">
                                            <input type="submit" class="form-control btn btn-primary" value="Create Task">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            @if($task->count()>0)
                            <form class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="team-add-modal" aria-hidden="true" action="{{route('task.update',['id'=>$task_list->id])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Update Task</h5>
                                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <!--end of modal head-->
                                        <div class="modal-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="team-add-details" role="tabpanel" aria-labelledby="team-add-details-tab">
                                                    <h6>Place Your Task</h6>
                                                    @if(isset($task_a))
                                                    @foreach($task_a as $t)
                                                    <div class="form-group row">
                                                        <label class="col-3">Task Description</label>
                                                        <textarea class="form-control col" rows="3" placeholder="Team description" name="description">{{$t->description}}</textarea>
                                                    </div>
                                                    <div class="form-group row">
                                                        <input type="hidden" name="project_id" value="{{$project_id->id}}">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Submission Date:</label>
                                                        <input type="date" name="date" class="form-control col" value="{{$t->date}}">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Upload File:</label>
                                                        <input type="file" name="file" class="form-control col">
                                                    </div>
                                                    @endforeach
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <!--end of modal body-->
                                        <div class="modal-footer">
                                            <input type="submit" class="form-control btn btn-primary" value="Update Task">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                            
                            @endif

                          
                        </div>
                    </div>
                </div>
                @else

                <script>
                    window.location = "/teacher/vault/project/"+ {!! $project_id->id!!};
                </script>
                @endif

                @endif

                 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Check Attendance</h4>
        </div>
        <div class="modal-body">
          <table border="1" class="table table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th>Date:</th>
                       @foreach($task as $t)
                  <th>{{$t->date}}</th>
                @endforeach
                      
                  </tr>
              </thead>
              <tr>
                <td>Attendance:</td>
                @foreach($task as $t)
                    @if($t->attendance == 0)
                        <td style="color:red;font-weight: 800" id="attandace">A</td>
                    @else
                        <td style="color:green;font-weight: 800" id="attandace">P</td>
                    @endif
                @endforeach
              </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                
                @endsection