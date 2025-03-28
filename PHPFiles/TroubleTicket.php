<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['adminUN']))
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
        <meta charset="utf-8">
        <title>Incident Report</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
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
                        <a class="navbar-brand" href="addAdminFaculty.php">Add New Admin/Faculty Member</a>
                        <a class="navbar-brand" href="viewCalendar.php">View Calendar</a>
                        <a class="navbar-brand" href="addResources.php">Add Resources</a>
                        <a class="navbar-brand" href="getClassroomResource.php">Return Resources</a>
                    </div>
                </div>
            </nav>
            <?php
            if(!isset($_SESSION['loggedin']) || !isset($_SESSION['adminUN']) || !isset($_SESSION['TechLevel']))
    {
        header("location:/SEProj2025-Milestone/");    
    }
    else
    {
                require 'dbconfig.php';
                if($_SESSION['TechLevel'] == 2 || $_SESSION['TechLevel'] == 3)
                {
                    $sql = "Select * from incidentreport WHERE Status != 'Completed' ORDER BY incidentID ";
                    $results = $con->query($sql);
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
                    echo "<th>Tech ID Number</th>";
                    echo "<th>Assigned Tech</th>";
                    echo "<th>Assign Tech</th>";
                    echo "<th>Current Status</th>";
                    echo "</tr>"; 
                    while($row = $results->fetch_assoc())
                    {
                    echo "<tr class='tickets'>";
                    echo "<td class='ticketID'>";
                    echo $row['incidentID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['facultyMember'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['facEmail'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['TimeDate'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['classRoomID'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['deviceName'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['Problem'];
                    echo "</td>";
                    echo "<td>";
                    echo "<select name='techid' class='techid'>";
                    echo "<option value='100'>100</option>";
                    echo "<option value='200'>200</option>";
                    echo "<option value='300'>300</option>";
                    echo "</td>";
                    echo "<td>";
                    echo $row['AssignedTech'];
                    echo "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-primary btn-sm pull-left getTech' id='" .$row['incidentID']."'>Assign Tech</button>";
                    echo "</td>";
                    echo "<td>";
                    echo $row['Status'];
                    echo "</td>";
                    echo "</tr>";
                    }
                    $results->free();
                    $con->close();
                }
                else
                {
                   header("refresh:0; url=/SEProj2025-Milestone/PHPFiles/admin.php");
                   echo "Tech level is lower than 2 or does not exist. Redirecting back to admin page";
                }
                echo "</tbody>";
                echo "</table>";
                }
            ?>
        </div>
        <script>
                var techID = 0;
                $('.techid').change(function()
                {
                key = $('.techid').parent().parent().find('input').val();
                techID = $(this).val();
                }),
                $('.getTech').on('click', function()
                {
                    if(techID === 0)
                    {
                        techID = 100;
                    }
                    index = $(this).closest('tr').index() - 1;
                    idNum =  $(".ticketID:eq(" + index + ")" ).text();
                    $.ajax(
                    {
                        type:"POST",
                        url: "assignTech.php",
                        data: {idNum: idNum, techIDNum: techID},
                        success: function(response)
                        {
                            alert(response);
                        },
                        error: function(xhr, ajaxOptions, thrownError) 
                        { 
                            alert(xhr.responseText); 
                        }
                    });
                    $(document).ajaxStop(function()
                    {
                        window.location.reload();
                    });
                });            
        </script>
        <script>
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
                var originalContent = $(this).text(); 
                $(this).addClass("cellEditing");
                $(this).html("<input type='text' value='" + originalContent + "' />");
                $(this).children().first().focus();
                $(this).children().first().keypress(function (e) 
                {
                if (e.which == 13) 
                {
                var newContent = $(this).val();
                $(this).parent().text(newContent);
                $(this).parent().removeClass("cellEditing");
                }
                });

            });
            $('.updateTicket').on('click', function()
            {
                index = $(this).closest('tr').index() - 1;
                idNum =  $(".ticketID:eq(" + index + ")" ).text();
                problemUpdate = $(this).parents('tr').find('td').eq(6).text();
                $.ajax(
                {
                    type:"POST",
                    url: "updateTicket.php",
                    data: {idNum: idNum, techIDNum: <?php if(!isset($_SESSION['Admin']))
                    {
           
                    }
                    else
                    {echo($_SESSION['Admin']); }?>, problem: problemUpdate},
                    success: function(response)
                    {
                        alert(response);
                    },
                    error: function(xhr, ajaxOptions, thrownError) 
                    { 
                        alert(xhr.responseText); 
                    }
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

    </body>
</html>
    