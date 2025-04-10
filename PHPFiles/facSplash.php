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
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="faculty.php">My Tickets and Bookings</a>
                        <a class="navbar-brand" href="classroom.php">Create Trouble Tickets</a>
                        <a class="navbar-brand" href="scheduleClassroom.php">Book a Classroom</a>
                        <a class="navbar-brand" href="../connectCamera.html">Access Camera</a>
                        <!--<ul class="nav navbar-nav">
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo htmlspecialchars($_SESSION['facUN']); ?><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                           <p class='logout center-block bg-danger'>Log Out</p>
                          </ul>
                        </li>
                    </ul>-->
                    </div>
                </div>
            </nav>
            <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['facUN']); ?></li>
                        <li class="account-li logout btn btn-danger">Log Out</li>
                        <hr></hr>
                    </ul>
                    <li class="allLinks">Links</li>
                    <ul class="allLinks-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="allLinks-li"><a class="navbar-brand" href="faculty.php">My Tickets and Bookings</a></li>
                        <li class="allLinks-li"><a class="navbar-brand" href="classroom.php">Create Trouble Tickets</a></li>
                        <li class="allLinks-li"> <a class="navbar-brand" href="scheduleClassroom.php">Book a Classroom</a></li>
                    </ul>
                    <a class="camera" href="../connectCamera.html"><li class="glyphicon glyphicon-camera camerali">
                    <br>
                    <span>Access Camera</span></li></a>
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
            });
        </script>
         <script>
            $('.viewButton').on("click", function(){

                $(".account-ul").removeClass('view');
            });
        </script>
         <script>
            $('.allLinks').on("click", function(){

                $(".allLinks-ul").addClass('allLinks-view');
            });
        </script>

    </body>
    </html>
