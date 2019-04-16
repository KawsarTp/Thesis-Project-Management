<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Project/Thesis management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A project management Bootstrap theme by Medium Rare">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <link href="{{url('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!-- <link rel="stylesheet" type="text/css" href="{{url('css/dropdown.css')}}"> -->
    </head>

    <body>
    @if(count($errors))
    @foreach($errors->all() as $error)
    <li class="alert alert-warning">{{$error}}</li>
    @endforeach
    @endif
        <div class="main-container fullscreen">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <div class="text-center">
                            <h1 class="h2">Create account</h1>
                            <hr>
                            <form action="{{route('teacher.store')}}" method="post" enctype="multipart/form-data">
                            
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{old('name')}}" />
                                    @if ($errors->has('name'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                
                                 <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Mobile Number" name="phone" value="{{old('phone')}}" />
                                    @if ($errors->has('phone'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <select name="department" id="" class="form-control">
                                        <option value="0" selected>--Select Department--</option>
                                        <option value="CSE">CSE</option>
                                        
                                    </select>
                                    @if ($errors->has('department'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('department') }}</span>
                                    @endif
                                </div>
                                <div class="form-group" >
                                    <!-- <span>Select Category</span> -->
                                    <select class="js-example-basic-multiple" name="categories[]" multiple="multiple" style="width: 100%" placeholder="jasasasa">
                                      @foreach($category as $category_list)
                                        <option value="{{$category_list->id}}">{{$category_list->name}}</option>
                                      @endforeach
                                  </select>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <textarea name="address" id="address" cols="30" rows="5" class="form-control" placeholder="Your Address" value="{{old('address')}}"></textarea> 
                                    @if ($errors->has('address'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('address') }}</span>
                                    @endif    
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email" value="{{old('email')}}"/>
                                    @if ($errors->has('email'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                  <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your designation" name="designation" value="{{old('designation')}}"/>
                                    @if ($errors->has('designation'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('designation') }}</span>
                                    @endif
                                </div>

                                  <div class="form-group">
                                   <textarea name="publication" id="" class="form-control" placeholder="Your Publication"></textarea>
                                    @if ($errors->has('publication'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('publication') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" />
                                    <div class="text-left">
                                        <small>Your password should be at least 8 characters</small>
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"/>   
                                </div>

                                <div class="form-group">
                                    <input type="file" name="photo" class="form-control">
                                </div>

                                <button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
                                    Create account
                                </button>
                                <small>By clicking 'Create Account' you agree to our <a href="#">Terms of Use</a>
                                </small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{url('js/dropdown.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <!-- <script type="text/javascript" src="assets/js/theme.js"></script> -->
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
            });

            
        </script>
        
    </body>

</html>
