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
    <title>Admin Portal</title>
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
                        <a class="navbar-brand" href="admin.php">My Tickets</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="adminResourceList.php">Get Resource List</a>
                        <a class="navbar-brand" href="addAdmin.php">Add Admin Member</a>
                        <a class="navbar-brand" href="addFaculty.php">Add Faculty Member</a>
                        <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
                    </div>
                </div>
            </nav>

<?php

	require 'dbconfig.php';
	$sql ="Select * from classrooms where available = 1";

	$results = $con->query($sql);
echo "<table class='table table-bordered table-striped'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th>Building</th>";
                echo "<th>Classroom</th>";
                echo "</tr>";
if($results->num_rows > 0)
{
    while($row2 = $results->fetch_assoc())
    {
      echo "<tr class='classroom'>";
                    echo "<td class='ticketID'>";
                    echo $row2['Building'];
                    echo "</td>";
                    echo "<td>";
                    echo $row2['RoomNum'];
                    echo "</td>";
                    echo"</tr>" ; 
        
    }
    }
    else
    {
        header("refresh:2; url=/SEProj2025-Milestone/adminlogin.html");
        echo "User not found or password incorrect";
    }
    echo "</tbody>";
    echo "</table>";      
    $results->free();
    $con->close();
?>

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