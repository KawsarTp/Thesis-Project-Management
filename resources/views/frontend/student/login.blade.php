<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <title>Project Thesis Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A project management Bootstrap theme by Medium Rare">
        <link href="img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="{{url('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
       
        <div class="main-container fullscreen">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <div class="text-center">
                           @if(session()->has('active'))
                           <p class="alert alert-warning " id="disappear">{{session('active')}}</p>
                           @endif
                           @if(session()->has('msg'))
                           <p class="alert alert-success" id="fade">{{session('msg')}}</p>
                           @endif
                           @if(session()->has('wrong'))
                           <p class="alert alert-danger" id="fade">{{session('wrong')}}</p>
                           @endif
                            <h1 class="h2">Welcome Back &#x1f44b;</h1>
                            <p class="lead">Log in to your account to continue</p>
                            @if($errors->has('error-log'))
                            <p class="alert alert-warning">{{$errors->first('error-log')}}</p>
                            @endif
                            <form method="POST" action="{{route('login')}}">
                                {{csrf_field()}}
                                
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email" value="{{old('email')}}" required/>  
                                    @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif 
                                </div>
                               
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" required />
                                     @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                    <div class="text-right">
                                        <small><a href="{{route('student.password')}}">Forgot password?</a>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox"  name="remember"  /> Remember Me 
                                    @if ($errors->has('remember'))
                                    <p class="text-danger">{{ $errors->first('remember') }}</p>
                                    @endif 
                                </div>
                                <button class="btn btn-lg btn-block btn-primary" role="button" type="submit">
                                    Log in
                                </button>
                                <small>Don't have an account yet? <a href="{{route('student.register')}}">Create one</a>
                                </small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="../code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/autosize%404.0.2/dist/autosize.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/prism/1.10.0/prism.min.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/%40shopify/draggable%401.0.0-beta.7/lib/draggable.bundle.legacy.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/%40shopify/draggable%401.0.0-beta.7/lib/plugins/swap-animation.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <script type="text/javascript" src="{{asset('public/js/jquery.js')}}"></script>
        <script type="text/javascript" src="assets/js/theme.js"></script>
        <script>
        $(document).ready(function() {
            setTimeout(function() {
                $(".disappear").fadeOut("slow");
            }, 2000);
        });
        </script>
   

    </body>

</html>
