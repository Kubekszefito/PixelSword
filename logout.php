<?php
    session_start();
    if (!isset($_SESSION['logged123']))
    {
        header('Location: login.php');
        exit();
    }
    header('Location: index.html');

    session_destroy();
?>