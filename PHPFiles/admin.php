<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
    {
        header("location:/SEProj2025-Milestone/adminlogin.html");

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
        echo " </script>";
        echo "</div>";
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
                        <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="adminResourceList.php">Get Resource List</a>
                        <a class="navbar-brand" href="../addAdmin.html">Add Admin Member</a>
                        <a class="navbar-brand" href="../addFacultyMember.html">Add Faculty Member</a>
                        
                    </div>
                </div>
            </nav>
           <?php
           echo "Coming soon"

            ?>
            </div>
    </body>
</html>
