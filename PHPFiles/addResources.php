<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/");

    }
    else
    {
        require 'addResources.html';
    }
?>

