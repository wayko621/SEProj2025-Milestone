<?php
    if(!isset($_SESSION['loggedin']) || !isset($_SESSION['adminUN']))
    {
        header("location:/");

    }
    else
    {
        session_regenerate_id(true);
		echo "<div style='padding-left: 10px;' class='loginsection'>"; 
		echo "Name: " . htmlspecialchars($_SESSION['adminUN']) . "<br>";
		echo "Email: " . htmlspecialchars($_SESSION['Email']);
	}
?>