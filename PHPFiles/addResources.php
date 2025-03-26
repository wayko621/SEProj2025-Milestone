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
                        <a class="navbar-brand" href="addFaculty.php">Add Faculty Member</a>
                        <a class="navbar-brand" href="getClassroomResource.php">Classroom Resource</a>
                        <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
                    </div>
                </div>
            </nav>
    <form class="row g-3 form-top center-margin" id="form">
      <div class="form-group" > 
          <label for="resourceName" class="resourceName">Resource Name:</label>
          <input type="text" name="resourceName" id="resourceName" autocomplete="off" required =""/>

          <div id="newInput"></div>
          <div>          
            <button class="btn btn-primary btn-admin" id="sendrequest">Add Resource</button>
          </div>
      </div> 
    </form>
    <div class="addButton">
            <button class="btn addInputBox">+</button>
    </div>
  </div>
   
    <script>
       $(document).ready(function(){
        $(".addInputBox").click(function(){
        
        var type = "input";
        
        var input = document.createElement(type);
        input.type = "text";
        input.className = "addResource newInputBox"; // set the CSS class
        input.name = "addResource";
        document.getElementById('newInput').appendChild(input); // put it into the DOM
    });
        <script>
        $("#sendrequest").on("click",function(){

          resourceList = $('.addResource').map(function() 
          {
            return $(this).val();
          }).get();

           allResource = resourceList;
           resourceArray = new Array();

         for (i in allResource)
          {
            if (allResource[i])
                resourceArray.push(allResource[i]);
          }

          var jsonData = JSON.stringify(resourceArray);
         
         if(jsonData == "[]")
         {
            alert("no json data");
         }
         else
         {
            $.ajax({
                type:"POST",
                    url: "addResourceItem.php", 
                    data: {resourceName: resourceName, addResource: jsonData},
                     beforeSend: function(){    //show spinning gear icon 
                         $("#homecon").show();
                         
                         $("#homecon").dialog({
                                closeText: ""
                            });
                    },
                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError) 
                    { 
                        alert(xhr.responseText); 
                    }
            });
         }
         });
    });
</script>
  </body>
</html>