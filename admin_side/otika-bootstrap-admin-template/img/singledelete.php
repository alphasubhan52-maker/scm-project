<?php
include('./singleconnection.php');
$did=$_GET['id'];
$dsql="SELECT*FROM `image` WHERE `imgid`='$did'";
$drun=mysqli_query($conn,$dsql);
$dfet=mysqli_fetch_assoc($drun);
    $ph=unserialize($dfet['img']);
    foreach($ph as $mg){
  unlink("../imgs/".$mg);
  $msg="Right";
    }
    if($msg=="Right"){
$conn1=mysqli_connect("localhost","root","","singleimage");
$sql="DELETE FROM `image` WHERE `imgid`='$did'";
$run=mysqli_query($conn1,$sql);}
if($run){
    echo"Data has been deleted";
    header('Refresh:1,url=./singleindex.php');
}
?>