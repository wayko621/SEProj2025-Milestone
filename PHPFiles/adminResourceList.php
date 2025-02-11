<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
    {
        header("location:/SEProj2025/adminlogin.html");    
    }
    else
    {
        echo "<div style='padding-left: 10px;'>";
        echo "Name: " . htmlspecialchars($_SESSION['adminUN']);
        echo "<br /><button class='logout btn btn-primary btn-sm pull-left'>Log Out</button>";
        echo "<script type='text/javascript' src='http://code.jquery.com/jquery-1.7.min.js'></script>";
        echo "<script type='text/javascript' src='../files/js/jquery-ui-1.8.22.custom.min.js'></script>";
        echo "<script>";
        echo "$(document).ready(function()";
        echo "{";
        echo "$('.logout').on('click',function()";
        echo "{";
        echo "$(location).prop('href', 'sessionDestroy.php')";
        echo "});";
        echo "});";
        echo "</script>";
        echo "</div>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resource List</title>
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
                        <a class="navbar-brand" href="../addAdmin.html">Add Admin Member</a>
                        <a class="navbar-brand" href="../addFacultyMember.html">Add Faculty Member</a>
                        <a class="navbar-brand" href="getClassrooms.php">Get Classroom List</a>
                    </div>
                </div>
            </nav>
              <?php
                require 'dbconfig.php';
                $sql2 = "Select * from resourcelist WHERE Available = 1 ORDER BY resourceID";
                $results2 = $con->query($sql2);
                echo "<table class='table table-bordered table-striped'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<th>Resource ID</th>";
                echo "<th>Resource Name</th>";
                echo "<th>Assign to Classroom</th>";
                echo "<th>Update Resource</th>";
                echo "</tr>";
                while($row2 = $results2->fetch_assoc())
                {
                    echo "<tr class='resources'>";
                    echo "<td class='resourceID'>";
                    echo $row2['resourceID'];
                    echo "</td>";
                    echo "<td class='resourceName'>";
                    echo $row2['resourceName'];
                    echo "</td>";
                    echo "<td class='TDClassroom'>";
                    echo "<input type='text' />";
                    echo "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-sm pull-left updateResource' id='" .$row2['resourceID']."'>Assign to room</button>";
                    echo "</td>";
                    echo "</tr>";
                }              
                echo "</tbody>";
                echo "</table>";
                $results2->free();
                $con->close(); 
            ?>
        </div>
         <script>
            $('.updateResource').on('click', function()
            {
                index = $(this).closest('tr').index()-1;
                idNum = $(this).closest('tr').index();
                resourceName =  $(".resourceName:eq(" + index + ")" ).text();
                classRoomNum =$("input:eq("+ index +")").val();
                $.ajax(
                {
                    type:"POST",
                    url: "updateResource.php",
                    data: {idNum: idNum, resourceName: resourceName, classRoomNum: classRoomNum},
                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError) 
                    { 
                        alert(xhr.responseText); 
                    }
                });
            });
        </script>  
    </body>
    </html>