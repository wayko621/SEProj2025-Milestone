<?php
session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");
    }
    else
    {

    $resourceName = $_POST['resourceName'];
        echo($resourceName);
    }

    

?>