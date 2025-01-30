<?php
$adminID = $_POST['adminID'];
$hashPassword = hash('sha256', $adminID);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$tlevel = $_POST['tlevel'];


require 'dbconfig.php';
if ($adminID == null || $email == null || $fname == '' || $lname == '' )
{
    echo "Admin ID, First Name, Last Name or email was not supplied";
}
else
{
   
     $sql = "Insert into adminmember(adminID, FirstName, LastName, Email, TechLevel) VALUES('".$hashPassword."','".$fname."','".$lname."','".$email."','".$tlevel."')";
        if($con->query($sql) === TRUE)
     {
        header("refresh:2; url=/SEProj2025-Milestone/addAdmin.html");
         echo "Added admin user";
     }
     else
     {
         echo "Error: " . $sql . "<br>" . $con->error
     }
 }
     $con->close();
?>