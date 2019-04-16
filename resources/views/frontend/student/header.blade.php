
<div class="layout layout-nav-top">
            <div class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top">
                <a class="navbar-brand" href="index.html">
                    {{-- <img alt="Pipeline" src="img/logo.svg" /> --}}
                    <a href="{{route('home')}}">Green University</a>
                </a>
               
                <div class="collapse navbar-collapse justify-content-between" id="navbar-collapse">
                    <ul class="navbar-nav">                     
                        <li class="nav-item">
                            <a href="" class="nav-link">Project Vault</a>
                        </li>

                        <li class="nav-item">
                            @if($git->count() <= 0)
                            <button onclick="window.location.href = '/git';" class="nav-link btn btn-primary mr-4" disabled>Git Project Repository</button>
                            @else
                            <button onclick="window.location.href = '/git';" class="nav-link btn btn-primary">Git Project Repository</button>
                            @endif
                        </li>


                        <li class="nav-item">
                            @if(isset($photo->project))
                            <a href="/create" class="nav-link btn btn-primary disabled ">Create Project Proposal</a>
                            @else
                             <a href="/create" class="nav-link btn btn-primary " >Create Project Proposal</a> 
                            @endif
                      

                        </li>

            <li class="dropdown">
                 <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Friend request <span class="badge bg-danger">{{$friend->count()}}</span></a>
              <ul class="dropdown-menu">
                @if(!count($friend))
                <li>No Friend Request</li>
                @else
                    @foreach($friend as $friends)
                <li>
                    {{$friends}} sends you a request
                    
                </li>
                    @endforeach
                    @endif
              </ul>
            </li>
                    </ul>    
                        <div class="d-none d-lg-block">
                            <div class="dropdown">
                                <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img alt="Image" src="{{asset('images/'.$photo->photo)}}" class="avatar" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('profile', auth()->guard('student')->user()->id)}}" class="dropdown-item">Profile</a>
                                   
                                    <a href="{{route('student.logout', auth()->guard('student')->user()->id)}}" class="dropdown-item">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>