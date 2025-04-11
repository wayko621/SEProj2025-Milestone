<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN']))
    {
        header("location:/SEProj2025-Milestone/");
        
    }
    else
    {
       // require 'facLoginfo.php';
       // require 'logout.php';

    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Faculty Portal</title>
        <script type='text/javascript' src='https://code.jquery.com/jquery-1.7.min.js'></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
        <style>
            .container
            {
                margin-top: 35px;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="../files/css/sidebar.css">
    </head>
    <body>
        <div class="container">
            <!--<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="faculty.php">My Tickets and Bookings</a>
                        <a class="navbar-brand" href="classroom.php">Create Trouble Tickets</a>
                        <a class="navbar-brand" href="scheduleClassroom.php">Book a Classroom</a>
                        <a class="navbar-brand" href="../connectCamera.html">Access Camera</a>
                        <ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($_SESSION['facUN']); ?><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                           <p class='logout center-block bg-danger'>Log Out</p>
                          </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>-->
            <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['facUN']); ?></li>
                        <li class="account-li logout btn btn-danger"><p style="font-size: 18px; margin-top: 10px">Log Out<p></li>
                    </ul>
                    <a class="" href="faculty.php"><li class="">My Tickets and Bookings</li></a>
                    <!--<ul class="allLinks-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <a class="allLinks-li" href="faculty.php"></a>
                        <a class="allLinks-li" href="classroom.php">Create Trouble Tickets</a>
                    </ul>-->
                    <a class="camera" href="../connectCamera.html"><li class="glyphicon glyphicon-camera camerali">
                    <br>
                    <span>Access Camera</span></li></a>
                     <a class="reserve" href="scheduleClassroom.php"><li class="reserveli"><img src="../files/images/reserve-class.svg" class="reserveicon"/><span>Reserve Classroom</span></li></a>
                     <!-- License: CC Attribution. Made by Ryan Adryawan: https://dribbble.com/ryanawan -->
                    <a class="ticket" href="classroom.php"><li><svg fill="#ffffff" width="75px" height="75px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <g data-name="19 costumer service" id="_19_costumer_service">
                    <path d="M37.71,34.54a13.428,13.428,0,0,0,5.51-4.86H46.7a2.915,2.915,0,0,0,2.74-3.06V19.43a3.124,3.124,0,0,0-.2-1.11V18.3a25.246,25.246,0,0,0-5.2-9.54l-.13-.15a15.275,15.275,0,0,0-5.72-3.97,17.135,17.135,0,0,0-14.11.8,15.539,15.539,0,0,0-3.99,3.17l-.13.15a25.246,25.246,0,0,0-5.2,9.54v.02a3.124,3.124,0,0,0-.2,1.11v7.19a2.915,2.915,0,0,0,2.74,3.06h3.48a13.428,13.428,0,0,0,5.51,4.86,20.226,20.226,0,0,0-15.02,19.5V59.5a1,1,0,0,0,1,1H51.73a1,1,0,0,0,1-1V54.04A20.226,20.226,0,0,0,37.71,34.54Zm9.73-15.11v7.19c0,.56-.35,1.06-.74,1.06H44.29c.17-.42.33-.85.46-1.29,0-.01,0-.01.01-.02a13.235,13.235,0,0,0-.1-8H46.7C47.09,18.37,47.44,18.87,47.44,19.43ZM17.3,27.68c-.39,0-.74-.5-.74-1.06V19.43c0-.56.35-1.06.74-1.06h2.04a13.261,13.261,0,0,0,.37,9.31Zm.26-11.31a22.694,22.694,0,0,1,3.89-6.28l.12-.13A13.124,13.124,0,0,1,25.05,7.2a15.268,15.268,0,0,1,12.41-.7,13.159,13.159,0,0,1,4.97,3.46l.12.13a22.694,22.694,0,0,1,3.89,6.28H43.82a13.311,13.311,0,0,0-23.64,0Zm3.11,6.14A11.33,11.33,0,1,1,43.05,25H39.71a2.991,2.991,0,0,0-2.82-2h-3a3,3,0,0,0,0,6h3a2.991,2.991,0,0,0,2.82-2H42.4a11.329,11.329,0,0,1-21.73-4.49Zm17.22,3.48v.02a.994.994,0,0,1-1,.99h-3a1,1,0,0,1,0-2h3A.994.994,0,0,1,37.89,25.99ZM50.73,58.5H13.27V54.04a18.228,18.228,0,0,1,18.2-18.2h1.06a18.228,18.228,0,0,1,18.2,18.2Z"/>
                    </g>
                    </svg><br>Create Ticket</li></a>
                </ul>
            </div>

            <div class="welcome">
                <p class="facname"><h2>Welcome Back <?php echo htmlspecialchars($_SESSION['facUN']) ?></h2></p>
            </div>
            <div class='tickets'>
                <p class='lastthree'><h3>Here are your last five active tickets</h3></p>
                </div>

             <?php
             if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN'])|| !isset($_SESSION['facEmail']))
    {
        header("location:/SEProj2025-Milestone/");
        
    }
    else
    {
                require 'dbconfig.php';
                $sql2 = "SELECT * FROM (Select * from incidentreport WHERE facEmail = '{$_SESSION['facEmail']}' AND Status != 'Completed'  ORDER BY incidentID DESC LIMIT 5) as r ORDER BY incidentID";
                $results2 = $con->query($sql2);
                echo "<table class='table table-bordered table-striped'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th>Ticket ID</th>";
                echo "<th>Date/Time</th>";
                echo "<th>Room Number</th>";
                echo "<th>Device Name</th>";
                echo "<th>Issue Reported</th>";
                echo "<th>Assigned Tech</th>";
                echo "<th>Current Status</th>";
                echo "</tr>";

                while($row2 = $results2->fetch_assoc())
                {
                    if($row2['AssignedTech'] != 0)
                {
                    $hashPassword = hash('sha256', $row2['AssignedTech']);
                    $sql = "Select * from adminmember where AdminID = '" .$hashPassword."'";
                    $results = $con->query($sql);
                    $row3 = $results->fetch_assoc();
                    echo "<tr class='tickets'>";
                    echo "<td class='ticketID'>";
                    echo $row2['incidentID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['TimeDate'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['classRoomID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['deviceName'];
                    echo "</td>";
                    echo "<td class='TDProblem'>";
                    echo $row2['Problem'];
                    echo "</td>";
                    echo "<td>";
                    echo  $row3['FirstName'];
                    echo "</td>";
                    echo "<td class='ticketStatus'>";
                    echo  $row2['Status'];
                    echo "</td>";
                    echo "</tr>";
                }
                else
                {
                  echo "<tr class='tickets'>";
                    echo "<td class='ticketID'>";
                    echo $row2['incidentID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['TimeDate'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['classRoomID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['deviceName'];
                    echo "</td>";
                    echo "<td class='TDProblem'>";
                    echo $row2['Problem'];
                    echo "</td>";
                    echo "<td>";
                    echo  "Tech Not Assigned";
                    echo "</td>";
                    echo "<td class='ticketStatus'>";
                    echo  $row2['Status'];
                    echo "</tr>";  
                }
                }                             
                echo "</tbody>";
                echo "</table>";
               } 
            ?> 
            <div>
            <h2> Last Three Active Booked Classrooms</h2>
             <?php
             if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN']) || !isset($_SESSION['facEmail']))
    {
        header("location:/SEProj2025-Milestone/");
        
    }
    else
    {
                $sql3 = "SELECT * FROM (Select * from classroomschedule WHERE facultyMember = '{$_SESSION['facUN']}' AND Active=1 ORDER by scheduleID desc LIMIT 3) as r ORDER BY scheduleID";
                $results3 = $con->query($sql3);
                echo "<table class='table table-bordered table-striped'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th>Classroom</th>";
                echo "<th>Schedule Date</th>";
                echo "<th>Resources</th>";
                echo "</tr>";
                
                while($row3 = $results3->fetch_assoc())
                {
                    if($row3['resourceID'] != 0)
                    { 
                        $sql2 = "Select * from resourcelist where resourceID ={$row3['resourceID']}";
                        $results2 = $con->query($sql2);
                        $row2 = $results2->fetch_assoc();
                        echo "<tr class='classroomSchedule'>";
                        echo "<td class='classroomID'>";
                        echo $row3['classRoomNum'];
                        echo "</td>";
                        echo "<td>";
                        echo $row3['scheduleDate'];
                        echo "</td>";
                        echo "<td>";
                        echo $row2['resourceName'];
                        echo "</td>";
                        echo "</tr>";
                    }
                    else
                    {
                        echo "<tr class='classroomSchedule'>";
                        echo "<td class='classroomID'>";
                        echo $row3['classRoomNum'];
                        echo "</td>";
                        echo "<td>";
                        echo $row3['scheduleDate'];
                        echo "</td>";
                        echo "<td>";
                        echo "None Requested/Available";
                        echo "</td>";
                        echo "</tr>";
                    }
                }             
                echo "</tbody>";
                echo "</table>";
                }
                $results3->free();
                $results2->free();
                $con->close();  
                ?>
            </div>
        </div>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
