<?php
$name = $_POST['name'];
$problem = $_POST['problem'];
$timedate = $_POST['timedate'];
$email = $_POST['email'];
$facName = $_POST['requestor'];
$roomNum = $_POST['room'];

require 'dbconfig.php';
if ($name == null || $email == null || $name == '' || $email == '')
{
    echo "Name or email was not supplied";
}
else
{
   foreach ($name as $key => $valname) 
   {
   	
     $sql = "Insert into incidentreport(classRoomID, facultyMember, facEmail, deviceName, Problem, TimeDate, AssignedTech, Status) VALUES('".$roomNum."','".$facName."','".$email."','". $valname."','".$problem[$key]."','".$timedate[$key]."', 0, 'New')";
        if($con->query($sql) === TRUE)
     {
        
         echo "Ticket Created";
     }
     else
     {
         echo "Error: " . $sql . "<br>" . $con->error;
     }
 	}
 }
     $con->close();
?>
