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
        echo "Email: " . htmlspecialchars($_SESSION['facEmail']) . "<br/>";
        echo "<button class='logout btn btn-primary btn-sm pull-left'>Log Out</button>";
        echo "</div>"; 
        echo "<script type='text/javascript' src='https://code.jquery.com/jquery-1.7.min.js'></script>";
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
                        <a class="navbar-brand" href="#">HOME</a>
                       <!--  <a class="navbar-brand" href="#">Create Trouble Tickets </a>
                        <a class="navbar-brand" href="#">Get Resource List</a>
                        <a class="navbar-brand" href="#">Book a ClassRoom</a> -->
                    </div>
                </div>
            </nav>
    </div>
    </div>
    </body>
    </html>
