<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
if(isset($_POST['submit'])){
  $uid=$_GET['id'];
  $name=mysqli_real_escape_string($conn,$_POST['name']);
  $description=mysqli_real_escape_string($conn,$_POST['description']);
  $sql="UPDATE`categoryname` SET `name`='$name', `description`='$description' WHERE `id`='$uid'";
  $run=mysqli_query($conn,$sql);
  if($run){
    echo "<script>alert('Data has been updated successfully!');</script>";
    echo "<script>
    setTimeout(function(){ window.location.href = './categoryview.php';},1000);
    </script>";
    mysqli_close($conn);
  }
}
?>
  <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row justify-content-center">

              <div class="card">
                <div class="card-header">
                  <h4>Category Name</h4>
                </div>
                <div class="card-body">
                  <form class="form-row" action="" method="post">
                    <?php
                    $uid=$_GET['id'];
                    $sql1="SELECT*FROM `categoryname` WHERE `id`='$uid'";
                    $run1=mysqli_query($conn,$sql1);
                    while($fet1=mysqli_fetch_assoc($run1)){
                    ?>
                    <div class="form-group col-12">
                      <label for="name">CategoryName</label>
                      <input type="text" class="form-control" id="name" name="name"
                       value="<?php echo $fet1['name']?>">
                    </div>
                    <div class="form-group col-12">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" name="description"
                      value="<?php echo $fet1['description']?>">
                    </div>
                    </div>
                    <div class="px-4 py-2 col-4">
                    <button type="submit" name="submit" class="btn btn-primary mb-3 mx-3">Update</button>
                    </div>
                    <?php
                    }
                    ?>
                  </form>
                 
              </div>
            </div>
          </div>
      </div>
<?php
include('./include/footer.php');
?>