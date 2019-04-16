<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Project/Thesis management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A project management Bootstrap theme by Medium Rare">
        <link href="img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="css/theme.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>

        <div class="main-container fullscreen">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <div class="text-center">
                            <h1 class="h2">Create account</h1>
                            <hr>
                            <form action="/register" method="post" enctype="multipart/form-data">
                            
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Enter Name" name="name" value="{{old('name')}}" />
                                    @if ($errors->has('name'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Your versity Id" name="dept_id" value="{{old('dept_id')}}"/>
                                    @if ($errors->has('dept_id'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('dept_id') }}</span>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <select name="department" id="" class="form-control">
                                        <option value="0" selected>--Select Department--</option>
                                        <option value="CSE">CSE</option>
                                        <option value="EEE">EEE</option>
                                        <option value="TEX">TEX</option>
                                    </select>
                                    @if ($errors->has('department'))
                                    <span class="alert alert-danger warning-s">{{ $errors->first('department') }}</span>
                                    @endif
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

        <script type="text/javascript" src="../code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/autosize%404.0.2/dist/autosize.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/prism/1.10.0/prism.min.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/%40shopify/draggable%401.0.0-beta.7/lib/draggable.bundle.legacy.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/%40shopify/draggable%401.0.0-beta.7/lib/plugins/swap-animation.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/theme.js"></script>


       
        

    </body>

</html>
