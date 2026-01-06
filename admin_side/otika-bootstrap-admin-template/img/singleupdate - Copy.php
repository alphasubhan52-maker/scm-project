<?php
include('./singleconnection.php');
?>
<?php
include('./singleheader.php');
?>
<?php
include('./singleconnection.php');
$uid=$_GET['id'];
$gsql="SELECT*FROM `image` WHERE `imgid`='$uid'";
$grun=mysqli_query($conn,$gsql);
$gfet=mysqli_fetch_assoc($grun);
if(isset($_POST['submit'])){
$imgname=mysqli_real_escape_string($conn,$_POST['imgname']);
$imgclass=mysqli_real_escape_string($conn,$_POST['imgclass']);
$first=$_FILES['img']['name'];
if(!empty($first)){
     $exe=strtolower(pathinfo($first,PATHINFO_EXTENSION));
     $ext=array('jpg','png','jpeg');
     if(in_array($exe,$ext)){
        $sec=rand(1,99999);
        $third=($sec.".".$exe);
        $msg="Right";
     }else{
        $msg="Not Right";
     }
}
  if(@$msg=="Right"){
    unlink("../imgs/".$gfet['img']);
    $sql="UPDATE `image` SET `imgname`='$imgname',`imgclass`='$imgclass',`img`='$third' WHERE `imgid`='$uid'";
    $run=mysqli_query($conn,$sql);
    if($run){
        move_uploaded_file($_FILES['img']['tmp_name'],"../imgs/".$third);
        echo "Data has been updated";
        header('Refresh:1,url=./singleindex.php');
    }else{
        echo"Not Updated";
    }
  }else{
    $old=$gfet['img'];
    $sql="UPDATE `image` SET `imgname`='$imgname',`imgclass`='$imgclass',`img`='$old' WHERE `imgid`='$uid'";
    $run1=mysqli_query($conn,$sql);
    if($run1){
        echo"Data updated with old pic";
    }
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="Popper/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <style>
        .form{
            background-color:#e76f51;
           margin-left:140px;
           border-radius:10px;
        }
        .h{
            background-color:#F8E5A0;
            margin-top:-16px;
            height:500px;
            width:1116px;
        }
        .m1{
            margin-left:95px;
            border-radius:5px;
            border:none;
        }
        .m2{
            margin-left:105px;
            border-radius:5px;
            border:none;
        }
        .m3{
            margin-left:80px;
            border-radius:5px;
            border:none;
        }
        .m4{
            margin-left:210px;
            border-radius:5px;
            border:none;
        }
        .bt{
            margin-left:260px;
            height:45px;
            width:70px;
            background:#1b263b;
            color:white;
            font-size:20px;
        }
        .bt:hover{
            background:white;
            color:#1b263b;
        }
    </style>
</head>
<body>
    <div class="container h ">
    <div class="h4 py-5 px-4">Add New Record</div>
    <?php
    $uid=$_GET['id'];
    $sql="SELECT*FROM `image` WHERE `imgid`='$uid'";
    $run=mysqli_query($conn,$sql);
    if(mysqli_num_rows($run) > 0 ) {
        while($fet= mysqli_fetch_assoc($run)){
    ?>
        <form action="" method="post" class="form py-3 pb-3 w-75" enctype="multipart/form-data">
            <div class="h5 my-4 mx-5">
             <label>ImgName:</label>
             <input type="text" name="imgname" class=" w-50 my-2 m2" value="<?php echo $fet['imgname']?>">
            </div>
            <div class="h5 my-4 mx-5">
             <label>ImgClass:</label>
             <input type="text" name="imgclass" class="w-50 my-2 m3" value="<?php echo $fet['imgclass']?>">
            </div>
            <div class="h5 my-4 mx-5">
                <img src="<?php echo "../imgs/".$fet['img']?>" width="80px";>
            </div>
            <div class="h5 my-4 mx-5">
            <input type="file" name="img" class="w-50 my-2 m4"> 
            </div> 
             <input type="submit" value="Save" name="submit" class="btn bt pb-2">
        </form>
        <?php
        }
    }
        ?>
</body>
</html>