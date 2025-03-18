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
    <link rel="stylesheet" type="text/css" href="../files/css/forms-style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

  </head>
  <body>
     <div class="container">
       <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="admin.php">Admin Page</a>
                        <a class="navbar-brand" href="TroubleTicket.php">Get Trouble Tickets</a>
                        <a class="navbar-brand" href="addAdmin.php">Add Admin Member</a>
                        <a class="navbar-brand" href="addFaculty.php">Add Faculty Member</a>
                        <a class="navbar-brand" href="getClassroomResource.php">Classroom Resource</a>
                    </div>
                </div>
            </nav>
            <div id="calendar">

            </div>
            <?php
                require 'dbconfig.php';
                $sql1 = "Select * from classroomschedule WHERE Active = 1";
                $results = $con->query($sql1);
            ?>


    </div>
    <script>
        $(document).ready(function(){
            $('#calendar').fullCalendar({
                eventRender: function(eventObj, $el) {
                 $el.popover({
                title: eventObj.title,
                content: eventObj.description,
                trigger: 'hover',
                placement: 'top',
                container: 'body'
             });
                },
                events:[
                    <?php
                    while($row2 = $results->fetch_assoc())
                        {?>
                    {
                        title:'<?php echo $row2['facultyMember'];?>',
                        start: '<?php echo $row2['scheduleDate'];?>',
                        end: '<?php echo $row2['scheduleDate'];?>',
                        description: '<?php echo $row2['classRoomNum'];?>',
                        color: 'yellow',
                        textColor: 'black'
                    },
                <?php } ?>
                ]

            });

        });
    </script>
  </body>
</html>