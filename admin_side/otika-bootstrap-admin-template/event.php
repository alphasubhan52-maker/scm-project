<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
if (isset($_POST['submit'])) {
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
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
    $sql = "INSERT INTO `event`(`category`, `title`, `date`, `images`, `eventdescription`) VALUES  ('$category',
    '$title','$date','$im','$description')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
      foreach ($img_array as $key => $abc) {
        move_uploaded_file($_FILES['images']['tmp_name'][$key], "./image/" . $abc);
      }
      echo "<script>alert('Data has been inserted successfully!');</script>";
      echo "<script>
      setTimeout(function(){ window.location.href = './eventview.php';},1000);
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
                <h1>Event</h1>
                <a href="./eventview.php">
                  <button class="btn btn-primary">View Event</button>
                </a>
              </div>
            </div>
            <div class="card-body">
              <form class="form-row" action="" method="post" enctype="multipart/form-data">
                <div class="form-group col-12">
                  <label for="category">Event Category</label>
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
              <label for="date">Start Date</label>
              <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
              <input type="file" name="images[]" multiple class="form-control">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea type="text" class="form-control" id="description" name="description"
                placeholder="Enter Description here..."></textarea>
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