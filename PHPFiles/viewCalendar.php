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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"></script>
      <link rel='stylesheet' href='//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
      <link rel="stylesheet" type="text/css" href="../files/css/forms-style.css"> 
    <script src='//code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src='//code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="../files/js/calendar.global.js"></script>
    <style>
            .container
            {
                margin-top: 35px;
            }
            .custom-ui-widget-header-warning {
                border-radius: 10px;
            }  
            .ui-dialog .ui-dialog-titlebar
            {
                display:none;
            } 
        </style>
  </head>
  <body>
     <div class="container">
       <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                         <a class="navbar-brand" href="adminSplash.php"><?php echo $_SESSION['adminUN']?>'s Page</a> 
                         <a class="navbar-brand" href="admin.php"><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get All Tickets</a>
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="addResources.php">Add Resources</a>
                        <a class="navbar-brand" href="getClassroomResource.php">Return Resources</a>
                    </div>
                </div>
            </nav>
            <div id='homecon'></div>
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
        $('#homecon').dialog({
             closeText: "",
             dialogClass: "custom-ui-widget-header-warning"
         });
         $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages' style='font-size: 20px; background: rgba(255,255,255,0.6); border-radius: 8px; padding-left: 10px; backdrop-filter: blur(16px);'></div>");  
                        $('#messages').html("")
                        .hide()  
                        .fadeIn(3000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                    });  
                        
                       $('#messages').html('Classroom: ' + info.event.extendedProps.description + '<br/> Faculty Member:' + info.event.title)
                        .fadeOut(2500, function() {
                        $('#messages').html("");
                        $('#homecon').dialog("close");
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