<div class="layout layout-nav-top">
            <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
                <a class="navbar-brand" href="index.html">
                    {{-- <img alt="Pipeline" src="img/logo.svg" /> --}}
                    <a href="{{route('teacher.home')}}">Green University</a>
                </a>
               
                <div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('teacher.vault')}}" class="nav-link">Project Vault</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">Project Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('teacher.screen')}}" class="nav-link">Screen Share</a>
                        </li>
            <li class="dropdown">
                 <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">project request <span class="badge bg-danger">{{count($project)}}</span></a>
              <ul class="dropdown-menu" style="width: 200px">
                @if(!count($project))
                <li>No Project Request</li>
                @else
                    @foreach($project as $pro)
                <li class="table table-bordered">
                    <p><a href="{{route('teacher.project_details',['id'=>$pro->id])}}" style="font-size: 20px;overflow: hidden;text-overflow: ellipsis;">{{substr($pro->project_title,0,15)}}</a></p>
                    
                </li>
                    @endforeach
                    @endif
              </ul>
            </li>
                    </ul>
                        <div class="d-none d-lg-block">
                            <div class="dropdown">
                                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img alt="Image" src="{{asset('/images/'.auth()->guard('teacher')->user()->photo)}}" class="avatar" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="" class="dropdown-item">Profile</a>
                                   
                                    <a href="{{route('teacher.logout', auth()->guard('teacher')->user()->id)}}" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>