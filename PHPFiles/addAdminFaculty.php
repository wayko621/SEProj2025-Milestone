<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style2.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
    <style>
            .container
            {
                margin-top: 35px;
            }
        </style>
  </head>
  <body>
            <div class="card">
         <input type="checkbox" id="switch" aria-hidden="true" name=""/>
    <div class="content">
    <form action="addAdminUser.php" method="POST" class="row g-3 form-top center-margin" >
      <div class="front">
          <div class="inner">
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
              <div>          
                <button class="btn btn-primary btn-admin" id="sendrequest">Add Admin</button>
              </div>
              <div>
                <label for="switch" aria-hidden="true">Switch to Faculty Member</label>
            </div>
          </div>
      </div> 
    </form>
     <form action="addFacultyMember.php" method="POST" class="row g-3 form-top center-margin" >
      <div class="back">
        <div class="inner">
            <label for="facultyID" class="IDlabel">FacultyID:</label> 
            <input type="text" name="facultyID" id="facultyID" autocomplete="off" required =""/><br/>
            <label for="fname" class="fnlabel">First Name:</label> 
            <input type="text" name="fname" id="fname" autocomplete="off" required =""/><br/>
            <label for="lname" class="lnlabel">Last Name:</label> 
            <input type="text" name="lname" id="lname" autocomplete="off" required =""/><br/>
            <label for="email" class="emaillabel2">Email:</label> 
            <input type="email" name="email" id="email" autocomplete="off" required =""/>
            <div>
                <button class="btn btn-primary btn-faculty" id="sendrequest">Add Faculty Member</button>
            </div>
            <div>
                <label for="switch" aria-hidden="true">Switch to Admin Member</label>
            </div>
        </div>
      </div>
    </form>
    </div>
  </div>
  </body>
</html>