<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
       // require 'loginfo.php';
       // require 'logout.php';
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <script type='text/javascript' src='https://code.jquery.com/jquery-1.7.min.js'></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../files/css/main-form-style.css">
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style2.css">
    <link rel="stylesheet" type="text/css" href="../files/css/adminfac.css">  
    <link rel="stylesheet" type="text/css" href="../files/css/sidebar-main.css">
        <link rel="stylesheet" type="text/css" href="../files/css/sidebar.css">

  </head>
  <body>
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
                     <a class="reserve" href="TroubleTicket.php"><li class="reserveli"><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span>All Tickets</span></li></a>
                     <a class="reserve" href="viewCalendar.php"><li class="reserveli"><img src="../files/images/calendar-icon.svg" class="calendaricon"/><br><span>View Calendar</span></li></a>
                     <a class="reserve" href="addAdminFaculty.php"><li class="reserveli"><img src="../files/images/addmember.svg" class="calendaricon"/><br><span>Add New Admin/Faculty Member</span></li></a>
                    <a class="reserve" href="returnResource.php"><li class="reserveli"><img src="../files/images/switch-icon.svg" class="calendaricon"/><br><span>Return Resources</span></li></a>
                </ul>
            </div>
    <div class="card">
      <input type="checkbox" id="switch" aria-hidden="true" name=""/>
      <div class="content">
        
          <div class="front">
            <div class="inner">
              <form action="addAdminUser.php" method="POST" class="row g-3 form-top center-margin" >
                <label for="adminID" class="IDlabel">AdminID:</label> 
                <input type="text" name="adminID" id="adminID" autocomplete="off" required =""/><br/>
                <label for="fname" class="fnlabel">First Name:</label>
                <input type="text" name="fname" id="fname" autocomplete="off" required =""/><br/>
                <label for="lname" class="lnlabel">Last Name:</label> 
                <input type="text" name="lname" id="lname" autocomplete="off" required =""/><br/>
                <label for="email" class="emaillabel2">Email:</label> 
                <input type="email" name="email" id="email" autocomplete="off" required =""/><br/>
                <label for="tlevel" class="tllabel">Tech Level:</label>
                <input type="text" name="tlevel" id="tlevel" autocomplete="off" required =""/>
                <div class="addButton">          
                  <button class="btn" id="sendrequest">Add Admin</button>
                </div>
                <div class="switchback">
                  <label for="switch" aria-hidden="true" class="switchspan"><span>Switch to Faculty Member</span></label>
                </div>
              </form>
            </div>
          </div> 
          <div class="back">
            <div class="inner">
              <form action="addFacultyMember.php" method="POST" class="row g-3 form-top center-margin" >
                <label for="facultyID" class="IDlabel">FacultyID:</label> 
                <input type="text" name="facultyID" id="facultyID" autocomplete="off" required =""/><br/>
                <label for="fname" class="fnlabel">First Name:</label> 
                <input type="text" name="fname" id="fname" autocomplete="off" required =""/><br/>
                <label for="lname" class="lnlabel">Last Name:</label> 
                <input type="text" name="lname" id="lname" autocomplete="off" required =""/><br/>
                <label for="email" class="emaillabel2">Email:</label> 
                <input type="email" name="email" id="email" autocomplete="off" required =""/>
                <div class="addButton">
                  <button class="btn" id="sendrequest">Add Faculty Member</button>
                </div>
                <br/>
                <div class="switchback">
                  <label for="switch" aria-hidden="true" class="switchspan"><span>Switch to Admin Member</span></label>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
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
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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