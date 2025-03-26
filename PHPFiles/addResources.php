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
          <input type="text" name="resourceItemName" id="resourceItemName" autocomplete="off" required =""/>

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
        $(".addInputBox").on('click',function(){
        
        var type = "input";
        var input = document.createElement(type);
        input.type = "text";
        input.className = "addResource newInputBox"; // set the CSS class
        input.name = "addResource";
        document.getElementById('newInput').appendChild(input); // put it into the DOM
        });
        $("#sendrequest").on("click",function(e){
          e.preventDefault();
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
            resourceItemName = $("input#resourceItemName").val();
            dataString = 'resourceItemName=' + resourceItemName;
            if (resourceItemName == "")
            {
                alert("Resource Item is blank");
                return false;
            }
            else
            {
             $.ajax({
                type:"POST",
                    url: "addResourceItem.php", 
                    data: {resourceItemName: resourceItemName},
                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function(response) 
                    { 
                        alert(response); 
                    }
            });
            }
         }
         else
         {
            resourceItemName = $("input#resourceItemName").val();
            $.ajax({
                type:"POST",
                    url: "addResourceItem.php", 
                    data: {resourceItemName: resourceItemName, addResource: resourceArray},
                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function(response) 
                    { 
                        alert(response ); 
                    }
            });
         }
         });
    });
</script>
  </body>
</html>