<?php 
    session_start();
    unset($_SESSION['user']);
    header("location:" . $_SERVER["HTTP_REFERER"]);
?>