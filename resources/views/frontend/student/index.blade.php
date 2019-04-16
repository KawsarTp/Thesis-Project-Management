@extends('frontend.student.master')
@section('content')

<div class="main-container">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-11">
				@if(Session::has('success'))
				<span class="alert alert-success" id="fade">{{session('success')}}</span>
				@endif
				@if(Session::has('friend'))
				<span class="alert alert-success" id="fade">{{session('friend')}}</span>
				@endif
				{{-- Page header  --}}
				<div class="page-header">
					<h1>Project/Thesis Management</h1>
					@if(isset($id))
						{{$id}}
					@else
					
					@endif
					<div class="d-flex align-items-center">
						<ul class="avatars">

							<li>
								<a href="#" data-toggle="tooltip" data-placement="top" title="Claire Connors">
									<img alt="Claire Connors" class="avatar" src="images/{{auth()->guard('student')->user()->photo}}" />
								</a>
							</li>

						</ul>
						<button class="btn btn-round" data-toggle="modal" data-target="#user-invite-modal">
							<i class="material-icons">add</i>
						</button>
					</div>
				</div>
				{{-- End of page Header --}}
				<hr>
				@if($git->count() <=0 )
				<div class="col-md-6">
					<h3 class="text-success">Use git Information</h3>
				<form action="/git/connect" method="post" class="form-group">
					{{csrf_field()}}
					<div class="form-group">
					<input type="text" name="token" class="form-control" placeholder="Use Git Access Token">
					</div>

					<input type="hidden" value="{{auth()->guard('student')->user()->id}}" name="user_id">

					<div class="form-group">
					<input type="text" name="user_name" placeholder="name" class="form-control">
					</div>

					<div class="form-group">
					<input type="text" name="email" placeholder="email" class="form-control">
					</div>

				<div class="form-group">
					<input type="password" name="password" placeholder="password" class="form-control">
				</div>

					<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Connect to git">
				</div>
				</form>
				</div>
				@else
					<h1 class="alert alert-primary">You are conneted to github</h1>
				@endif

				<ul class="nav nav-tabs nav-fill">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">Projects</a>
					</li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="projects" role="tabpanel" aria-labelledby="tasks-tab" data-filter-list="content-list-body">
						<div class="content-list">
							<div class="row content-list-head">
								<div class="col-auto">
									<h3>Projects</h3>
								</div>

							</div>
							<!--end of content list head-->

							<div class="content-list-body row">
								@if(!isset($project_rel->project->status))
								<p class="alert alert-primary">No Projects Available</p>
								@elseif($project_rel->project->status == 1)
								<div class="col-lg-6">
									<div class="card card-project">

										<div class="progress">
											<div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
										</div>

										<div class="card-body">
											<div class="dropdown card-options">
												<button class="btn-options" type="button" id="project-dropdown-button-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="material-icons">more_vert</i>
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<a class="dropdown-item" href="#">Edit</a>
													<a class="dropdown-item" href="#">Share</a>
												</div>
											</div>
											<div class="card-title">
												<a href="{{route('project')}}">
								<h5 data-filter-by="text">{{$project_rel->project->project_title}}</h5>
												</a>
											</div>
											<ul class="avatars">
												<li>

													<a href="#" data-toggle="tooltip" title="Kenny">
														<img alt="Kenny Tran" class="avatar" src="" data-filter-by="alt" />
													</a>
												</li>
											</ul>


											<div class="card-meta d-flex justify-content-between">
												<div class="d-flex align-items-center">
													<i class="material-icons mr-1">playlist_add_check</i>
													<span class="text-small">6/10</span>
												</div>
												<span class="text-small" data-filter-by="text">Due 4 days</span>
											</div>

										</div>
									</div>
								</div>
								@else
								<p class="alert alert-primary">Project Request Pending</p>
								@endif
								<!--end of content list body-->
							</div>
							<!--end of content list-->
						</div>
						<!--end of tab-->
						<div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab" data-filter-list="content-list-body">
							<div class="content-list">
								<div class="row content-list-head">
									<div class="col-auto">
										<h3>Members</h3>
										<button class="btn btn-round" data-toggle="modal" data-target="#user-invite-modal">
											<i class="material-icons">add</i>
										</button>
									</div>
									
								</div>
								<!--end of content list head-->
								<div class="content-list-body row">

									<div class="col-6">
										<a class="media media-member" href="#">
											<img alt="Claire Connors" src="img/avatar-female-1.jpg" class="avatar avatar-lg" />
											<div class="media-body">
												<h6 class="mb-0" data-filter-by="text">Claire Connors</h6>
												<span data-filter-by="text" class="text-body">Administrator</span>
											</div>
										</a>
									</div>

									<div class="col-6">
										<a class="media media-member" href="#">
											<img alt="Kerri-Anne Banks" src="img/avatar-female-5.jpg" class="avatar avatar-lg" />
											<div class="media-body">
												<h6 class="mb-0" data-filter-by="text">Kerri-Anne Banks</h6>
												<span data-filter-by="text" class="text-body">Marketing</span>
											</div>
										</a>
									</div>

									<div class="col-6">
										<a class="media media-member" href="#">
											<img alt="Masimba Sibanda" src="img/avatar-male-5.jpg" class="avatar avatar-lg" />
											<div class="media-body">
												<h6 class="mb-0" data-filter-by="text">Masimba Sibanda</h6>
												<span data-filter-by="text" class="text-body">Designer</span>
											</div>
										</a>
									</div>

									<div class="col-6">
										<a class="media media-member" href="#">
											<img alt="Krishna Bajaj" src="img/avatar-female-6.jpg" class="avatar avatar-lg" />
											<div class="media-body">
												<h6 class="mb-0" data-filter-by="text">Krishna Bajaj</h6>
												<span data-filter-by="text" class="text-body">Marketing</span>
											</div>
										</a>
									</div>

									<div class="col-6">
										<a class="media media-member" href="#">
											<img alt="Kenny Tran" src="img/avatar-male-6.jpg" class="avatar avatar-lg" />
											<div class="media-body">
												<h6 class="mb-0" data-filter-by="text">Kenny Tran</h6>
												<span data-filter-by="text" class="text-body">Contributor</span>
											</div>
										</a>
									</div>

								</div>
							</div>
							<!--end of content list-->
						</div>
					</div>
					<form class="modal fade" id="user-invite-modal" tabindex="-1" role="dialog" aria-labelledby="user-invite-modal" aria-hidden="true" action="{{route('home')}}" method="get">
						{{csrf_field()}}
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Invite Users</h5>
									<button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
										<i class="material-icons">close</i>
									</button>
								</div>
								<!--end of modal head-->
								<div class="modal-body">
									<p>Send an invite link via email to add members to this team</p>
										
									<div>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">
													<i class="material-icons">email</i>
												</span>
											</div>
											<input type="text" class="form-control" placeholder="Recipient email address" aria-label="Recipient email address" name="search" id="search">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr>
													<th>Email</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
								</div>
								
							</div>
						</div>
					</form>
					<form class="modal fade" id="team-manage-modal" tabindex="-1" role="dialog" aria-labelledby="team-manage-modal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Manage Team</h5>
									<button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
										<i class="material-icons">close</i>
									</button>
								</div>
								<!--end of modal head-->
								<ul class="nav nav-tabs nav-fill">
									<li class="nav-item">
										<a class="nav-link active" id="team-manage-details-tab" data-toggle="tab" href="#team-manage-details" role="tab" aria-controls="team-manage-details" aria-selected="true">Details</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="team-manage-members-tab" data-toggle="tab" href="#team-manage-members" role="tab" aria-controls="team-manage-members" aria-selected="false">Members</a>
									</li>
								</ul>
								<div class="modal-body">
									<div class="tab-content">
										<div class="tab-pane fade show active" id="team-manage-details" role="tabpanel" aria-labelledby="team-manage-details-tab">
											<h6>Team Details</h6>
											<div class="form-group row align-items-center">
												<label class="col-3">Name</label>
												<input class="form-control col" type="text" placeholder="Team name" name="team-name" value="Medium Rare" />
											</div>
											<div class="form-group row">
												<label class="col-3">Description</label>
												<textarea class="form-control col" rows="3" placeholder="Team description" name="team-description">A small web studio crafting lovely template products.</textarea>
											</div>
										</div>
										<div class="tab-pane fade" id="team-manage-members" role="tabpanel" aria-labelledby="team-manage-members-tab">
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



												</div>
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
					<form class="modal fade" id="project-add-modal" tabindex="-1" role="dialog" aria-labelledby="project-add-modal" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">New Project</h5>
									<button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
										<i class="material-icons">close</i>
									</button>
								</div>
								<!--end of modal head-->
								<ul class="nav nav-tabs nav-fill">
									<li class="nav-item">
										<a class="nav-link active" id="project-add-details-tab" data-toggle="tab" href="#project-add-details" role="tab" aria-controls="project-add-details" aria-selected="true">Details</a>
									</li>

</ul>


</div>
</div>
</div>
@include('frontend.student.chat')
@endsection