<!doctype html>
<html lang="en">
<head>
    
        <meta charset="utf-8">
        <title>Project/Thesis Management System</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A project management Bootstrap theme by Medium Rare">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="img/favicon.ico" rel="icon" type="image/x-icon">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Gothic+A1" rel="stylesheet">
        <link href="{{url('css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />

    </head>

    <body>
					
					@include('frontend.student.header')
					
					@yield('content')

			

		
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script type="text/javascript" src="{{url('js/jquery.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
       
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="{{url('js/uploadgit.js')}}"></script>
        

       <!--  <script type="text/javascript" src="js/theme.js"></script> -->
       <script type="text/javascript">
        $(document).on('click', '#accept', function(){
              console.log('i');
              // var d = document.getElementById('pro_id').value;

              $.ajax({
                url: "{{ route('teacher.project_max') }}",
                type: "GET",
                success:function(data){

                }

              });

            
          });
         $(document).ready(function() {
          $('select[name="category"]').on('change', function() {
            var category = $(this).val();

            if(category) {
              $.ajax({
                url: '/myform/ajax/'+category,
                type: "GET",
                dataType: "json",
                success:function(data) {
                  $('select[name="teacherid"]').empty();
                  $.each(data, function(key, value) {
                    if(value.id == -1){
                      document.getElementById("teacher_submit").disabled= true;
                      $('select[name="teacherid"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                    }else{
                      // document.getElementById("teacher_submit").attr('disabled',false);
                       // $('select[name="teacherid"]').empty();
                      $('select[name="teacherid"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                      document.getElementById("teacher_submit").disabled= false;

                    }
                  });
                }
              });
                }else{
                  $('select[name="teacherid"]').empty();
                }
              });
            });
       
        </script>
        <script>
            $(document).ready(function(){
                setTimeout(function(){ $('#fade').fadeOut() }, 3000);
        

                fetch_customer_data();

                function fetch_customer_data(query = '')
                {
                  $.ajax({
                     url:"{{ route('search') }}",
                     method:'GET',
                     data:{query:query},
                     dataType:'json',
                     success:function(data)
                     {
                      if(data.output == '' ){
                        $('tbody').html('<h5>No Email Found</h5>');
                      }else{
                        $('tbody').html('<h5>'+data.output+'<a href="search/' + data.id + '" class="btn btn-info">Send Request</a></h5>');
                      }
                       
                    }
                })
              }

              $(document).on('keyup', '#search', function(){
                  var query = $(this).val();
                  fetch_customer_data(query);
              });

          });
             
</script>

        
</body>
</html>