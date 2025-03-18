<?php
    session_start();
    
    if(!in_array($_GET['id'], $_SESSION['bookedRoom']))
    {
        array_push($_SESSION['bookedRoom'], $_GET['id']);
        $_SESSION['message'] = "Added Room to checkout";
    }
    else
    {
        $_SESSION['message'] = "Room Already Booked";
    }
    header('location:scheduleClassroom.php');
    
?>