<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['adminUN']))
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
        <meta charset="utf-8">
        <title>Faculty Portal</title>
        <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
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
                        <a class="navbar-brand" href="adminSplash.php"><?php echo $_SESSION['adminUN']?>'s Page</a> 
                        <a class="navbar-brand" href="admin.php"><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get All Tickets</a>
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
                        <a class="navbar-brand" href="addResources.php">Add Resources</a>
                        
                    </div>
                </div>
            </nav>
            <div>
            <h2>Expired Bookings</h2>
             <?php
             require 'dbconfig.php';
                $sql3 = "Select * from classroomschedule WHERE DATEDIFF(NOW(), scheduleDate) >= 1 AND Active = 1";
                $results3 = $con->query($sql3);
                echo "<table class='table table-bordered table-striped'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th>Classroom</th>";
                echo "<th>Schedule Date</th>";
                echo "<th>Resources</th>";
                echo "<th>Return Classroom and Resource</th>";
                echo "</tr>";
                
                while($row3 = $results3->fetch_assoc())
                {
                    if($row3['resourceID'] != 0)
                    { 
                        $sql2 = "Select * from resourcelist where resourceID =" .$row3['resourceID'];
                        $results2 = $con->query($sql2);
                        $row2 = $results2->fetch_assoc();
                        echo "<tr class='classroomSchedule'>";
                        echo "<td class='classroomID'>";
                        echo $row3['classRoomNum'];
                        echo "</td>";
                        echo "<td>";
                        echo $row3['scheduleDate'];
                        echo "</td>";
                        echo "<td class='resource'>";
                        echo $row2['resourceName'];
                        echo "</td>";
                        echo "<td>";
                        echo "<button class='btn btn-primary btn-sm pull-left updateClassroomResource' id='" .$row3['scheduleID']."'>Close Expired Booking</button>";
                        echo "</td>";
                        echo "<td class='scheduleID' style='display:none;'>";
                        echo $row3['scheduleID'];
                        echo "</td>";
                         echo "<td style='display:none;'>";
                        echo " <div id='homecon' style='display:none;'><img src='../files/images/gear2.gif' /></div>";
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
                        echo "<td>";
                        echo "<button class='btn btn-primary btn-sm pull-left updateClassroomResource' id='" .$row3['scheduleID']."'>Close Expired Booking</button>";
                        echo "</td>";
                        echo "<td class='scheduleID' style='display:none;'>";
                        echo $row3['scheduleID'];
                        echo "</td>";
                        echo "<td style='display:none;'>";
                        echo " <div id='homecon' style='display:none;'><img src='../files/images/gear2.gif' /></div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } 
                             
                echo "</tbody>";
                echo "</table>";
                
                $results3->free();
                //$results2->free();
                $con->close(); 
            ?>
            </div>
        </div>
        <script>
            $('.updateClassroomResource').on('click', function()
            {
                index = $(this).closest('tr').index() - 1;
                classRoomNum = $(".classRoomID:eq(" + index + ")" ).text();
                resourceName = $(".resource:eq(" + index + ")" ).text();
                scheduleID = $(".scheduleID:eq(" + index + ")" ).text();
               $.ajax(
                {
                    type:"POST",
                    url: "updateClassroomResource.php",
                    data: {classRoomNum: classRoomNum, resourceName: resourceName, scheduleID: scheduleID},
                     beforeSend: function(){
                         $("#homecon").show();
                         
                         $("#homecon").dialog({
                                closeText: ""
                            });
                    },
                    success: function(response)
                    {
                        
                    },
                    error: function(response) 
                    { 
                        alert(response.responseText); 
                    }
                });
                

                $(document).ajaxStop(function()
                    {
                        window.location.reload();
                    });
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
