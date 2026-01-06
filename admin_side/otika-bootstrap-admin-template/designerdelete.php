<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
$did = $_GET['id'];
$dsql = "SELECT*FROM `designer` WHERE `id`='$did'";
$drun = mysqli_query($conn, $dsql);
$dfet = mysqli_fetch_assoc($drun);
$em = $dfet['email'];
$lsql = "SELECT*FROM `login` WHERE `email`='$em'";
$lrun = mysqli_query($conn, $lsql);
$lfet = mysqli_fetch_assoc($lrun);
if ($drun) {
    unlink("./image/" . $dfet['image']);
    $msg = "Right";
} else {
    $msg = "NotRight";
}
if ($msg == "Right") {
    if ($lfet['email'] == $em) {
        $usql = "DELETE FROM `login` WHERE `email`='$em'";
        $urun = mysqli_query($conn, $usql);
        if ($urun) {
            $sql = "DELETE FROM `designer` WHERE `id`='$did'";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                echo "<script>alert('Data has been deleted!');</script>";
                echo "<script>
                setTimeout(function(){ window.location.href = './designerview.php';},1000);
                </script>";
            }
        }
    }
}
include('./include/footer.php');
