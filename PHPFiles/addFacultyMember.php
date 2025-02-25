<?php
$facultyID = $_POST['facultyID'];
$hashPassword = hash('sha256', $facultyID);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

require 'dbconfig.php';
if ($facultyID == null || $email == null || $fname == '' || $lname == '' )
{
    echo "Admin ID, First Name, Last Name or email was not supplied";
}
else
{
   	
     $sql = "Insert into facultymember(FacultyID, FirstName, LastName, Email) VALUES('".$hashPassword."','".$fname."','".$lname."','".$email."')";
        if($con->query($sql) === TRUE)
     {
        header("refresh:2; url=/SEProj2025-Milestone/addFacultyMember.php");
         echo "Added faculty member";
     }
     else
     {
         echo "Error: " . $sql . "<br>" . $con->error;
     }
 }
     $con->close();
?>