<?php
$facultyID = $_POST['facultyID'];
$hashPassword = hash('sha256', $facultyID);
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];

require 'dbconfig.php';
if ($facultyID == null || $email == null || $fname == '' || $lname == '' )
{
     header("refresh:2; url=addFaculty.php");
    echo "Admin ID, First Name, Last Name or email was not supplied";
}
else
{
   	$sql1 = "Select * from facultymember where Email ='" . $email . "'";
    $results = $con->query($sql1);
    
    if($results->num_rows > 0)
    {
        //If user name is found an password is correct user is redirected to products page"
       
        header("refresh:2; url=addFaculty.php");
         echo "User Already Exist";
    }
    else
    {
     $sql = "Insert into facultymember(FacultyID, FirstName, LastName, Email) VALUES('".$hashPassword."','".$fname."','".$lname."','".$email."')";
        if($con->query($sql) === TRUE)
     {
        header("refresh:2; url=addFaculty.php");
         echo "Added faculty member";
     }
     else
     {
         echo "Error: " . $sql . "<br>" . $con->error;
     }
 }
}
     $con->close();
?>