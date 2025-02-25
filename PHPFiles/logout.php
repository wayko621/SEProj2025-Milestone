<?php
session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
        echo "<br /><button class='logout  btn-primary btn-sm pull-left'>Log Out</button>";
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
        echo "</div>";
    }
?>