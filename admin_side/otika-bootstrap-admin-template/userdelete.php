<?php
include('./connection.php');
$did = $_GET['logid'];
$dsql = "SELECT*FROM `login` WHERE `loginid`='$did'";
$drun = mysqli_query($conn, $dsql);
if ($drun) {
    $sql = "DELETE FROM `login` WHERE `loginid`='$did'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo "<script>alert('Data has been Deleted successfully!');</script>";
        echo "<script>
        setTimeout(function(){ window.location.href = './userview.php';},1000);
        </script>";
    }
}
