<?php
$con = new mysqli('localhost', 'username', 'password', 'databasename');
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>