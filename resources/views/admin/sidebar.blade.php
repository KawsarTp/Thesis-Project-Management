<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{route('home')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-bar-chart-o fa-fw"></i> Students<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.addstudent')}}">Add Students</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.studentinfo')}}">Students Info</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.assign')}}">Assign Max Student</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Teachers<span class="fa arrow"></span></a>
                              <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('admin.addteacher')}}">Add Teachers</a>
                                </li>
                                <li>
                                    <a href="{{route('admin.teacherslist')}}">Teacher's list</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li>
                            <a href="{{route('admin.studentquery')}}"><i class="fa fa-table fa-fw"></i>Query</a>
                        </li>

                        <li>
                            <a href="{{route('admin.project')}}"><i class="fa fa-table fa-fw"></i>Projects</a>
                        </li>
                        <li>
                            <a href="{{route('admin.thesis')}}"><i class="fa fa-table fa-fw"></i>Thesis</a>
                        </li>
                        <li>
                            <a href="{{route('admin.category')}}"><i class="fa fa-table fa-fw"></i>Category</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>