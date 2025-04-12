<?php
    session_start();
    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']) || !isset($_SESSION['Admin']))
    {
        header("location:/SEProj2025-Milestone/");
    }
    else
    {
        //require 'loginfo.php';
        //require 'logout.php';
    }
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Admin Portal</title>
    <script type='text/javascript' src='https://code.jquery.com/jquery-1.7.min.js'></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
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
            <!--<nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="admin.php"><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get All Tickets</a>
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
                        <a class="navbar-brand" href="addResources.php">Add Resources</a>
                        <a class="navbar-brand" href="returnResource.php">Return Resources</a>
                    </div>
                </div>
            </nav>-->
              <div class="sidebar-nav">
                <ul class="sidebar-ul">
                    <li class="account">Account</li>
                    <ul class="account-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <li class="account-li username"><?php echo htmlspecialchars($_SESSION['adminUN']); ?></li>
                        <li class="account-li logout btn btn-danger"><p style="font-size: 18px; margin-top: 10px">Log Out<p></li>
                    </ul>
                    <!-- License: CC Attribution. Made by Ryan Adryawan: https://dribbble.com/ryanawan -->
                    <a class="ticket" href="admin.php"><li><svg fill="#ffffff" width="75px" height="75px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                    <g data-name="19 costumer service" id="_19_costumer_service">
                    <path d="M37.71,34.54a13.428,13.428,0,0,0,5.51-4.86H46.7a2.915,2.915,0,0,0,2.74-3.06V19.43a3.124,3.124,0,0,0-.2-1.11V18.3a25.246,25.246,0,0,0-5.2-9.54l-.13-.15a15.275,15.275,0,0,0-5.72-3.97,17.135,17.135,0,0,0-14.11.8,15.539,15.539,0,0,0-3.99,3.17l-.13.15a25.246,25.246,0,0,0-5.2,9.54v.02a3.124,3.124,0,0,0-.2,1.11v7.19a2.915,2.915,0,0,0,2.74,3.06h3.48a13.428,13.428,0,0,0,5.51,4.86,20.226,20.226,0,0,0-15.02,19.5V59.5a1,1,0,0,0,1,1H51.73a1,1,0,0,0,1-1V54.04A20.226,20.226,0,0,0,37.71,34.54Zm9.73-15.11v7.19c0,.56-.35,1.06-.74,1.06H44.29c.17-.42.33-.85.46-1.29,0-.01,0-.01.01-.02a13.235,13.235,0,0,0-.1-8H46.7C47.09,18.37,47.44,18.87,47.44,19.43ZM17.3,27.68c-.39,0-.74-.5-.74-1.06V19.43c0-.56.35-1.06.74-1.06h2.04a13.261,13.261,0,0,0,.37,9.31Zm.26-11.31a22.694,22.694,0,0,1,3.89-6.28l.12-.13A13.124,13.124,0,0,1,25.05,7.2a15.268,15.268,0,0,1,12.41-.7,13.159,13.159,0,0,1,4.97,3.46l.12.13a22.694,22.694,0,0,1,3.89,6.28H43.82a13.311,13.311,0,0,0-23.64,0Zm3.11,6.14A11.33,11.33,0,1,1,43.05,25H39.71a2.991,2.991,0,0,0-2.82-2h-3a3,3,0,0,0,0,6h3a2.991,2.991,0,0,0,2.82-2H42.4a11.329,11.329,0,0,1-21.73-4.49Zm17.22,3.48v.02a.994.994,0,0,1-1,.99h-3a1,1,0,0,1,0-2h3A.994.994,0,0,1,37.89,25.99ZM50.73,58.5H13.27V54.04a18.228,18.228,0,0,1,18.2-18.2h1.06a18.228,18.228,0,0,1,18.2,18.2Z"/>
                    </g>
                    </svg><br><span><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</span></li></a>
                    <!--<ul class="allLinks-ul">
                        <span class="viewButton glyphicon glyphicon-off"></span>
                        <a class="allLinks-li" href="faculty.php"></a>
                        <a class="allLinks-li" href="classroom.php">Create Trouble Tickets</a>
                    </ul>-->
                     <a class="reserve" href="viewCalendar.php"><li class="reserveli"><img src="../files/images/calendar-icon.svg" class="calendaricon"/><br><span>View Calendar</span></li></a>
                     <a class="reserve" href="addAdminFaculty.php"><li class="reserveli"><img src="../files/images/addmember.svg" class="calendaricon"/><br><span>Add New Admin/Faculty Member</span></li></a>
                    <a class="reserve" href="returnResource.php"><li class="reserveli"><img src="../files/images/switch-icon.svg" class="calendaricon"/><br><span>Return Resources</span></li></a>
                </ul>
            </div>
            <!--// Get user's first name and display it on the welcome section  //-->
            <div class="welcome">
                <p class="adminname"><h2>Welcome Back <?php echo htmlspecialchars($_SESSION['adminUN']) ?></h2></p>
            </div>
            <!--// Get user's last 5 ticket and display it on the welcome section  //-->
            <div class='tickets'>
                <p class='lasttfive'><h3>Here are your last five active tickets</h3></p>
            </div>
            <!--// Verify Session //-->
            <?php
                if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']) || !isset($_SESSION['Admin']))
                {
                    header("location:/SEProj2025-Milestone/");
                }
                else
                {
                    //Database Connection//
                    require 'dbconfig.php';
                    //Query to get ticket assigned to Admin member and status is not completed sorted by incident ID#//
                    $sql2 = "SELECT * FROM (Select * from incidentreport WHERE AssignedTech = '{$_SESSION['Admin']}' and Status != 'Completed' ORDER BY incidentID DESC LIMIT 5) as r ORDER BY incidentID";
                    $results2 = $con->query($sql2);
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<th>Ticket ID</th>";
                    echo "<th>Reported By</th>";
                    echo "<th>Email</th>";
                    echo "<th>Date/Time</th>";
                    echo "<th>Room Number</th>";
                    echo "<th>Device Name</th>";
                    echo "<th>Issue Reported</th>";
                    echo "<th>Assigned Tech</th>";
                    echo "<th>Current Status</th>";
                    echo "<th>Update Status</th>";
                    echo "<th>Update Ticket</th>";
                    echo "</tr>";
                    while($row2 = $results2->fetch_assoc())
                    {
                        echo "<tr class='tickets'>";
                        echo "<td class='ticketID'>";
                        echo $row2['incidentID'];
                        echo "</td>";
                        echo "<td>";
                        echo $row2['facultyMember'];
                        echo "</td>";
                        echo "<td>";
                        echo $row2['facEmail'];
                        echo "</td>";
                        echo "<td>";
                        echo $row2['TimeDate'];
                        echo "</td>";
                        echo "<td>";
                        echo $row2['classRoomID'];
                        echo "</td>";
                        echo "<td>";
                        echo $row2['deviceName'];
                        echo "</td>";
                        echo "<td class='TDProblem'>";
                        echo $row2['Problem'];
                        echo "</td>";
                        echo "<td>";
                        echo htmlspecialchars($_SESSION['adminUN']);
                        echo "</td>";
                        echo "<td class='currentStatus'>";
                        echo $row2['Status'];
                        echo "</td>";
                        echo "<td>";
                        echo "<select name='statusInfo' class='statusInfo'>";
                        echo "<option value='New'></option>";
                        echo "<option value='In_Progress'>In Progress</option>";
                        echo "<option value='Waiting_Client'>Waiting Client</option>";
                        echo "<option value='Completed'>Completed</option>";
                        echo "<td>";
                        echo "<button class='btn btn-primary btn-sm pull-left updateTicket' id='{$row2['incidentID']}'>Update Ticket</button>";
                        echo "</td>";
                        echo "<td style='display:none;'>";
                        echo "<div id='homecon' style='display:none;'><img src='../files/images/gear2.gif' /></div>";
                        echo "</td>";
                        echo "</tr>";
                        echo "</tr>";
                    }              
                    echo "</tbody>";
                    echo "</table>";
                    $results2->free();
                    $con->close();
                }
            ?>
        </div> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script>
            //If status value is left blank it will default to the current value//
            var newStatus = "New";

            $('.statusInfo').change(function()
            {
                key = $('.statusInfo').parent().parent().find('input').val();
                newStatus = $(this).val(); //Get the value from selected option
            });
            //Resizes the text input when user double clicks in the Issue reported td// 
            function resizeInput() 
            {
                $(this).attr('size', $(this).val().length);
            }
            $('input[type="text"]')
            // event handler
            .keyup(resizeInput)
            // resize on page load
            .each(resizeInput);         
            $('td')
            // event handler
            .keyup(resizeInput)
            // resize on page load
            .each(resizeInput);

            $("td.TDProblem").dblclick(function () 
            {
                var originalContent = $(this).text(); //Gets original text in the td
                $(this).addClass("cellEditing"); //Add class to the td 
                $(this).html("<input type='text' value='" + originalContent + "' />"); //Switches the td to a textbox
                $(this).children().first().focus();
                $(this).children().first().keypress(function (e) 
                {
                    if (e.which == 13) //Checks if user presses enter to confirm changes
                    {
                        var newContent = $(this).val();
                        $(this).parent().text(newContent);
                        $(this).parent().removeClass("cellEditing");
                    }
                });

            });
            $('.updateTicket').on('click', function()
            {
                index = $(this).closest('tr').index() - 1; //Get td index value
                idNum =  $(".ticketID:eq(" + index + ")" ).text(); //Get ID from td by index id
                problemUpdate = $(this).parents('tr').find('td').eq(6).text();
                if(newStatus == 'New')
                {
                 newStatus =  $(this).parents('tr').find('td').eq(8).text();
                }
                $.ajax(
                {
                    type:"POST",
                    url: "updateTicket.php", 
                    data: {idNum: idNum, techIDNum: <?php if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']) || !isset($_SESSION['Admin']))
                    {
                        header("location:/SEProj2025-Milestone/");
                    }
                    else
                    {
                        echo($_SESSION['Admin']);}?>, problem: problemUpdate, status: newStatus},
                    beforeSend: function(){    //show spinning gear icon 
                        $("#homecon").show();

                        $("#homecon").dialog({
                            closeText: ""
                        });
                    },
                    success: function(response)
                    {

                    },
                    error: function(xhr, ajaxOptions, thrownError) 
                    { 
                        alert(xhr.responseText); 
                    }
                });
                $(document).ajaxStop(function()
                {
                window.location.reload(); //Reload page after database update
                });
            });
        </script>
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
