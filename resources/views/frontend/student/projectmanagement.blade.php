@extends('frontend.student.master')

@section('content')
            <div class="main-container">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-11 col-xl-10">
                            <div class="page-header">
                                <h1>Project Task and upload Area</h1>
                                <div>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width:25%;"></div>
                                    </div>
                                    <div class="d-flex justify-content-between text-small">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons">playlist_add_check</i>
                                            <span>3/12</span>
                                        </div>
                                        <span>Due 9 days</span>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs nav-fill">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="true">Tasks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Activity</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tasks" role="tabpanel" aria-labelledby="tasks-tab" data-filter-list="card-list-body">
                                    <div class="row content-list-head">
                                        <div class="col-auto">
                                            <h3>Tasks</h3>
                                            
                                        </div>
                                    </div>
                                    <!--end of content list head-->
                                    <div class="content-list-body">
                                        <div class="card-list">
                                            <div class="card-list-head">
                                                <h6>Evaluation</h6>
                                            </div>
                                            <div class="card-list-body">
                                                @foreach($task as $task_list)
                                                <div class="card card-task">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-title">
                                                            <a href="#">
                                                                <h6 data-filter-by="text">{{$task_list->description}}</h6>
                                                            </a>
                                                            <span class="text-small">{{$task_list->created_at->toFormattedDateString()}}</span>
                                                        </div>
                                                        <div class="card-meta">
                                                            <div class="d-flex align-items-center">
                                                                <i class="material-icons">playlist_add_check</i>
                                                                <span>3/4</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                              
                                            </div>
                                        </div>
                                        <!--end of content list body-->
                                    </div>
                                    <!--end of content list-->
                                </div>
                                <!--end of tab-->
                                <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab" data-filter-list="dropzone-previews">
                                    <div class="content-list">
                                        <div class="row content-list-head">
                                            <div class="col-auto">
                                                <h3>Files</h3>
                                            </div>
                                            <form class="col-md-auto">
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter files" aria-label="Filter Tasks" aria-describedby="filter-tasks">
                                                </div>
                                            </form>
                                        </div>
                                        <!--end of content list head-->
                                        <div class="content-list-body row">
                                            <div class="col">
                                                <div class="d-none dz-template">
                                                    <li class="list-group-item dz-preview dz-file-preview">
                                                        <div class="media align-items-center dz-details">
                                                            <ul class="avatars">
                                                                <li>
                                                                    <div class="avatar bg-primary dz-file-representation">
                                                                        <img class="avatar" data-dz-thumbnail />
                                                                        <i class="material-icons">attach_file</i>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <img alt="David Whittaker" src="img/avatar-male-4.jpg" class="avatar" data-title="David Whittaker" data-toggle="tooltip" />
                                                                </li>
                                                            </ul>
                                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                                <div class="dz-file-details">
                                                                    <a href="#" class="dz-filename">
                                                                        <span data-dz-name></span>
                                                                    </a>
                                                                    <br>
                                                                    <span class="text-small dz-size" data-dz-size></span>
                                                                </div>
                                                                <img alt="Loader" src="img/loader.svg" class="dz-loading" />
                                                                <div class="dropdown">
                                                                    <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Download</a>
                                                                        <a class="dropdown-item" href="#">Share</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger" href="#" data-dz-remove>Delete</a>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-danger btn-sm dz-remove" data-dz-remove>
                                                                    Cancel
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="progress dz-progress">
                                                            <div class="progress-bar dz-upload" data-dz-uploadprogress></div>
                                                        </div>
                                                    </li>
                                                </div>
                                                <form class="dropzone" action="http://mediumra.re/dropzone/upload.php">
                                                   <input type="file" class="dz-message btn-block">
                                                </form>
                                                <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">
                                                @foreach($task as $task_list)
                                                    <li class="list-group-item">
                                                        <div class="media align-items-center">
                                                            <ul class="avatars">
                                                                <li>
                                                                    <div class="avatar bg-primary">
                                                                        <i class="material-icons">folder</i>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar" data-title="Harry Xai" data-toggle="tooltip" data-filter-by="data-title" />
                                                                </li>
                                                            </ul>
                                                            
                                                            <div class="media-body d-flex justify-content-between align-items-center">
                                                                @if($task_list->file =='0')
                                                                @php
                                                                continue;
                                                                @endphp
                                                                @else
                                                                <div>
                                                                    <a href="images/files/{{$task_list->file}}" data-filter-by="text" target="blank">{{$task_list->file}}</a>
                                                                    <br>
                                                                    
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="material-icons">more_vert</i>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="#">Download</a>
                                                                        <a class="dropdown-item" href="#">Share</a>
                                                                        <div class="dropdown-divider"></div>
                                                                        <a class="dropdown-item text-danger" href="#">Delete</a>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                    @endforeach


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end of content list-->
                                </div>
                                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab" data-filter-list="list-group-activity">
                                    <div class="content-list">
                                        <div class="row content-list-head">
                                            <div class="col-auto">
                                                <h3>Activity</h3>
                                            </div>
                                            <form class="col-md-auto">
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter activity" aria-label="Filter activity" aria-describedby="filter-tasks">
                                                </div>
                                            </form>
                                        </div>
                                        <!--end of content list head-->
                                        <div class="content-list-body">
                                            <ol class="list-group list-group-activity">


                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">playlist_add_check</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="Claire" src="img/avatar-female-1.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">Claire</span>
                                                                <span data-filter-by="text">completed the task</span><a href="#" data-filter-by="text">Set up client chat channel</a>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">Just now</span>
                                                        </div>
                                                    </div>
                                                </li>



                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">person_add</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="Ravi" src="img/avatar-male-3.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">Ravi</span>
                                                                <span data-filter-by="text">joined the project</span>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">5 hours ago</span>
                                                        </div>
                                                    </div>
                                                </li>



                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">playlist_add</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="Kristina" src="img/avatar-female-4.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">Kristina</span>
                                                                <span data-filter-by="text">added the task</span><a href="#" data-filter-by="text">Produce broad concept directions</a>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">Yesterday</span>
                                                        </div>
                                                    </div>
                                                </li>



                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">playlist_add</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="Marcus" src="img/avatar-male-1.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">Marcus</span>
                                                                <span data-filter-by="text">added the task</span><a href="#" data-filter-by="text">Present concepts and establish direction</a>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">Yesterday</span>
                                                        </div>
                                                    </div>
                                                </li>



                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">person_add</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="Sally" src="img/avatar-female-3.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">Sally</span>
                                                                <span data-filter-by="text">joined the project</span>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">2 days ago</span>
                                                        </div>
                                                    </div>
                                                </li>



                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">date_range</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="Claire" src="img/avatar-female-1.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">Claire</span>
                                                                <span data-filter-by="text">rescheduled the task</span><a href="#" data-filter-by="text">Target market trend analysis</a>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">2 days ago</span>
                                                        </div>
                                                    </div>
                                                </li>



                                                <li class="list-group-item">
                                                    <div class="media align-items-center">
                                                        <ul class="avatars">
                                                            <li>
                                                                <div class="avatar bg-primary">
                                                                    <i class="material-icons">add</i>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <img alt="David" src="img/avatar-male-4.jpg" class="avatar" data-filter-by="alt" />
                                                            </li>
                                                        </ul>
                                                        <div class="media-body">
                                                            <div>
                                                                <span class="h6" data-filter-by="text">David</span>
                                                                <span data-filter-by="text">started the project</span>
                                                            </div>
                                                            <span class="text-small" data-filter-by="text">12 days ago</span>
                                                        </div>
                                                    </div>
                                                </li>














                                            </ol>
                                        </div>
                                    </div>
                                    <!--end of content list-->
                                </div>
                            </div>
                            <form class="modal fade" id="user-manage-modal" tabindex="-1" role="dialog" aria-labelledby="user-manage-modal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Manage Users</h5>
                                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <!--end of modal head-->
                                        <div class="modal-body">
                                            <div class="users-manage" data-filter-list="form-group-users">
                                                <div class="mb-3">
                                                    <ul class="avatars text-center">

                                                        <li>
                                                            <img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar" data-toggle="tooltip" data-title="Claire Connors" />
                                                        </li>

                                                        <li>
                                                            <img alt="Marcus Simmons" src="img/avatar-male-1.jpg" class="avatar" data-toggle="tooltip" data-title="Marcus Simmons" />
                                                        </li>

                                                        <li>
                                                            <img alt="Peggy Brown" src="img/avatar-female-2.jpg" class="avatar" data-toggle="tooltip" data-title="Peggy Brown" />
                                                        </li>

                                                        <li>
                                                            <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar" data-toggle="tooltip" data-title="Harry Xai" />
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="input-group input-group-round">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="material-icons">filter_list</i>
                                                        </span>
                                                    </div>
                                                    <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members" aria-describedby="filter-members">
                                                </div>
                                                <div class="form-group-users">

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-1" checked>
                                                        <label class="custom-control-label" for="user-manage-1">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-2" checked>
                                                        <label class="custom-control-label" for="user-manage-2">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Marcus Simmons" src="img/avatar-male-1.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-3" checked>
                                                        <label class="custom-control-label" for="user-manage-3">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Peggy Brown" src="img/avatar-female-2.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-4" checked>
                                                        <label class="custom-control-label" for="user-manage-4">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-5">
                                                        <label class="custom-control-label" for="user-manage-5">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Sally Harper" src="img/avatar-female-3.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-6">
                                                        <label class="custom-control-label" for="user-manage-6">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Ravi Singh" src="img/avatar-male-3.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-7">
                                                        <label class="custom-control-label" for="user-manage-7">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Kristina Van Der Stroem" src="img/avatar-female-4.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Kristina Van Der Stroem</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-8">
                                                        <label class="custom-control-label" for="user-manage-8">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="David Whittaker" src="img/avatar-male-4.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-9">
                                                        <label class="custom-control-label" for="user-manage-9">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Kerri-Anne Banks" src="img/avatar-female-5.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-10">
                                                        <label class="custom-control-label" for="user-manage-10">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Masimba Sibanda" src="img/avatar-male-5.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-11">
                                                        <label class="custom-control-label" for="user-manage-11">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Krishna Bajaj" src="img/avatar-female-6.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="user-manage-12">
                                                        <label class="custom-control-label" for="user-manage-12">
                                                            <div class="d-flex align-items-center">
                                                                <img alt="Kenny Tran" src="img/avatar-male-6.jpg" class="avatar mr-2" />
                                                                <span class="h6 mb-0" data-filter-by="text">Kenny Tran</span>
                                                            </div>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--end of modal body-->
                                        <div class="modal-footer">
                                            <button role="button" class="btn btn-primary" type="submit">
                                                Done
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="modal fade" id="project-edit-modal" tabindex="-1" role="dialog" aria-labelledby="project-edit-modal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Project</h5>
                                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <!--end of modal head-->
                                        <ul class="nav nav-tabs nav-fill">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="project-edit-details-tab" data-toggle="tab" href="#project-edit-details" role="tab" aria-controls="project-edit-details" aria-selected="true">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="project-edit-members-tab" data-toggle="tab" href="#project-edit-members" role="tab" aria-controls="project-edit-members" aria-selected="false">Members</a>
                                            </li>
                                        </ul>
                                        <div class="modal-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="project-edit-details" role="tabpanel" aria-labelledby="project-edit-details-tab">
                                                    <h6>General Details</h6>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Name</label>
                                                        <input class="form-control col" type="text" value="Brand Concept and Design" name="project-name" />
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Description</label>
                                                        <textarea class="form-control col" rows="3" placeholder="Project description" name="project-description">Research, ideate and present brand concepts for client consideration</textarea>
                                                    </div>
                                                    <hr>
                                                    <h6>Timeline</h6>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Start Date</label>
                                                        <input class="form-control col" type="date" placeholder="Project start" name="project-start" />
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Due Date</label>
                                                        <input class="form-control col" type="date" placeholder="Project due" name="project-due" />
                                                    </div>
                                                    <div class="alert alert-warning text-small" role="alert">
                                                        <span>You can change due dates at any time.</span>
                                                    </div>
                                                    <hr>
                                                    <h6>Visibility</h6>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="visibility-everyone" name="visibility" class="custom-control-input" checked>
                                                                <label class="custom-control-label" for="visibility-everyone">Everyone</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="visibility-members" name="visibility" class="custom-control-input">
                                                                <label class="custom-control-label" for="visibility-members">Members</label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="visibility-me" name="visibility" class="custom-control-input">
                                                                <label class="custom-control-label" for="visibility-me">Just me</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="project-edit-members" role="tabpanel" aria-labelledby="project-edit-members-tab">
                                                    <div class="users-manage" data-filter-list="form-group-users">
                                                        <div class="mb-3">
                                                            <ul class="avatars text-center">

                                                                <li>
                                                                    <img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar" data-toggle="tooltip" data-title="Claire Connors" />
                                                                </li>

                                                                <li>
                                                                    <img alt="Marcus Simmons" src="img/avatar-male-1.jpg" class="avatar" data-toggle="tooltip" data-title="Marcus Simmons" />
                                                                </li>

                                                                <li>
                                                                    <img alt="Peggy Brown" src="img/avatar-female-2.jpg" class="avatar" data-toggle="tooltip" data-title="Peggy Brown" />
                                                                </li>

                                                                <li>
                                                                    <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar" data-toggle="tooltip" data-title="Harry Xai" />
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="input-group input-group-round">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">filter_list</i>
                                                                </span>
                                                            </div>
                                                            <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members" aria-describedby="filter-members">
                                                        </div>
                                                        <div class="form-group-users">

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-1" checked>
                                                                <label class="custom-control-label" for="project-user-1">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-2" checked>
                                                                <label class="custom-control-label" for="project-user-2">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Marcus Simmons" src="img/avatar-male-1.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-3" checked>
                                                                <label class="custom-control-label" for="project-user-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Peggy Brown" src="img/avatar-female-2.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-4" checked>
                                                                <label class="custom-control-label" for="project-user-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-5">
                                                                <label class="custom-control-label" for="project-user-5">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Sally Harper" src="img/avatar-female-3.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-6">
                                                                <label class="custom-control-label" for="project-user-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Ravi Singh" src="img/avatar-male-3.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-7">
                                                                <label class="custom-control-label" for="project-user-7">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Kristina Van Der Stroem" src="img/avatar-female-4.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Kristina Van Der Stroem</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-8">
                                                                <label class="custom-control-label" for="project-user-8">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="David Whittaker" src="img/avatar-male-4.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-9">
                                                                <label class="custom-control-label" for="project-user-9">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Kerri-Anne Banks" src="img/avatar-female-5.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-10">
                                                                <label class="custom-control-label" for="project-user-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Masimba Sibanda" src="img/avatar-male-5.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-11">
                                                                <label class="custom-control-label" for="project-user-11">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Krishna Bajaj" src="img/avatar-female-6.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="project-user-12">
                                                                <label class="custom-control-label" for="project-user-12">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Kenny Tran" src="img/avatar-male-6.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Kenny Tran</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of modal body-->
                                        <div class="modal-footer">
                                            <button role="button" class="btn btn-primary" type="submit">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="modal fade" id="task-add-modal" tabindex="-1" role="dialog" aria-labelledby="task-add-modal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">New Task</h5>
                                            <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </div>
                                        <!--end of modal head-->
                                        <ul class="nav nav-tabs nav-fill">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="task-add-details-tab" data-toggle="tab" href="#task-add-details" role="tab" aria-controls="task-add-details" aria-selected="true">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="task-add-members-tab" data-toggle="tab" href="#task-add-members" role="tab" aria-controls="task-add-members" aria-selected="false">Members</a>
                                            </li>
                                        </ul>
                                        <div class="modal-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="task-add-details" role="tabpanel" aria-labelledby="task-add-details-tab">
                                                    <h6>General Details</h6>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Name</label>
                                                        <input class="form-control col" type="text" placeholder="Task name" name="task-name" />
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-3">Description</label>
                                                        <textarea class="form-control col" rows="3" placeholder="Task description" name="task-description"></textarea>
                                                    </div>
                                                    <hr>
                                                    <h6>Timeline</h6>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Start Date</label>
                                                        <input class="form-control col" type="date" placeholder="Task start" name="task-start" />
                                                    </div>
                                                    <div class="form-group row align-items-center">
                                                        <label class="col-3">Due Date</label>
                                                        <input class="form-control col" type="date" placeholder="Task due" name="task-due" />
                                                    </div>
                                                    <div class="alert alert-warning text-small" role="alert">
                                                        <span>You can change due dates at any time.</span>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="task-add-members" role="tabpanel" aria-labelledby="task-add-members-tab">
                                                    <div class="users-manage" data-filter-list="form-group-users">
                                                        <div class="mb-3">
                                                            <ul class="avatars text-center">

                                                                <li>
                                                                    <img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar" data-toggle="tooltip" data-title="Claire Connors" />
                                                                </li>

                                                                <li>
                                                                    <img alt="Marcus Simmons" src="img/avatar-male-1.jpg" class="avatar" data-toggle="tooltip" data-title="Marcus Simmons" />
                                                                </li>

                                                                <li>
                                                                    <img alt="Peggy Brown" src="img/avatar-female-2.jpg" class="avatar" data-toggle="tooltip" data-title="Peggy Brown" />
                                                                </li>

                                                                <li>
                                                                    <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar" data-toggle="tooltip" data-title="Harry Xai" />
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="input-group input-group-round">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="material-icons">filter_list</i>
                                                                </span>
                                                            </div>
                                                            <input type="search" class="form-control filter-list-input" placeholder="Filter members" aria-label="Filter Members" aria-describedby="filter-members">
                                                        </div>
                                                        <div class="form-group-users">

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-1" checked>
                                                                <label class="custom-control-label" for="task-user-1">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Claire Connors</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-2" checked>
                                                                <label class="custom-control-label" for="task-user-2">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Marcus Simmons" src="img/avatar-male-1.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Marcus Simmons</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-3" checked>
                                                                <label class="custom-control-label" for="task-user-3">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Peggy Brown" src="img/avatar-female-2.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Peggy Brown</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-4" checked>
                                                                <label class="custom-control-label" for="task-user-4">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Harry Xai" src="img/avatar-male-2.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Harry Xai</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-5">
                                                                <label class="custom-control-label" for="task-user-5">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Sally Harper" src="img/avatar-female-3.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Sally Harper</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-6">
                                                                <label class="custom-control-label" for="task-user-6">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Ravi Singh" src="img/avatar-male-3.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Ravi Singh</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-7">
                                                                <label class="custom-control-label" for="task-user-7">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Kristina Van Der Stroem" src="img/avatar-female-4.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Kristina Van Der Stroem</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-8">
                                                                <label class="custom-control-label" for="task-user-8">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="David Whittaker" src="img/avatar-male-4.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">David Whittaker</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-9">
                                                                <label class="custom-control-label" for="task-user-9">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Kerri-Anne Banks" src="img/avatar-female-5.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Kerri-Anne Banks</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-10">
                                                                <label class="custom-control-label" for="task-user-10">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Masimba Sibanda" src="img/avatar-male-5.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Masimba Sibanda</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-11">
                                                                <label class="custom-control-label" for="task-user-11">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Krishna Bajaj" src="img/avatar-female-6.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Krishna Bajaj</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="task-user-12">
                                                                <label class="custom-control-label" for="task-user-12">
                                                                    <div class="d-flex align-items-center">
                                                                        <img alt="Kenny Tran" src="img/avatar-male-6.jpg" class="avatar mr-2" />
                                                                        <span class="h6 mb-0" data-filter-by="text">Kenny Tran</span>
                                                                    </div>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end of modal body-->
                                        <div class="modal-footer">
                                            <button role="button" class="btn btn-primary" type="submit">
                                                Create Task
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-round btn-floating btn-lg" type="button" data-toggle="collapse" data-target="#floating-chat" aria-expanded="false" aria-controls="sidebar-floating-chat">
                    <i class="material-icons">chat_bubble</i>
                    <i class="material-icons">close</i>
                </button>
                <div class="collapse sidebar-floating" id="floating-chat">
                    <div class="sidebar-content">
                        <div class="chat-module" data-filter-list="chat-module-body">
                            <div class="chat-module-top">
                                <form>
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">search</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Search chat" aria-label="Search Chat" aria-describedby="search-chat">
                                    </div>
                                </form>
                                <div class="chat-module-body">


                                    <div class="media chat-item">
                                        <img alt="Claire" src="img/avatar-female-1.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Claire</span>
                                                <span data-filter-by="text">4 days ago</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Hey guys, just kicking things off here in the chat window. Hope you&#39;re all ready to tackle this great project. Let&#39;s smash some Brand Concept &amp; Design!</p>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="Peggy" src="img/avatar-female-2.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Peggy</span>
                                                <span data-filter-by="text">4 days ago</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Nice one <a href="#">@Claire</a>, we&#39;ve got some killer ideas kicking about already.
                                                    <img src="../media.giphy.com/media/aTeHNLRLrwwwM/giphy.html" alt="alt text" title="Thinking">
                                                </p>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="Marcus" src="img/avatar-male-1.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Marcus</span>
                                                <span data-filter-by="text">3 days ago</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Roger that boss! <a href="#">@Ravi</a> and I have already started gathering some stuff for the mood boards, excited to start! &#x1f525;</p>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="Ravi" src="img/avatar-male-3.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Ravi</span>
                                                <span data-filter-by="text">3 days ago</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <h1 id="-">&#x1f609;</h1>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="Claire" src="img/avatar-female-1.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Claire</span>
                                                <span data-filter-by="text">2 days ago</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Can&#39;t wait! <a href="#">@David</a> how are we coming along with the <a href="#">Client Objective Meeting</a>?</p>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="David" src="img/avatar-male-4.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">David</span>
                                                <span data-filter-by="text">Yesterday</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Coming along nicely, we&#39;ve got a draft for the client questionnaire completed, take a look! &#x1f913;</p>

                                            </div>

                                            <div class="media media-attachment">
                                                <div class="avatar bg-primary">
                                                    <i class="material-icons">insert_drive_file</i>
                                                </div>
                                                <div class="media-body">
                                                    <a href="#" data-filter-by="text">questionnaire-draft.doc</a>
                                                    <span data-filter-by="text">24kb Document</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="Sally" src="img/avatar-female-3.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Sally</span>
                                                <span data-filter-by="text">2 hours ago</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Great start guys, I&#39;ve added some notes to the task. We may need to make some adjustments to the last couple of items - but no biggie!</p>

                                            </div>

                                        </div>
                                    </div>



                                    <div class="media chat-item">
                                        <img alt="Peggy" src="img/avatar-female-2.jpg" class="avatar" />
                                        <div class="media-body">
                                            <div class="chat-item-title">
                                                <span class="chat-item-author" data-filter-by="text">Peggy</span>
                                                <span data-filter-by="text">Just now</span>
                                            </div>
                                            <div class="chat-item-body" data-filter-by="text">
                                                <p>Well done <a href="#">@all</a>. See you all at 2 for the kick-off meeting. &#x1f91C;</p>

                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="chat-module-bottom">
                                <form class="chat-form">
                                    <textarea class="form-control" placeholder="Type message" rows="1"></textarea>
                                    <div class="chat-form-buttons">
                                        <button type="button" class="btn btn-link">
                                            <i class="material-icons">tag_faces</i>
                                        </button>
                                        <div class="custom-file custom-file-naked">
                                            <input type="file" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">
                                                <i class="material-icons">attach_file</i>
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

       @endsection