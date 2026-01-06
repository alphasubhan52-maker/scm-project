<?php
include('./connection.php');
session_start();
session_unset();
session_destroy();
echo "<script>alert('You logged out successfuly!');</script>";
header('Refresh:1,url=./login.php');
?>