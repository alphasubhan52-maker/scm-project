<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
if (isset($_POST['submit'])) {
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $img = $_FILES['images']['name'];
  $img_array = array();
  foreach ($img as $pic) {
    $exe = pathinfo($pic, PATHINFO_EXTENSION);
    $e = strtolower($exe);
    $extension = array('jpg', 'jpeg', 'png');
    if (in_array($e, $extension)) {
      $picname = rand(1, 99999);
      $pic2 = $picname . "." . $e;
      ($img_array[] = $pic2);
      $msg = "Right";
    } else {
      $msg = "Not Right";
    }
  }
  if ($msg == "Right") {
    $im = serialize($img_array);
    $sql = "INSERT INTO `news`(`category`, `title`, `images`, `newsdescription`, `status`) VALUES ('$category',
    '$title','$im','$description','$status')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
      foreach ($img_array as $key => $abc) {
        move_uploaded_file($_FILES['images']['tmp_name'][$key], "./image/" . $abc);
      }
      echo "<script>alert('Data has been inserted successfully!');</script>";
      echo "<script>
      setTimeout(function(){ window.location.href = './newsview.php';},1000);
      </script>";
    } else {
      echo "<script>alert('Data has not been inserted !');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tag Input</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="Font/css/all.min.css">
  <!-- Tagify CSS -->
  <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
</head>
<style>
</style>

<body>


  <div class="main-content">
    <section class="section">
      <div class="section-body">
        <div class="row justify-content-center">

          <div class="card w-75">
            <div class="card-header row">
              <div class="justify-content-center">
                <h1>News</h1>
                <a href="./newsview.php">
                  <button class="btn btn-primary">View News</button>
                </a>
              </div>
            </div>
            <div class="card-body">
              <form class="form-row" action="" method="post" enctype="multipart/form-data">
                <div class="form-group col-12">
                  <label for="category">News Category</label>
                  <select name="category" id="category" class="form-control">
                    <option value="selected">---Select Category---</option>
                    <?php
                    $sql1 = "SELECT*FROM `categoryname`";
                    $run1 = mysqli_query($conn, $sql1);
                    while ($fet1 = mysqli_fetch_assoc($run1)) {
                    ?>
                      <option value="<?php echo $fet1['id'] ?>"><?php echo $fet1['name'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
            </div>
            <div class="form-group">
              <label for="title">News Title</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <input type="file" name="images[]" multiple class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea type="text" class="form-control" id="description" name="description"
                placeholder="Enter Description here..."></textarea>
            </div>
            <div class="form-group">
              <p>Status</p>
              <input type="radio" id="on" value="ON" name="status">
              <label for="on">
                <h6>ON</h6>
              </label>
              <input type="radio" id="off" value="OFF" name="status">
              <label for="off">
                <h6>OFF</h6>
              </label>
            </div>
            <div>
              <input type="submit" name="submit" placeholder="Submit" class="btn btn-primary mb-3 mx-3">
            </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  </div>
  <?php
  include('./include/footer.php');
  ?>

</body>

</html>