@if(isset($token))
asasasasa
@endif

<!doctype html>
<html lang="en">
<head>
    
        <meta charset="utf-8">
        <title>Project/Thesis Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A project management Bootstrap theme by Medium Rare">

        <link href="img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
       <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
        <link href="{{url('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />

        <style>
          

        </style>

    </head>

    <body>

    	<div class="main-container fullscreen">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-7">
                        <div class="text-center">
                            <h1 class="h2">Update password &#x1f62B;</h1>
                            <p class="lead">Enter your Password to Update</p>
                            <form action="{{route('teacher.send')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="New password" name="password" />
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" placeholder="Re-enter password" name="password_confirmation" />
                                </div>
                                <input type="submit" class="btn btn-block btn-primary" value="Update New Password">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	
</body>
</html>