<?php
    session_start();
    
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
    {
        header("location:/SEProj2025-Milestone/faclogin.html");
        
    }
    else
    {
        echo "<div style='padding-left: 10px;'>";
        echo "Name: " . htmlspecialchars($_SESSION['facUN']) . "<br/>";
        echo "Email: " . htmlspecialchars($_SESSION['facEmail']);
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
            .product_image
            {
                height:200px;
            }
            .product_name
            {
                height:80px;
                padding-left:20px;
                padding-right:20px;
            }
            .product_footer
            {
                padding-left:20px;
                padding-right:20px;
                padding-bottom:25px;
            }

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
                         <a class="navbar-brand" href="">Create Trouble Tickets</a>
                        <a class="navbar-brand" href="">Book a ClassRoom</a>
                        <a class="navbar-brand" href="">Access Camera</a>
                    </div>
                </div>
            </nav>
            <div>
                <h2>Tickets</h2>
                <p>Coming Soon</p>
            </div>
            <div>
                <h2>My Booked Classrooms</h2>
                <p>Coming Soon</p>
            </div>
    </div>
    </div>
    </body>
    </html>
