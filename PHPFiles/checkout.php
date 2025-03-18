<?php
session_start();
    require 'dbconfig.php';
    $data = stripcslashes($_POST['tabledata']);
    $data = json_decode($data, true);
    
    if($data == '')
    {
        echo "No Data Provided";
    }
    else
    {
    for($x = 0; $x < count($data); $x++)
    {
        $sql = "INSERT INTO classroomschedule(classRoomID,classRoomNum,facultyMember,scheduleDate,resourceID,Active) VALUES(".$data[$x]['ID'] .",'" .$data[$x]['Room']."','".$data[$x]['facUN']."','".$data[$x]['bookedDate']. "',".$data[$x]['ResourceID']. ", 1)";
        echo $sql;
           if($con->query($sql) === TRUE)
        {
            $sql2 = "UPDATE classrooms SET Available = '0' WHERE ID = " .$data[$x]['ID'];
            if($con->query($sql2) === TRUE)
            {
                echo "Classroom ListUpdate completed";
            }

           $sql3 = "UPDATE resourcelist SET Available = '0' WHERE resourceID = " .$data[$x]['ResourceID'];
           if($con->query($sql3) === TRUE)
            {
                echo "Resource List Update completed";
            }
        }
        else
        {
            
            echo "SQL1 Error";
        }
    }
   }
    $con->close();
   
?>


