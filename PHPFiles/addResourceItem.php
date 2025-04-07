<?php
    require 'dbconfig.php';
    $resourceItemName = $_POST['resourceItemName'];
    $resourceGroup = $_POST['addResource'];

    if(!isset($resourceGroup) || $resourceGroup == "[]")
    {
        $sql = "Select * from resourcelist where resourceName ='{$resourceItemName}'";
        $results = $con->query($sql);

        if($results->num_rows > 0)
        {
            //If email already exist user is not created"//
            header("refresh:2; url=addResources.php");
            echo "Resource By That Name {$resourceItemName} Already Exist";
        }
        else
        {  
            $sql1 = "Insert into resourcelist(resourceName) VALUES('{$resourceItemName}')";
            if($con->query($sql1) === TRUE)
            {
                header("refresh:2; url=addResources.php");
                echo "Added new resource <br>";
            }
            else
            {
                header("refresh:2; url=addResources.php");
                echo "Error happened";
            }
        }
    }
    else
    {

        $sql2 = "Select * from resourcelist where resourceName ='{$resourceItemName}'";
        $results2 = $con->query($sql2);

        if($results2->num_rows > 0)
        {
            //If resource already exist resource is not added"//
            header("refresh:2; url=addResources.php");
            echo "Resource By That Name {$resourceItemName} Already Exist <br>";
        }
        else
        {  
            $sql3 = "Insert into resourcelist(resourceName) VALUES('{$resourceItemName}')";
            if($con->query($sql3) === TRUE)
            {
                header("refresh:2; url=addResources.php");
                echo "Added new resource <br>";
            }
            else
            {
                header("refresh:2; url=addResources.php");
                echo "Error happened";
            }
        }
        foreach($resourceGroup as $key => $value)
        {
            $sql4 = "Select * from resourcelist where resourceName ='{$resourceGroup[$key]}'";
            $results4 = $con->query($sql4);

            if($results4->num_rows > 0)
            {
                //If resource already exist resource is not added//
                header("refresh:2; url=addResources.php");
                echo "Resource By The Name {$resourceGroup[$key]} Already Exist <br>";
            }
            else 
            {
                 $sql5 = "Insert into resourcelist(resourceName) VALUES('{$resourceGroup[$key]}')";
                if($con->query($sql5) === TRUE)
                {
                    header("refresh:2; url=addResources.php");
                    echo "Added new resource<br>";
                }
                else
                {
                    header("refresh:2; url=addResources.php");
                    echo "Error happened";
                }
            } 
        }
    }

    $con->close();
?>