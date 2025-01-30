<?php
    session_start();
    session_destroy();
    header("refresh:1; url=../");
    echo "User log out successful redirecting to main page <br />";
?>