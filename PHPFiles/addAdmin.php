<?php
session_start();
    
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
        require 'loginfo.php';
        require 'logout.php';
    }
?>

<!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
  </head>
  <body>
     <div class="container">
       <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="admin.php">Admin Page</a>
                        <a class="navbar-brand" href="">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="">Get Resource List</a>
                        <a class="navbar-brand" href="addFaculty.php">Add Faculty Member</a>
                        <a class="navbar-brand" href="">Get Classroom List</a>
                    </div>
                </div>
            </nav>
    <form action="PHPFiles/addAdminUser.php" method="POST" class="row g-3 form-top center-margin" >
      <div class="form-group">
      <label for="adminID">AdminID:</label> <input type="text" name="adminID" id="adminID">
      </div>
      <div class="form-group">
      <label for="fname">First Name:</label> <input type="text" name="fname" id="fname" ></div>
      <div class="form-group">
      <label for="lname">Last Name:</label> <input type="text" name="lname" id="lname" ></div>
      <div class="form-group">
      <label for="email">Email:</label> <input type="text" name="email" id="email" ></div>
      <div class="form-group">
      <label for="tlevel">Tech Level:</label><input type="text" name="tlevel" id="tlevel" >
      </div> 
      <div class="form-group">          
      <button class="btn btn-primary" id="sendrequest">Add Admin</button>
      </div>
    </form>
  </div>
  </body>
</html>