<?php
    session_start();
    if(session_destroy()) // Destroying All Sessions
    {
        header("Location: Home.php"); // Redirecting To Home Page
    }
?>