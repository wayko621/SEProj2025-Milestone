<?php
    session_start();


    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']) || !isset($_SESSION['Admin']))
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
       require 'adminTest.html';
        //require 'logout.php';
    }
?>