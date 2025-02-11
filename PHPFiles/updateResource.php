<?php
	$IDNum = $_POST['idNum'];
	$resourceName = $_POST['resourceName'];
	$classRoomNum = $_POST['classRoomNum'];
	/*require 'dbconfig.php';
	if (!isset($Problem) || $Problem == '')
	{
		echo "Reported Issue Section is blank.Ensure you pressed enter after inserting new data before pressing Update Ticket";
	}
	else
	{
		$sql ="Update incidentreport SET Problem = '". $Problem  ."' Where incidentID = $IDNum";
		if($con->query($sql) === TRUE)
		{
			echo "Successful Update";
		}
		else
		{
			echo "Error: " . $con->error;
		}
	}
	$con->close()*/
	echo($IDNum . ' - ' . $resourceName . ' - ' . $classRoomNum);
?>