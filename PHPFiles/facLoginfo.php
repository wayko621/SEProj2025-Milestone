<?php


    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['facUN']))
    {
        header("location:/SEProj2025/");

    }
    else
    {
		echo "<div style='padding-left: 10px;'>"; 
		echo "Name: " . htmlspecialchars($_SESSION['facUN']) . "<br/>";
		echo "Email: " . htmlspecialchars($_SESSION['facEmail']);
	}

?>