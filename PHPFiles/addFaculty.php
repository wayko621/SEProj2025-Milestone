<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
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
    <link rel="stylesheet" type="text/css" href="../files/css/main-form-style.css">
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">   
    <style>
            .container
            {
                margin-top: 35px;
            }
        </style>
  </head>
  <body>
    <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <div class="navbar-header"> 
              <a class="navbar-brand" href="admin.php">Admin Page</a>
              <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
              <a class="navbar-brand" href="addAdmin.php">Add Admin Member</a>
              <a class="navbar-brand" href="getClassroomResource.php">Classroom Resource</a>
              <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
          </div>
      </div>
    </nav>
    <form action="addFacultyMember.php" method="POST" class="row g-3 form-top center-margin" >
      <div class="form-group">
        <label for="facultyID" class="IDlabel">FacultyID:</label> 
        <input type="text" name="facultyID" id="facultyID" autocomplete="off" required =""/>
        <label for="fname" class="fnlabel">First Name:</label> 
        <input type="text" name="fname" id="fname" autocomplete="off" required =""/>
        <label for="lname" class="lnlabel">Last Name:</label> 
        <input type="text" name="lname" id="lname" autocomplete="off" required =""/>
        <label for="email" class="emaillabel2">Email:</label> 
        <input type="email" name="email" id="email" autocomplete="off" required =""/>
        <div>
          <button class="btn btn-primary btn-faculty" id="sendrequest">Add Faculty Member</button>
        </div>
      </div>
    </form>
  </div>
  </body>
</html>