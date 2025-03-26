<?php
session_start();

    if(!isset($_SESSION['loggedin'])  || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");
    }
    else
    {

    $resourceName = $_POST['resourceName'];

     require 'dbconfig.php';
        if ($resourceName == null )
        {
            header("refresh:2; url=addResource.php");
            echo "Admin ID, First Name, Last Name or email was not supplied";
        }
        else
        {
            $sql1 = "Select * from resourcelist where resourceName ='" . $resourceName . "'";
            $results = $con->query($sql1);

            if($results->num_rows > 0)
            {
                //If email already exist user is not created"//
                header("refresh:2; url=addResource.php");
                echo "User Already Exist";
            }
            else
            {   
                $sql = "Insert into resourcelist(resourceName) VALUES('".$resourceName."')";
                if($con->query($sql) === TRUE)
                {
                    header("refresh:2; url=addResource.php");
                    echo "Added admin user";
                }
                else
                {
                    header("refresh:2; url=addResource.php");
                    echo "Error: " . $sql . "<br>" . $con->error;
                }
            }
        }

        $con->close();
    }

    

?>