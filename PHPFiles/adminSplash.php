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
            width: 960px;
            margin-left: 250px;
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
                    <a class="ticket" href="admin.php"><li><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span><?php echo $_SESSION['adminUN']?>'s  Assigned Tickets</span></li></a>
                    <a class="reserve" href="TroubleTicket.php"><li class="reserveli"><img src="../files/images/helpdesk.svg" class="calendaricon"><br><span>All Tickets</span></li></a>
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
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
