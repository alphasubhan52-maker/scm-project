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
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="Popper/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <style>
        .tr{
            background-color:#57cc99;
        }
        .td{
            background-color:white;
        }
        .table{
            border-radius:10px;
        }
        .h{
            background-color:#F8E5A0;
            margin-top:-16px;
            height:auto;
            width:1116px;
        }
    </style>
</head>
<body>
<div class="container h ">
<div class="h3 py-3 px-2">All Record</div>
<div class="conatiner mx-5 pb-5">
    <?php
    $sql="SELECT*FROM `image`";
    $run=mysqli_query($conn,$sql);
    ?>
            <table class="table table-bordered">
                <thead>
                  <tr class="tr">
                    <th>Id</th>
                    <th>ImgName</th>
                    <th>ImgCLass</th>
                    <th>Img</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
               </thead>
               <tbody>
                <?php
                while($fet=mysqli_fetch_assoc($run)){
                ?>
                <tr class="td">
                    <td><?php echo $fet['imgid'];?></td>
                    <td><?php echo $fet['imgname'];?></td>
                    <td><?php echo $fet['imgclass'];?></td>
                    <td>
                        <?php
                    $pho=unserialize($fet['img']);
                    foreach($pho as $mg) {
                        ?>
                      <img src="<?php echo"../imgs/".$mg;?>" width="70" alt="image">
                      <?php
                    }
                    ?>
                    </td>
                    <td>
                    <a href="singleupdate.php?id=<?php echo $fet['imgid']?>" class="btn btn-primary mx-4 px-4">Update</a></td>
                    <td> <a href="singledelete.php?id=<?php echo $fet['imgid']?>" class="btn btn-danger mx-4 px-4">Delete</a>
                </td>
                </tr>
               </tbody>
               <?php
                }
               ?>
            </table>
        </div>
    </div>
</body>
</html>