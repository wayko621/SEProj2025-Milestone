<?php
	$IDNum = $_POST['idNum'];
	$resourceName = $_POST['resourceName'];
	$classRoomNum = $_POST['classRoomNum'];
	
	require 'dbconfig.php';
	
		$sql ="UPDATE resourcelist SET Available = '0' WHERE resourceID = $IDNum"; 
		if($con->query($sql) === TRUE)
		{
			
			echo("{$IDNum}: {$resourceName} was assigned to room {$classRoomNum}");

		}
		else
		{
			echo("Error Occurred");
		}
	$con->close()
	
?>