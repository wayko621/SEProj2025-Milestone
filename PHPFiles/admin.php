<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
    {
        header("location:/SEProj2025-Milestone/adminlogin.html");

    }
    else
    {
        echo "<div style='padding-left: 10px;'>";
        echo "Name: " . htmlspecialchars($_SESSION['adminUN']) . "<br/>";
        echo "Email: " . htmlspecialchars($_SESSION['Email']) . "<br/>";
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
                        <!--<a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>-->
                        <a class="navbar-brand" href="adminResourceList.php">Get Resource List</a>
                        <a class="navbar-brand" href="../addAdmin.html">Add Admin Member</a>
                        <a class="navbar-brand" href="../addFacultyMember.html">Add Faculty Member</a>
                        <!--<a class="navbar-brand" href="getClassrooms.php">Get Classroom List</a>-->
                        
                        
                    </div>
                </div>
            </nav>
           <?php
           echo "Coming soon"

            ?>
            </div>
    </body>
</html>
