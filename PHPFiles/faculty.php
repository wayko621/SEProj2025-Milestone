<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN']))
    {
        header("location:/");
        
    }
    else
    {
        require 'faculty.html';
       

    }

?>
