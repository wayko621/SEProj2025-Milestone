<?php
    session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/index.html");
    }
    else
    {
        $adminID = $_POST['adminID'];
        $hashPassword = hash('sha256', $adminID);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $tlevel = $_POST['tlevel'];


        require 'dbconfig.php';
        if ($adminID == null || $email == null || $fname == '' || $lname == '' )
        {
            header("refresh:2; url=addAdminFaculty.php");
            echo "Admin ID, First Name, Last Name or email was not supplied";
        }
        else
        {
            $sql1 = "Select * from adminmember where Email ='{$email}'";
            $results = $con->query($sql1);

            if($results->num_rows > 0)
            {
                //If email already exist user is not created"//
                header("refresh:2; url=addAdminFaculty.php");
                echo "User Already Exist";
            }
            else
            {   
                $sql3 = "Insert into adminID (adminID) Values ('{$adminID}')";
                $sql = "Insert into adminmember(adminID, FirstName, LastName, Email, TechLevel) VALUES('{$hashPassword}','{$fname}','{$lname}','{$email}','{$tlevel}')";
                if($con->query($sql) === TRUE && $con->query($sql3) == TRUE)
                {
                    header("refresh:2; url=addAdminFaculty.php");
                    echo "Added admin user";
                }
                else
                {
                    header("refresh:2; url=addAdminFaculty.php");
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

                
            }
        }

        $con->close();
    }
?>