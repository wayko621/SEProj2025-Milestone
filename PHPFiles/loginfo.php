<?php
   

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['adminUN']))
    {
        header("location:/SEProj2025-Milestone/");

    }
    else
    {
		echo "<div style='padding-left: 10px;'>"; 
		echo "Name: " . htmlspecialchars($_SESSION['adminUN']) . "<br/>";
		echo "Email: " . htmlspecialchars($_SESSION['Email']);
	}
?>