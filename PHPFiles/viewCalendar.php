<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/");

    }
    else
    {
        
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
        <style>
            .custom-ui-widget-header-warning {
                border-radius: 10px;
            }  
            .ui-dialog .ui-dialog-titlebar
            {
                display:none;
            } 
        </style>
        <link rel="stylesheet" type="text/css" href="../files/css/sidebaradmin.css">
  </head>
  <body>
     <div class="container" style="margin-top: 35px;
                margin-left: 250px;">
           <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['adminUN']); ?></li>
                        <li class="account-li logout btn btn-danger"><p style="font-size: 18px; margin-top: 10px">Log Out<p></li>
                    </ul>
                    <!-- SVG for Helpdesk License: CC Attribution. Made by Ryan Adryawan: https://dribbble.com/ryanawan -->
                    <a class="ticket" href="adminSplash.php"><li><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span><?php echo $_SESSION['adminUN']?>'s Page</span></li></a>
                  
                    <a class="ticket" href="admin.php"><li><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</span></li></a>
                    <a class="reserve" href="TroubleTicket.php"><li class="reserveli"><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span>All Tickets</span></li></a>
                     <a class="reserve" href="addAdminFaculty.php"><li class="reserveli"><img src="../files/images/addmember.svg" class="calendaricon"/><br><span>Add New Admin/Faculty Member</span></li></a>
                     <a class="reserve" href="addResources.php"><li class="reserveli"><img src="../files/images/add-resource.svg" class="calendaricon"/><br><span>Add Resources</span></li></a>
                    <a class="reserve" href="returnResource.php"><li class="reserveli"><img src="../files/images/switch-icon.svg" class="calendaricon"/><br><span>Return Resources</span></li></a>
                </ul>
            </div>
            <div id='homecon'></div>
            <div id="calendar">
            </div>
            <?php
                require 'dbconfig.php';
                $sql1 = "Select * from classroomschedule WHERE Active = 1";
                $results = $con->query($sql1);
            ?>
    </div>
     <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
    <script>
          $(document).ready(function()
           {
            $('.logout').on('click',function()
            {
           $(location).prop('href', 'sessionDestroy.php');
            });
            });
        </script>
             <script>
            $('.account').on("click", function(){
              
                $(".account-ul").addClass('view'); 
                $(".allLinks-ul").removeClass('allLinks-view');  
            });
        </script>
         <script>
            $('.viewButton').on("click", function(){
                $(".account-ul").removeClass('view');
                $(".allLinks-ul").removeClass('allLinks-view');
            });
        </script>
         <script>
            $('.allLinks').on("click", function(){
                  $(".account-ul").removeClass('view');
                $(".allLinks-ul").addClass('allLinks-view');
            });
        </script>
  </body>
</html>