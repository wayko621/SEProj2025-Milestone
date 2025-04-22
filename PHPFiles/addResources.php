<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:index.html");

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
                        <a class="navbar-brand" href="adminSplash.php"><?php echo $_SESSION['adminUN']?>'s Page</a> 
                         <a class="navbar-brand" href="admin.php"><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get All Tickets</a>
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
                        <a class="navbar-brand" href="returnResource.php">Return Resources</a>
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
   <div id="homecon">
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
                    beforeSend: function(){
                        $("#homecon").dialog({
                            closeText: ""
                        });
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages' style='position:relative; top:60px; width:auto;'></div>");
                        $('#messages').html("")
                        .hide()  
                        .fadeIn(5000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                    });  
                        
                       $('#messages').html("<img src='../files/images/Radar.gif' />")
                        .fadeOut(2000, function() {
                        $('#messages').html("");
                    });    
                    },
                    success: function(response)
                    {
                         $("#homecon").dialog({
                            closeText: ""
                        });
                       setTimeout(function(){
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages' style='font-size: 20px; background: rgba(255,255,255,0.6); border-radius: 8px; padding-left: 10px; backdrop-filter: blur(16px); position:relative; top:60px; width:500px;'></div>");  
                        $('#messages').html(response)
                        $('#messages').html($('#messages').html() + "<br\>")
                        .hide()  
                        .fadeIn(5000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                        $(location).prop('href', 'addResources.php');
                    });
                         
                    }, 3000);

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
                    beforeSend: function(){
                        $("#homecon").dialog({
                            closeText: ""
                        });
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages' style='position:relative; top:160px;''></div>");  
                        $('#messages').html("")
                        .hide()  
                        .fadeIn(5000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                    });  
                        
                       $('#messages').html("<img src='../files/images/Radar.gif' />")
                        .fadeOut(2000, function() {
                        $('#messages').html("");

                    });    
                    },
                    success: function(response)
                    {
                       $("#homecon").dialog({
                            closeText: ""
                        });
                       setTimeout(function(){
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages' style='font-size: 20px; background: rgba(255,255,255,0.6); border-radius: 8px; padding-left: 10px; backdrop-filter: blur(16px); position:relative; top:160px; width:500px;'></div>");  
                        $('#messages').html(response)
                        .hide()  
                        .fadeIn(5000, function() {
                        $('#homecon').removeClass('fa fa-cog fa-spin fz-5x');
                        $(location).prop('href', 'addResources.php');

                    });
                         
                    }, 3000);
                       
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