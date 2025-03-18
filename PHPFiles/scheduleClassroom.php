<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN']))
    {
        header("location:/SEProj2025/");
        
    }
    else
    {
        require 'facLoginfo.php';
        require 'logout.php';
        if(!isset($_SESSION['bookedRoom']))
        {
            $_SESSION['bookedRoom'] = array();
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Classroom Schedule</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.min.js"></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
        <style>
            .container
            {
                margin-top: 35px;
            }
            .bookClassRoom a
            {
                color: #fff;
            }
            .bookClassRoom a:hover
            {
                color: #f00;
            }
        </style>
    </head>
    <body>
        <div class="container">
              <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header"> 
                        <a class="navbar-brand" href="faculty.php">Faculty Page</a>
                        <a class="navbar-brand" href="classroom.php">Create Trouble Tickets</a>
                        <a class="navbar-brand" href="../connectCamera.html">Access Camera</a>
                        <a class="navbar-brand glyphicon glyphicon-book" href="viewBooking.php"><?php echo count($_SESSION['bookedRoom']); ?></a>
                    </div>
                </div>
            </nav>
            <?php

                if(isset($_SESSION['message']))
                {
                    echo "<div class='row'>";
                    echo "<div class='col-sm-6 col-sm-offset-6'>";
                    echo "<div class='alert alert-info text-center'>";
                    echo $_SESSION['message'];
                    echo "</div></div></div>";
                }
            ?>
            <select name='building' class='building'>
                <option value="Center for Computing and Information Science">Center for Computing and Information Science</option>
                <option value="Richardson Hall">Richardson Hall</option>
            </select>
        <div id="tableResults">
        </div>
        </div>
        <script>
            $(document).ready(function(){
                buildingNum = 'Center for Computing and Information Science';
                 $.ajax(
                    {
                        type:"POST",
                        url: "classroomList.php",
                        data: {building: buildingNum},
                        success: function(response)
                        {
                            $('#tableResults').html(response);
                        },
                        error: function(xhr, ajaxOptions, thrownError) 
                        { 
                            alert(xhr.responseText); 
                        }
                    });
                
            });
             $('.building').change(function()
                {
                    buildingNum = $(this).val();

                     $.ajax(
                    {
                        type:"POST",
                        url: "classroomList.php",
                        data: {building: buildingNum},
                        success: function(response)
                        {
                            $('#tableResults').html(response);
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
    