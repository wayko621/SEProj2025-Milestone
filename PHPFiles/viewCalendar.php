<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
        //require 'loginfo.php';
        //require 'logout.php';
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
        <link rel="stylesheet" type="text/css" href="../files/css/sidebaradmin.css">
  </head>
  <body>
     <div class="container">
           <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['adminUN']); ?></li>
                        <li class="account-li logout btn btn-danger"><p style="font-size: 18px; margin-top: 10px">Log Out<p></li>
                    </ul>
                    <!-- License: CC Attribution. Made by Ryan Adryawan: https://dribbble.com/ryanawan -->
                    <a class="ticket" href="adminSplash.php"><li><svg fill="#ffffff" width="50px" height="50px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <g data-name="19 costumer service" id="_19_costumer_service">
                    <path d="M37.71,34.54a13.428,13.428,0,0,0,5.51-4.86H46.7a2.915,2.915,0,0,0,2.74-3.06V19.43a3.124,3.124,0,0,0-.2-1.11V18.3a25.246,25.246,0,0,0-5.2-9.54l-.13-.15a15.275,15.275,0,0,0-5.72-3.97,17.135,17.135,0,0,0-14.11.8,15.539,15.539,0,0,0-3.99,3.17l-.13.15a25.246,25.246,0,0,0-5.2,9.54v.02a3.124,3.124,0,0,0-.2,1.11v7.19a2.915,2.915,0,0,0,2.74,3.06h3.48a13.428,13.428,0,0,0,5.51,4.86,20.226,20.226,0,0,0-15.02,19.5V59.5a1,1,0,0,0,1,1H51.73a1,1,0,0,0,1-1V54.04A20.226,20.226,0,0,0,37.71,34.54Zm9.73-15.11v7.19c0,.56-.35,1.06-.74,1.06H44.29c.17-.42.33-.85.46-1.29,0-.01,0-.01.01-.02a13.235,13.235,0,0,0-.1-8H46.7C47.09,18.37,47.44,18.87,47.44,19.43ZM17.3,27.68c-.39,0-.74-.5-.74-1.06V19.43c0-.56.35-1.06.74-1.06h2.04a13.261,13.261,0,0,0,.37,9.31Zm.26-11.31a22.694,22.694,0,0,1,3.89-6.28l.12-.13A13.124,13.124,0,0,1,25.05,7.2a15.268,15.268,0,0,1,12.41-.7,13.159,13.159,0,0,1,4.97,3.46l.12.13a22.694,22.694,0,0,1,3.89,6.28H43.82a13.311,13.311,0,0,0-23.64,0Zm3.11,6.14A11.33,11.33,0,1,1,43.05,25H39.71a2.991,2.991,0,0,0-2.82-2h-3a3,3,0,0,0,0,6h3a2.991,2.991,0,0,0,2.82-2H42.4a11.329,11.329,0,0,1-21.73-4.49Zm17.22,3.48v.02a.994.994,0,0,1-1,.99h-3a1,1,0,0,1,0-2h3A.994.994,0,0,1,37.89,25.99ZM50.73,58.5H13.27V54.04a18.228,18.228,0,0,1,18.2-18.2h1.06a18.228,18.228,0,0,1,18.2,18.2Z"/>
                    </g>
                    </svg><br><span><?php echo $_SESSION['adminUN']?>'s Page</span></li></a>
                  <!-- License: CC Attribution. Made by Ryan Adryawan: https://dribbble.com/ryanawan -->
                    <a class="ticket" href="admin.php"><li><svg fill="#ffffff" width="50px" height="50px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <g data-name="19 costumer service" id="_19_costumer_service">
                    <path d="M37.71,34.54a13.428,13.428,0,0,0,5.51-4.86H46.7a2.915,2.915,0,0,0,2.74-3.06V19.43a3.124,3.124,0,0,0-.2-1.11V18.3a25.246,25.246,0,0,0-5.2-9.54l-.13-.15a15.275,15.275,0,0,0-5.72-3.97,17.135,17.135,0,0,0-14.11.8,15.539,15.539,0,0,0-3.99,3.17l-.13.15a25.246,25.246,0,0,0-5.2,9.54v.02a3.124,3.124,0,0,0-.2,1.11v7.19a2.915,2.915,0,0,0,2.74,3.06h3.48a13.428,13.428,0,0,0,5.51,4.86,20.226,20.226,0,0,0-15.02,19.5V59.5a1,1,0,0,0,1,1H51.73a1,1,0,0,0,1-1V54.04A20.226,20.226,0,0,0,37.71,34.54Zm9.73-15.11v7.19c0,.56-.35,1.06-.74,1.06H44.29c.17-.42.33-.85.46-1.29,0-.01,0-.01.01-.02a13.235,13.235,0,0,0-.1-8H46.7C47.09,18.37,47.44,18.87,47.44,19.43ZM17.3,27.68c-.39,0-.74-.5-.74-1.06V19.43c0-.56.35-1.06.74-1.06h2.04a13.261,13.261,0,0,0,.37,9.31Zm.26-11.31a22.694,22.694,0,0,1,3.89-6.28l.12-.13A13.124,13.124,0,0,1,25.05,7.2a15.268,15.268,0,0,1,12.41-.7,13.159,13.159,0,0,1,4.97,3.46l.12.13a22.694,22.694,0,0,1,3.89,6.28H43.82a13.311,13.311,0,0,0-23.64,0Zm3.11,6.14A11.33,11.33,0,1,1,43.05,25H39.71a2.991,2.991,0,0,0-2.82-2h-3a3,3,0,0,0,0,6h3a2.991,2.991,0,0,0,2.82-2H42.4a11.329,11.329,0,0,1-21.73-4.49Zm17.22,3.48v.02a.994.994,0,0,1-1,.99h-3a1,1,0,0,1,0-2h3A.994.994,0,0,1,37.89,25.99ZM50.73,58.5H13.27V54.04a18.228,18.228,0,0,1,18.2-18.2h1.06a18.228,18.228,0,0,1,18.2,18.2Z"/>
                    </g>
                    </svg><br><span><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</span></li></a>
                     <a class="reserve" href="addAdminFaculty.php"><li class="reserveli"><img src="../files/images/addmember.svg" class="calendaricon"/><br><span>Add New Admin/Faculty Member</span></li></a>
                    <a class="reserve" href="returnResource.php"><li class="reserveli"><img src="../files/images/switch-icon.svg" class="calendaricon"/><br><span>Return Resources</span></li></a>
                </ul>
            </div>
       <!--<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                         <a class="navbar-brand" href="adminSplash.php"><?php echo $_SESSION['adminUN']?>'s Page</a> 
                         <a class="navbar-brand" href="admin.php"><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get All Tickets</a>
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="addResources.php">Add Resources</a>
                        <a class="navbar-brand" href="returnResource.php">Return Resources</a>
                    </div>
                </div>
            </nav>-->
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