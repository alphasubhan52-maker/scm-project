<?php
include('./connection.php');
$did = $_GET['id'];
$sql = "SELECT*FROM `role` WHERE `roleid`='$did'";
$drun = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($drun);
$dsql = "DELETE FROM `profile` WHERE `roleid`='$did'";
$run = mysqli_query($conn, $dsql);
if ($run) {
    echo "<script>alert('Data has been deleted!');</script>";
    echo "<script>
    setTimeout(function(){ window.location.href = './roleview.php';},1000);
    </script>";
}
