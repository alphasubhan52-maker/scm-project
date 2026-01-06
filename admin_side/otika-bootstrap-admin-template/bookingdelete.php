<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
$did = $_GET['id'];
$dsql = "SELECT*FROM `booking` WHERE `bookingid`='$did'";
$drun = mysqli_query($conn, $dsql);
$dfet = mysqli_fetch_assoc($drun);
if ($drun) {
    unlink("./image/" . $dfet['image']);
    $msg = "Right";
} else {
    $msg = "NotRight";
}
if ($msg == "Right") {
    $sql = "DELETE FROM `booking` WHERE `bookingid`='$did'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo "<script>alert('Data has been deleted!');</script>";
        echo "<script>
        setTimeout(function(){ window.location.href = './bookingview.php';},1000);
        </script>";
    }
}
include('./include/footer.php');
