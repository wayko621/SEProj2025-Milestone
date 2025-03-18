<?php
    require 'dbconfig.php';
    
    $building = $_POST['building'];
    
    $sql2 ="Select * from classrooms where available = 1 and Building = '" .$building. "'";

    $results2 = $con->query($sql2);
    echo "<table class='table table-bordered table-striped'>";
    echo "<tbody>";
    echo "<tr>";
    echo "<th>Room ID</th>";
    echo "<th>Building</th>";
    echo "<th>Classroom</th>";
    echo "<th>Book Room</th>";
    echo "</tr>";
    if($results2->num_rows > 0)
    {
      while($row2 = $results2->fetch_assoc())
      {
        echo "<tr class='classroom'>";
        echo "<td>";
        echo $row2['ID'];
        echo "</td>";
        echo "<td class='ticketID'>";
        echo $row2['Building'];
        echo "</td>";
        echo "<td>";
        echo $row2['RoomNum'];
        echo "</td>";
        echo "<td class='btn btn-primary btn-sm pull-left bookClassRoom'>";
        echo '<a href="bookRoom.php?id='.$row2['ID']. ' ">Book Classroom</a>';
        echo "</td>";
        echo"</tr>" ; 
      }
    }
    echo "</tbody>";
    echo "</table>";      
    $results2->free();
    $con->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.min.js"></script>
  <script type="text/javascript" src="../files/js/jquery-ui-1.8.22.custom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../files/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="../files/images/favicon.ico">
</head>
<body>
  
</body>
</html>