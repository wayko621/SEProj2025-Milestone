<?php
    session_start();
    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']) || !isset($_SESSION['Admin']))
    {
        header("location:/");
    }
    else
    {
        require 'adminSplash.html';
    }
?>
