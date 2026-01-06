<?php
include('./connection.php'); {
  $did = $_GET['id'];
  $sql = "DELETE FROM `categoryname` WHERE `id`='$did'";
  $run = mysqli_query($conn, $sql);
  if ($run) {
    echo "<script>alert('Data has been deleted successfully!');</script>";
    echo "<script>
    setTimeout(function(){ window.location.href = './categoryview.php';},1000);
    </script>";
    mysqli_close($conn);
  }
}
