<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
$uid = $_GET['id'];
$gsql = "SELECT*FROM `news` WHERE `newsid`='$uid'";
$grun = mysqli_query($conn, $gsql);
$gfet = mysqli_fetch_assoc($grun);
if (isset($_POST['submit'])) {
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  $first = $_FILES['images']['name'];
  $img_array = array();
  if (!empty($first)) {
    foreach ($first as $one) {
      $exe = strtolower(pathinfo($one, PATHINFO_EXTENSION));
      $ext = array('jpg', 'jpeg', 'png');
      if (in_array($exe, $ext)) {
        $sec = rand(1, 99999);
        $third = $sec . "." . $exe;
        $img_array[] = $third;
        $msg = "Right";
      } else {
        $msg = "NotRight";
      }
    }
  }
  if ($msg == "Right") {
    $ph = unserialize($gfet['images']);
    foreach ($ph as $img) {
      unlink("./image/" . $img);
    }
  }
  if ($msg == "Right") {
    $im = serialize($img_array);
    $sql = "UPDATE `news` SET `category`='$category',`title`='$title',`images`='$im',`newsdescription`='$description',`status`='$status' WHERE `newsid`='$uid'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
      foreach ($img_array as $key => $abc) {
        move_uploaded_file($_FILES['images']['tmp_name'][$key], "./image/" . $abc);
      }
      echo "<script>alert('Data has been Updated successfully!');</script>";
      echo "<script>
      setTimeout(function(){ window.location.href = './newsview.php';},1000);
      </script>";
    }
  } else {
    $old = $gfet['images'];
    $sql2 = "UPDATE `news` SET `category`='$category',`title`='$title',`images`='$old',`newsdescription`='$description',`status`='$status' WHERE `newsid`='$uid'";
    $run2 = mysqli_query($conn, $sql2);
    if ($run2) {
      echo "<script>alert('Data has been Updated with old pic!');</script>";
      echo "<script>
      setTimeout(function(){ window.location.href = './newsview.php';},1000);
      </script>";
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
                  <?php
                  $sql1 = "SELECT*FROM `categoryname`";
                  $run1 = mysqli_query($conn, $sql1);
                  if (mysqli_num_rows($run1) > 0) {
                    echo '<select name="category" class="w-50 my-2 m6 form-control">';
                    while ($fet1 = mysqli_fetch_assoc($run1)) {
                      if ($gfet['category'] == $fet1['id']) {
                        $select = "selected";
                      } else {
                        $select = "";
                      }
                      echo "<option {$select} value='{$fet1['id']}'> {$fet1['name']} </option>";
                    }
                    echo "</select>";
                  }
                  ?>
                  </select>
                </div>
            </div>
            <div class="form-group">
              <label for="title">News Title</label>
              <input type="text" class="form-control" id="title" name="title"
                value="<?php echo $gfet['title'] ?>">
            </div>
            <div class="form-group">
              <label for="old">Old Photos</label>
              <?php
              $pho = unserialize($gfet['images']);
              foreach ($pho as $mg) {
              ?>
                <img src="<?php echo "./image/" . $mg; ?>" width="70" alt="image">
              <?php
              }
              ?>
            </div>
            <div class="form-group">
              <label for="new">Select New Photos</label>
              <input id="new" type="file" name="images[]" multiple class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea type="text" class="form-control" id="description" name="description">
                       <?php echo $gfet['newsdescription'] ?></textarea>
            </div>
            <div class="form-group">
              <p>Status</p>
              <input type="radio" id="on" value="ON" name="status"
                <?php
                echo $gfet['status'] ? 'checked' : "";
                ?>>
              <label for="on">
                <h6>ON</h6>
              </label>
              <input type="radio" id="off" value="OFF" name="status"
                <?php
                echo $gfet['status'] ? 'checked' : "";
                ?>>
              <label for="off">
                <h6>OFF</h6>
              </label>
            </div>
            <div>
              <input type="submit" name="submit" value="Update" placeholder="Submit" class="btn btn-primary mb-3 mx-3">
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