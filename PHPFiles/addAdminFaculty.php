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
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../files/css/main-form-style.css">
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style2.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
  </head>
  <body>
    <nav class="main-nav">
      
          <div class="navbar-header"> 
              <a class="navbar-brand" href="admin.php">Admin Page</a>
              <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
              <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
              <a class="navbar-brand" href="addResources.php">Add Resources</a>
              <a class="navbar-brand" href="getClassroomResource.php">Return Resources</a>
          </div>
      
    </nav>
    <div class="card">
      <input type="checkbox" id="switch" aria-hidden="true" name=""/>
      <div class="content">
        
          <div class="front">
            <div class="inner">
              <form action="addAdminUser.php" method="POST" class="row g-3 form-top center-margin" >
                <label for="adminID" class="IDlabel">AdminID:</label> 
                <input type="text" name="adminID" id="adminID" autocomplete="off" required =""/><br/>
                <label for="fname" class="fnlabel">First Name:</label>
                <input type="text" name="fname" id="fname" autocomplete="off" required =""/><br/>
                <label for="lname" class="lnlabel">Last Name:</label> 
                <input type="text" name="lname" id="lname" autocomplete="off" required =""/><br/>
                <label for="email" class="emaillabel2">Email:</label> 
                <input type="email" name="email" id="email" autocomplete="off" required =""/><br/>
                <label for="tlevel" class="tllabel">Tech Level:</label>
                <input type="text" name="tlevel" id="tlevel" autocomplete="off" required =""/>
                <div class="addButton">          
                  <button class="btn" id="sendrequest">Add Admin</button>
                </div>
                <div class="switchback">
                  <label for="switch" aria-hidden="true" class="switchspan"><span>Switch to Faculty Member</span></label>
                </div>
              </form>
            </div>
          </div> 
          <div class="back">
            <div class="inner">
              <form action="addFacultyMember.php" method="POST" class="row g-3 form-top center-margin" >
                <label for="facultyID" class="IDlabel">FacultyID:</label> 
                <input type="text" name="facultyID" id="facultyID" autocomplete="off" required =""/><br/>
                <label for="fname" class="fnlabel">First Name:</label> 
                <input type="text" name="fname" id="fname" autocomplete="off" required =""/><br/>
                <label for="lname" class="lnlabel">Last Name:</label> 
                <input type="text" name="lname" id="lname" autocomplete="off" required =""/><br/>
                <label for="email" class="emaillabel2">Email:</label> 
                <input type="email" name="email" id="email" autocomplete="off" required =""/>
                <div class="addButton">
                  <button class="btn" id="sendrequest">Add Faculty Member</button>
                </div>
                <br/>
                <div class="switchback">
                  <label for="switch" aria-hidden="true" class="switchspan"><span>Switch to Admin Member</span></label>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
    <script>
            setInterval(function(){ auto_logout() }, 1200000);
            function auto_logout()
            {
            //this function will redirect the user to the session expired page and redirect back to main page
            if(confirm("Your session has expired"))
            {
                window.location="sessionExpired.php";
            }
 
            }
    </script> 
  </body>
</html>