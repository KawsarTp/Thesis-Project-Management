<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Project/Thesis Management</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    

    <!-- MetisMenu CSS -->
    <link href="{{url('vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{url('css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{url('vendor/morrisjs/morris.css')}}" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="{{url('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    

    <div id="wrapper">

       @include('admin.headernav')
       @include('admin.sidebar')

                      
       <div id="page-wrapper">
            
            @yield('content')
        </div>
        <!-- /#page-wrapper -->
    
    </div>
    <!-- /#wrapper -->
    
    <!-- jQuery -->
    <script src="{{url('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{url('vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{url('vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{url('vendor/morrisjs/morris.min.js')}}"></script>
    <script src="{{url('data/morris-data.js')}}"></script>
    <script src="js/dialog.jquery.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{url('js/sb-admin-2.js')}}"></script>
    <script>
        
        
        $(document).ready(function(){
                setTimeout(function(){$('#msg').fadeOut()}, 3000);

        });

         $(document).ready(function(){
        $("#input_category").keyup(function(){
            var a = ($(this).val());
           $.ajax({
                     url:"{{ route('admin.valid') }}",
                     method:'GET',
                     data:{query:a},
                     dataType:'json',
                     success:function(data)
                     {
                      
                       
                    }
                })
        });
    })
    var str = document.getElementById('input_category').value;
    camelize(str);
    function camelize(str) {
      return str.replace(/\W+(.)/g, function(match, chr)
       {
            return chr.toUpperCase();
        });
    }
    </script>

</body>

</html>
