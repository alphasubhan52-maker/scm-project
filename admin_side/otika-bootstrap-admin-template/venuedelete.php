<?php
include('./connection.php'); {
  $did = $_GET['id'];
  $sql = "DELETE FROM `venue` WHERE `id`='$did'";
  $run = mysqli_query($conn, $sql);
  if ($run) {
    echo "<script>alert('Data has been deleted successfully!');</script>";
    mysqli_close($conn);
  }
  echo "<script>
  setTimeout(function(){ window.location.href = './venueview.php';},1000);
  </script>";
}
