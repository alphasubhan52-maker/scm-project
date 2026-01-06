<?php
include('./connection.php');
$did=$_GET['id'];
$dsql="SELECT*FROM `news` WHERE `newsid`='$did'";
$drun=mysqli_query($conn,$dsql);
$dfet=mysqli_fetch_assoc($drun);
    $ph=unserialize($dfet['images']);
    foreach($ph as $mg){
  unlink("./image/".$mg);
  $msg="Right";
    }
    if($msg=="Right"){
$sql="DELETE FROM `news` WHERE `newsid`='$did'";
$run=mysqli_query($conn,$sql);}
if($run){
    echo "<script>alert('Data has been deleted!');</script>";
    echo "<script>
      setTimeout(function(){ window.location.href = './newsview.php';},1000);
      </script>";
}
?>