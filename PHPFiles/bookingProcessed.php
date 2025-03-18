<?php
session_start();

require 'dbconfig.php';


$sql2 = "Select * from classroomschedule ORDER BY scheduleID DESC LIMIT 1";

$resultOrder = $con->query($sql2);

if($resultOrder->num_rows > 0)
{
    while($row = $resultOrder->fetch_assoc())
    {
        $bookingNum = $row['scheduleID'];
        echo $bookingNum;
    }
}
else
{

    $bookingNum = 1;
}

$resultOrder->free();
$con->close();
unset($_SESSION['bookedRoom']);
echo "<link rel='stylesheet' type='text/css' href='files/css/bootstrap.min.css'>";
echo "<script type='text/javascript' src='https://code.jquery.com/jquery-3.7.0.js'></script>";
echo "<div>Thank you " . htmlspecialchars($_SESSION['facUN']) . " for your booking the classroom </div>";
echo "<script>setTimeout(function(){ window.location.href = 'scheduleClassroom.php';},5000);</script>";
?>