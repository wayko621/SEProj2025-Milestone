<?php
	$resourceName = $_POST['resourceName'];
	$classRoomNum = $_POST['classRoomNum'];
	$scheduleID = $_POST['scheduleID'];
	require 'dbconfig.php';
	if($resourceName == '')
	{
		$sql1 ="UPDATE classrooms SET Available = '1' WHERE RoomNum ='" . $classRoomNum . "'"; 
		$sql2 ="UPDATE classroomschedule SET Active = '0' WHERE scheduleID =" . $scheduleID ; 

		if($con->query($sql1) === TRUE)
		{
			
			echo($classRoomNum . " booking was closed \n");

		}
		else
		{
			echo "Error Occurred";
		}
		
		if($con->query($sql2) === TRUE)
		{
			
			echo($scheduleID ." booking was closed \n");

		}
		else
		{
			echo "Error Occurred";
		}
	 $con->close();
	}
	else
	{
	
		$sql3 = "UPDATE resourcelist SET Available = '1' WHERE resourceName ='{$resourceName}'"; 
		$sql4 = "UPDATE classrooms SET Available = '1' WHERE RoomNum ='{$classRoomNum}'"; 
		$sql5 = "UPDATE classroomschedule SET Active = '0' WHERE scheduleID ={$scheduleID}"; 
		if($con->query($sql3) === TRUE)
		{
			
			echo("{$resourceName} was returned from {$classRoomNum} \n");

		}
		else
		{
			echo "Error Occurred";
		}
		
		if($con->query($sql4) === TRUE)
		{
			
			echo($classRoomNum ." booking was closed \n");

		}
		else
		{
			echo "Error Occurred";
		}
		
		if($con->query($sql5) === TRUE)
		{
			
			echo("Booking ID : {$scheduleID} booking was closed");

		}
		else
		{
			echo "Error Occurred";
		}
		
	 $con->close();
	}
	
		
?>