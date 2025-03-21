<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
        require 'loginfo.php';
        require 'logout.php';
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../files/js/calendar.global.js"></script>
    <style>
            .container
            {
                margin-top: 35px;
            }
        </style>
  </head>
  <body>
     <div class="container">
       <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="admin.php">Admin Page</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="getClassroomResource.php">Classroom Resource</a>
                    </div>
                </div>
            </nav>
            <div id='homecon' style='display:none;'></div>
            <div id="calendar">
            </div>
            <?php
                require 'dbconfig.php';
                $sql1 = "Select * from classroomschedule WHERE Active = 1";
                $results = $con->query($sql1);
            ?>


    </div>
    <script>
       
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    eventMouseEnter: function (info) {
         $("#homecon").show();
         $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages'></div>");  
                        $('#messages').html("")
                        .hide()  
                        .fadeIn(3000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                    });  
                        
                       $('#messages').html('Classroom: ' + info.event.extendedProps.description + '<br/> Faculty Member:' + info.event.title)
                        .fadeOut(2000, function() {
                        $('#messages').html("");
                    }); 
},
    headerToolbar: {
      left: 'prev,next today',
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
     events:[
                    <?php
                    while($row2 = $results->fetch_assoc())
                        {?>
                    {
                        title:'<?php echo $row2['facultyMember'];?>',
                        start: '<?php echo $row2['scheduleDate'];?>',
                        end: '<?php echo $row2['scheduleDate'];?>',
                        description: '<?php echo $row2['classRoomNum'];?>',
                        color: 'yellow',
                        textColor: 'black'
                    },
                <?php } ?>
                ]
  });

  calendar.render();
});

    
    </script>
     <script>
            setInterval(function(){ auto_logout() }, 1200000);
            function auto_logout()
            {
            //this function will redirect the user to the session expired page and redirect back to main page
            if(confirm("Your session has expired"))
            {
                window.location="sessionExpired.php";
            }
 
            }
    </script> 
  </body>
</html>