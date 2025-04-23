<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Booked Rooms</title>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
        <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
    </head>
    <body>
        <div class="container">
        <h1 class="page-header text-center" id="viewcart">Reserved Classroom Details</h1>
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
        <?php
            if(isset($_SESSION['message'])){
        ?>
        <div class="alert alert-info text-center">
            <?php echo $_SESSION['message']; ?>
        </div>
            <?php
            unset($_SESSION['message']);
            }
            ?>
        <form method="POST" action="saveBooking.php">
            <table class="table table-bordered table-striped" id="tableCart">
            <thead>
            <th>Remove</th>
            <th>Room Number</th>
            <th>Faculty Member</th>
            <th>Resource Name</th>
            <th>Date/Time</th>
            </thead>
            <tbody>
            <?php
            //initialize total
            if(!empty($_SESSION['bookedRoom'])){
            //connection
            require 'dbconfig.php';

            //create array of initail qty which is 1
            $index = 0;
            if(!isset($_SESSION['qty_array'])){
            $_SESSION['qty_array'] = array_fill(0, count($_SESSION['bookedRoom']), 1);
            }
            $sql = "SELECT * FROM classrooms WHERE ID IN (".implode(',',$_SESSION['bookedRoom']).")";
            $query = $con->query($sql);
            
            while($row = $query->fetch_assoc()){
            $sql2 = "Select * from resourcelist WHERE Available = 1 ORDER BY resourceID";
            $results2 = $con->query($sql2);
            
            ?>
            <tr class="bookedClass">
            <td>
            <a href="deleteBooking.php?id=<?php echo $row['ID']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
            <input type="hidden" name="ID" id="ID" value="<?php echo $row['ID']; ?>">
            <td><?php echo $row['RoomNum']; ?></td>
            <input type="hidden" name="RoomNum" id="RoomNum" value="<?php echo $row['RoomNum']; ?>">
            <td><?php echo $_SESSION['facUN']; ?></td> 
            <input type="hidden" name="facUN" id="facUN" value="<?php echo $_SESSION['facUN']; ?>">
            <td>
            <select name='ResourceID' class='ResourceID'>
            <?php 
                if($results2->num_rows == 0)
            {
                echo "<option value='0'>No Resources Available</option>";
            }
            else
            {
                while($row3 = $results2->fetch_assoc())
                {
                         echo "<option value='" . $row3['resourceID'] . "' >" .$row3['resourceName']."</option>";  
                }
            }
            ?>
            </select>
            </td>
            <td><input type="datetime-local" id="bookedDate" name="bookedDate"></td>
            <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
            </tr>
            <?php
            $index ++;
            }
            
            }
            else
            {
            ?>
            <tr>
            <td colspan="4" class="text-center">No classroom is booked</td>
            </tr>
            <?php
            }
            
            ?>
            </tbody>
            </table>
            <a href="scheduleClassroom.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>Back</a>
            <a href="clearBooking.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Clear Reservation</a>
            <label class="btn btn-success" id="checkout"><span class="glyphicon glyphicon-check"></span>Reserve Classroom</label>
        </form>
        <div id="homecon">
        </div>
        <script type="text/javascript">
            $(document).ready(function()
            {
                var tableArray = new Array();

                $("#checkout").click(function()
                {
                    $('#tableCart tr.bookedClass').each(function(row, tr)
                {
                    
                    tableArray[row]={
                        "ID" : $(tr).find('[name=ID]').val(),
                        "Room" : $(tr).find('[name=RoomNum]').val(),
                        "facUN" : $(tr).find('[name=facUN]').val(),
                        "ResourceID" : $(tr).find('[name=ResourceID]').val(),
                        "bookedDate" : $(tr).find('[name=bookedDate]').val()
                    }
                
                });
                
                var jsonData = JSON.stringify(tableArray);
                if(jsonData == "[]")
                {   
                    alert("No classroom booked")
                    $(location).prop('href', 'scheduleClassroom.php');
                } 
                else 
                {
                $.ajax({
                    type: "POST",
                    dataType: 'JSON',
                    url: "checkout.php",
                    data: "tabledata=" + jsonData,
                    beforeSend: function(){
                        $('#homecon').addClass('fa fa-cog fa-spin fz-5x');
                        $('#homecon').html("<div id='messages'></div>");  
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
                    success: function(){
                        $("#checkout").hide();
                       setTimeout(function(){
                        $(location).prop('href', 'bookingProcessed.php');
                    }, 3000);
                         
                    },
                    error: function(response){
                        
                        $("#checkout").hide();
                        setTimeout(function(){
                        $(location).prop('href', 'bookingProcessed.php');
                    }, 3000);
                       
                    }
                });
            }
            
            });
            });
        </script>
        </div>
        </div>
        </div>
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