<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['adminUN']))
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
                        <a class="navbar-brand" href="">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="">Get Resource List</a>
                        <a class="navbar-brand" href="../addAdmin.php">Add Admin Member</a>
                        <a class="navbar-brand" href="../addFacultyMember.php">Add Faculty Member</a>
                        <a class="navbar-brand" href="">Get Classroom List</a>
                        
                        
                    </div>
                </div>
            </nav>
            <div>
                <h2>Tickets</h2>
                <p>Coming Soon</p>
            </div>
        </div>
    </body>
</html>
