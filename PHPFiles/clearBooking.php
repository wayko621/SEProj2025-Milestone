<?php
    session_start();
    unset($_SESSION['bookedRoom']);
    $_SESSION['message'] = "Classroom booking clearing was successful!";
    header('location: scheduleClassroom.php');
    ?>