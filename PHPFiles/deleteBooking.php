<?php
    session_start();
    
    $key = array_search($_GET['id'], $_SESSION['bookedRoom']);
    unset($_SESSION['bookedRoom'][$key]);
    
    $_SESSION['qty_array'] = array_values($_SESSION['qty_array']);
    $_SESSION['message'] = "Classroom " . $key . " was removed from the cart";
    header("location:viewBooking.php");
    
?>