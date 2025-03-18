<?php
    session_start();
    //Database Connection//
    require 'dbconfig.php';
    
     //Passed Variables
    $email = trim($_POST['facEmail']);
    $password = trim($_POST['facPW']);
    $hashPassword = hash('sha256', $password);
    
$sql ="Select * from facultymember where Email ='" .$email. "' and FacultyID = '" . $hashPassword . "'";

$results = $con->query($sql);

if($results->num_rows > 0)
{
    while($row = $results->fetch_assoc())
    {
        header("refresh:2; url=faculty.php");
        echo "Connected successfully<br />User login successful redirecting to faculty page";
        $_SESSION['loggedin'] = time();
        $_SESSION['facUN'] = $row['FirstName'];
        $_SESSION['facEmail'] = $row['Email'];
    }
    }
    else
    {
        header("refresh:2; url=/SEProj2025/");
        echo "User not found or password incorrect";
    }
    $results->free();
    $con->close();
?>