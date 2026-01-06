<?php
include('./singleconnection.php');
$imgname=mysqli_real_escape_string($conn,$_POST['imgname']);
$imgclass=mysqli_real_escape_string($conn,$_POST['imgclass']);
$img=$_FILES['img']['name'];
$img_array=array();
foreach($img as $pic){
$exe=pathinfo($pic,PATHINFO_EXTENSION);
$e=strtolower($exe);
$extension=array('jpg','jpeg','png');
if(in_array($e,$extension)){
    $picname=rand(1,99999);
    $pic2=$picname.".". $e;
    ($img_array[]=$pic2);
    $msg="Right";
}else{
    $msg="Not Right";
}
}
if($msg=="Right"){
    $im=serialize($img_array);
    $sql="INSERT INTO `image`(`imgname`, `imgclass`, `img`) VALUES ('$imgname','$imgclass','$im')";
    $run=mysqli_query($conn,$sql);
    if($run){
        foreach($img_array as $key=>$abc){
     move_uploaded_file($_FILES['img']['tmp_name'][$key],"../imgs/".$abc);
        echo "Data has been inserted";
    }}else{
        echo"Data has not been inserted";
    }
    header("location:http://localhost/PhpProjects/image_crud/img/singleindex.php");
    mysqli_close($conn);
}
?>