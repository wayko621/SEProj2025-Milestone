<?php
    
    
    header("refresh:1; url=../");
    echo "User log out successful redirecting to main page <br />";
    session_start();
    session_unset();
    $_SESSION = array();
    session_destroy();

?>