<!doctype html>
<html lang="en">

    
     <meta charset="utf-8">
        <title>Project/Thesis Management System</title>
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
                            <h1 class="h2">Forgot password &#x1f62B;</h1>
                            <p class="lead">Enter your email address to reset</p>
                            @if(Session::has('error'))
                            <p class="alert alert-warning">{{ Session::get('error') }}</p>
                            @endif

                            @if(Session::has('success'))
                            <p class="alert alert-success">{{ Session::get('success') }}</p>
                            @endif
                            <form action="{{route('teacher.send')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Email Address" name="email" />
                                </div>
                                <input type="submit" class="btn btn-block btn-primary" value="Send Email Reset Link">
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
        <script type="text/javascript" src="js/theme.js"></script>
        
    </body>

</html>
