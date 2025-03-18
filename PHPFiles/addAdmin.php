<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025/");

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
                        <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="addFaculty.php">Add Faculty Member</a>
                        <a class="navbar-brand" href="getClassroomResource.php">Classroom Resource</a>
                    </div>
                </div>
            </nav>
    <form action="addAdminUser.php" method="POST" class="row g-3 form-top center-margin" >
      <div class="form-group">
          <label for="adminID" class="IDlabel">AdminID:</label> 
          <input type="text" name="adminID" id="adminID">
          <label for="fname" class="fnlabel">First Name:</label>
          <input type="text" name="fname" id="fname" >
          <label for="lname" class="lnlabel">Last Name:</label> 
          <input type="text" name="lname" id="lname" >
          <label for="email" class="emaillabel2">Email:</label> 
          <input type="text" name="email" id="email" >
          <label for="tlevel" class="tllabel">Tech Level:</label>
          <input type="text" name="tlevel" id="tlevel" >
          <div>          
            <button class="btn btn-primary btn-admin" id="sendrequest">Add Admin</button>
          </div>
      </div> 
    </form>
  </div>
  </body>
</html>