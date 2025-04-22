<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/index.html");

    }
    else
    {
        //require 'loginfo.php';
       // require 'logout.php';
    }
?>

<!DOCTYPE html>
<html>
  <head>
     <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    <script type='text/javascript' src='https://code.jquery.com/jquery-1.7.min.js'></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../files/css/main-form-style.css"> 
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
    <style>
            .container
            {
                margin-top: 35px;
            }
        </style>
         <link rel="stylesheet" type="text/css" href="../files/css/sidebaradmin.css">
  </head>
  <body>
     <div class="container">
          <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['adminUN']); ?></li>
                        <li class="account-li logout btn btn-danger"><p style="font-size: 18px; margin-top: 10px">Log Out<p></li>
                    </ul>
                    <!-- SVG for Helpdesk License: CC Attribution. Made by Ryan Adryawan: https://dribbble.com/ryanawan -->
                    <a class="ticket" href="adminSplash.php"><li><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span><?php echo $_SESSION['adminUN']?>'s Page</span></li></a>
                  
                    <a class="ticket" href="admin.php"><li><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</span></li></a>
                    <a class="reserve" href="TroubleTicket.php"><li class="reserveli"><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span>All Tickets</span></li></a>
                     <a class="reserve" href="addAdminFaculty.php"><li class="reserveli"><img src="../files/images/addmember.svg" class="calendaricon"/><br><span>Add New Admin/Faculty Member</span></li></a>
                    <a class="reserve" href="returnResource.php"><li class="reserveli"><img src="../files/images/switch-icon.svg" class="calendaricon"/><br><span>Return Resources</span></li></a>
                </ul>
            </div>
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
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
     
         <script>
          $(document).ready(function()
           {
            $('.logout').on('click',function()
            {
           $(location).prop('href', 'sessionDestroy.php');
            });
            });
        </script>
           <script>
            $('.account').on("click", function(){
              
                $(".account-ul").addClass('view'); 
                $(".allLinks-ul").removeClass('allLinks-view');  
            });
        </script>
         <script>
            $('.viewButton').on("click", function(){
                $(".account-ul").removeClass('view');
                $(".allLinks-ul").removeClass('allLinks-view');
            });
        </script>
         <script>
            $('.allLinks').on("click", function(){
                  $(".account-ul").removeClass('view');
                $(".allLinks-ul").addClass('allLinks-view');
            });
        </script>
  </body>
</html>