<?php
    session_start();
    //Database Connection//
    require 'dbconfig.php';
    
    //Passed Variables
    $user = trim($_POST['adminUN']);
    $password = trim($_POST['adminPW']);
    $hashPassword = hash('sha256', $password);
   
$sql ="Select * from adminmember where FirstName ='" .$user. "' and AdminID = '" . $hashPassword . "'";

$results = $con->query($sql);

if($results->num_rows > 0)
{
    while($row = $results->fetch_assoc())
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['adminUN'] = $user;
        $_SESSION['TechLevel'] =  $row['TechLevel'];
        $_SESSION['Admin'] = $password;
        header("refresh:2; url=admin.php");
        echo "Connected successfully<br />User login successful redirecting to admin page <br />";
    }
    }
    else
    {
        header("refresh:2; url=/SEProj2025-Milestone/adminlogin.html");
        echo "User not found or password incorrect";
    }
    $results->free();
    $con->close();
?>