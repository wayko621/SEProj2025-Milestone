<?php
    session_start();
    //Database Connection//
    require 'dbconfig.php';
    
    //Passed Variables
    $email = trim($_POST['adminEmail']);
    $password = trim($_POST['adminPW']);
    $hashPassword = hash('sha256', $password);
   
$sql ="Select * from adminmember where Email ='{$email}' and AdminID = '{$hashPassword}'";

$results = $con->query($sql);

if($results->num_rows > 0)
{
    while($row = $results->fetch_assoc())
    {
        $_SESSION['loggedin'] = time();
        $_SESSION['adminUN'] = $row['FirstName'];
        $_SESSION['TechLevel'] =  $row['TechLevel'];
        $_SESSION['Admin'] = $password;
        $_SESSION['Email'] = $row['Email'];
        header("refresh:2; url=adminSplash.php");
        echo "Connected successfully<br />User login successful redirecting to admin page <br />";
    }
    }
    else
    {
        header("refresh:2; url=/adminlogin.html");
        echo "User not found or password incorrect";
    }
    $results->free();
    $con->close();
?>