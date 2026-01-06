<?php
include('./singleconnection.php');
?>
<?php
include('./singleheader.php');
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
        <form action="singlesave.php" method="post" class="form py-3 pb-3 w-75" enctype="multipart/form-data">
            <div class="h5 my-4 mx-5">
             <label>ImgName:</label>
             <input type="text" name="imgname" class=" w-50 my-2 m2">
            </div>
            <div class="h5 my-4 mx-5">
             <label>ImgClass:</label>
             <input type="text" name="imgclass" class="w-50 my-2 m3">
            </div>
            <div class="h5 my-4 mx-5">
            <input type="file" name="img[]" multiple class="w-50 my-2 m4"> 
            </div>
             <input type="submit" value="Save" class="btn bt pb-2">
        </form>
    </div>
</body>
</html>