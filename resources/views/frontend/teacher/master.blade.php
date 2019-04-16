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
					
					@include('frontend.teacher.header')
					
					@yield('content')

			     @include('frontend.teacher.chat')

		
         <script src="https://code.jquery.com/jquery-3.3.1.min.js"
         integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
       <!--  <script type="text/javascript" src="../cdn.jsdelivr.net/npm/autosize%404.0.2/dist/autosize.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/prism/1.10.0/prism.min.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/%40shopify/draggable%401.0.0-beta.7/lib/draggable.bundle.legacy.js"></script>
        <script type="text/javascript" src="../cdn.jsdelivr.net/npm/%40shopify/draggable%401.0.0-beta.7/lib/plugins/swap-animation.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
        <script type="text/javascript" src="../cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script> -->
        
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
           
        <script type="text/javascript" src="js/theme.js"></script>
        <script>
          $(document).ready(function(){
            $("#myBtn").click(function(){
              $("#myModal").modal();
            });
          });
    // Set the date we're counting down to
    var date = document.getElementById('date').value;
    var month = document.getElementById('month').value;
    var year = document.getElementById('year').value;
    var timer_date= month+"/"+date+"/"+year;
    var end = new Date(timer_date);



    

    // Update the count down every 1 second
    var x = setInterval(function() {

      // Get todays date and time
      var now = new Date().getTime();

      // Find the distance between now and the count down date
      var distance = end - now;

      // Time calculations for days, hours, minutes and seconds
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
var a= document.getElementById("demo").innerHTML = days + "d " + hours + "h "+ minutes + "m " + seconds + "s ";

      
      // If the count down is over, write some text 
      if (distance < 0) {
        clearInterval(x);
        $.ajax({
               type:'GET',
               url:'/teacher/task/update',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
               }
            });
        
            document.getElementById("expire").innerHTML = "";
    }
      
    }, 1000);

    $(document).ready(function(){

      var grade = [];

        $('input[type="checkbox"]').on('change', function() {
   $(this).siblings('input[type="checkbox"]').prop('checked', false);
});

        $("input:checkbox[name=gpa]:checked").each(function(){
          grade.push($(this).val());
        // console.log(grade);
        });
      });

// ####################THis is code for modify task##################

      $(document).ready(function(){
      // fetch_customer_data();
      function fetch_customer_data(query = ''){

          var id = document.getElementById("task_id").value;
      $.ajax({
            url:"{{ route('teacher.modify',['id'=>"+id+"]) }}",
            type: "GET",
            data: {query:query}, 
            success: function(data){
                data = JSON.toString(data);
                

            }
        });
  }

    $(document).on('click', '#modify', function(){
                  var query = document.getElementById('task_id').value;
                  console.log(query);
                  fetch_customer_data(query)
                  

              });


    // $(document).on('click', '#input', function(){
    //               var query = $('.checkbox:checked').val();
    //               alert(query);
    //           });


  });



// ##########This is code for gpa ######################
$(document).ready(function() {
  var ckbox = $("input[name='gpa']");
  var chkId = '';
  $('input').on('click', function() {
    
    if (ckbox.is(':checked')) {
      $("input[name='gpa']:checked").each ( function() {
        chkId = $(this).val() + ",";
        chkId = chkId.slice(0, -1);
    });
       
       var confirm_val = confirm ('Are U Sure The grade point : '+$(this).val()); // return all values of checkboxes checked
       
       if(confirm_val == true){
        var id = document.getElementById('project_id').value;
        var grade = $(this).val();
        $.ajax({
            url:"{{url('teacher/project/gpa/{id}/{grade}')}}",
            type: "GET",
            data:{
              id:id,
              grade:grade
            },
            success: function(data){
                
                 window.location = "/teacher/home";

            }
        });
          
       }else{
         alert('you press cancle');
       }
       // alert(chkId); // return value of checkbox checked
    }     
  });
});

    
    function getMultipleSelectedValue()
    {
      var x=document.getElementById("alpha");
      for (var i = 0; i < x.options.length; i++) {
         if(x.options[i].selected ==true){
              alert(x.options[i].value);
          }
      }
    }

    

 $(document).on('click', '#attandace', function(){
                  var query = document.getElementById('task_id').value;
                  console.log(query);
                  fetch_customer_data(query)
                  

              });


</script>
</body>
</html>