<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
if (isset($_POST['submit'])) {
  $venue = mysqli_real_escape_string($conn, $_POST['venue']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $sql = "INSERT INTO `venue`(`venuename`, `description`) VALUES ('$venue','$description')";
  $run = mysqli_query($conn, $sql);
  if ($run) {
    echo "<script>alert('Data has been inserted successfully!');</script>";
    echo "<script>
    setTimeout(function(){ window.location.href = './venueview.php';},1000);
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
          <div class="card-header row">
            <div class="justify-content-center">
              <h2 style="font-family:sans-serif;color:black;">Venue Name</h2>
              <a href="./venueview.php">
                <button class="btn btn-primary">View Venue</button>
              </a>
            </div>
          </div>
          <div class="card-body">
            <form class="form-row" action="" method="post">
              <div class="form-group col-12">
                <label for="inputEmail4">Venue Name</label>
                <input type="text" class="form-control" id="inputEmail4" name="venue"
                  placeholder="Venue Name">
              </div>
              <div class="form-group col-12">
                <label for="inputPassword4">Description</label>
                <input type="text" class="form-control" id="inputPassword4" name="description"
                  placeholder="Description">
              </div>
          </div>
          <div class="px-4 py-2 col-4">
            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
          </div>
          </form>

        </div>
      </div>
    </div>
</div>
<?php
include('./include/footer.php');
?>