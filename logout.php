<?php
    $conn = mysqli_connect("localhost","root","","users")or die("connection failed");

    session_start();
    session_unset();
    session_destroy();

    header("Location: http://localhost/register_form/index.php");
?>