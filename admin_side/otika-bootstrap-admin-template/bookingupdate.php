<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
$uid = $_GET['id'];
$gsql = "SELECT*FROM `booking` WHERE `bookingid`='$uid'";
$grun = mysqli_query($conn, $gsql);
$gfet = mysqli_fetch_assoc($grun);
if (isset($_POST['submit'])) {
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $clientname = mysqli_real_escape_string($conn, $_POST['clientname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $contact = mysqli_real_escape_string($conn, $_POST['contact']);
  $occasion = mysqli_real_escape_string($conn, $_POST['occasion']);
  $date = mysqli_real_escape_string($conn, $_POST['date']);
  $time = mysqli_real_escape_string($conn, $_POST['time']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $state = mysqli_real_escape_string($conn, $_POST['state']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $seats = mysqli_real_escape_string($conn, $_POST['seats']);
  $venue = mysqli_real_escape_string($conn, $_POST['venue']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $type = mysqli_real_escape_string($conn, $_POST['type']);
  $first = $_FILES['image']['name'];
  if (!empty($first)) {
    $exe = pathinfo($first, PATHINFO_EXTENSION);
    $e = strtolower($exe);
    $ext = array("jpg", "png", "jpeg");
    if (in_array($e, $ext)) {
      $sec = rand(1, 99999);
      $third = $sec . "." . $e;
      $msg = "Right";
    } else {
      $msg = "NotRight";
    }
    if ($msg == "Right") {
      unlink("./image/" . $ofet['image']);
      $sql = "UPDATE `booking` SET `category`='$category',`clientname`='$clientname',
      `email`='$email',`contact`='$contact',`title`='$occasion',`date`='$date',`time`='$time',
      `country`='$country',`state`='$state',`city`='$city',`seats`='$seats',`venue`='$venue',
      `description`='$description',`type`='$type',`image`='$third' WHERE `bookingid`='$uid'";
      $run = mysqli_query($conn, $sql);
      if ($run) {
        move_uploaded_file($_FILES['image']['tmp_name'], "./image/" . $third);
        echo "<script>alert('Data has been Updated successfully!');</script>";
        echo "<script>
    setTimeout(function(){ window.location.href = './bookingview.php';},1000);
    </script>";
      } else {
        echo "<script>alert('Data has not been Updated successfully!');</script>";
      }
    }
  } else {
    $old = $gfet['image'];
    $osql = "UPDATE `booking` SET `category`='$category',`clientname`='$clientname',
    `email`='$email',`contact`='$contact',`title`='$occasion',`date`='$date',`time`='$time',
    `country`='$country',`state`='$state',`city`='$city',`seats`='$seats',`venue`='$venue',
    `description`='$description',`type`='$type',`image`='$old' WHERE `bookingid`='$uid'";
    $orun = mysqli_query($conn, $osql);
    if ($orun) {
      echo "<script>alert('Data has been Updated with old pic !');</script>";
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
                <h1>Booking</h1>
                <a href="./bookingview.php">
                  <button class="btn btn-primary">View Booking</button>
                </a>
              </div>
            </div>
            <div class="card-body">
              <form class="form-row" action="" method="post" enctype="multipart/form-data">
                <div class="form-group col-12">
                  <label for="category">Event Category</label>
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
              <label for="name">Client NAME</label>
              <input type="text" class="form-control" id="name" name="clientname"
                value="<?php echo $gfet['clientname'] ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                value="<?php echo $gfet['email'] ?>">
            </div>
            <div class="form-group">
              <label for="contact">Contact</label>
              <input type="text" class="form-control" id="contact" name="contact"
                value="<?php echo $gfet['contact'] ?>">
            </div>
            <div class="form-group">
              <label for="occasion">Occasion Title</label>
              <input type="text" class="form-control" id="occasion" name="occasion"
                value="<?php echo $gfet['title'] ?>">
            </div>
            <div class="form-group">
              <label for="date">Occasion Start Date</label>
              <input type="date" class="form-control" id="date" name="date"
                value="<?php echo $gfet['date'] ?>">
            </div>
            <div class="form-group">
              <label for="time">Occasion Start Time</label>
              <input type="time" class="form-control" id="time" name="time"
                value="<?php echo $gfet['time'] ?>">
            </div>
            <div class="row">
              <div class="form-group col-4">
                <label for="country">Country</label>
                <?php
                $sql2 = "SELECT*FROM `country`";
                $run2 = mysqli_query($conn, $sql2);
                if (mysqli_num_rows($run2) > 0) {
                  echo '<select name="country" class="w-50 my-2 m6 form-control">';
                  while ($fet2 = mysqli_fetch_assoc($run2)) {
                    if ($gfet['country'] == $fet2['contid']) {
                      $select = "selected";
                    } else {
                      $select = "";
                    }
                    echo "<option {$select} value='{$fet2['contid']}'> {$fet2['contname']} </option>";
                  }
                  echo "</select>";
                }
                ?>
                </select>
              </div>
              <div class="form-group col-4">
                <label for="state">State</label>
                <?php
                $sql3 = "SELECT*FROM `state`";
                $run3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($run3) > 0) {
                  echo '<select name="state" class="w-50 my-2 m6 form-control">';
                  while ($fet3 = mysqli_fetch_assoc($run3)) {
                    if ($gfet['state'] == $fet3['stateid']) {
                      $select = "selected";
                    } else {
                      $select = "";
                    }
                    echo "<option {$select} value='{$fet3['stateid']}'> {$fet3['statename']} </option>";
                  }
                  echo "</select>";
                }
                ?>
                </select>
              </div>
              <div class="form-group col-4">
                <label for="city">City</label>
                <?php
                $sql4 = "SELECT*FROM `city`";
                $run4 = mysqli_query($conn, $sql4);
                if (mysqli_num_rows($run4) > 0) {
                  echo '<select name="city" class="w-50 my-2 m6 form-control">';
                  while ($fet4 = mysqli_fetch_assoc($run4)) {
                    if ($gfet['city'] == $fet4['id']) {
                      $select = "selected";
                    } else {
                      $select = "";
                    }
                    echo "<option {$select} value='{$fet4['id']}'> {$fet4['cityname']} </option>";
                  }
                  echo "</select>";
                }
                ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="seats">Number of Seats</label>
              <input type="number" class="form-control" id="seats" name="seats"
                value="<?php echo $gfet['seats'] ?>">
            </div>
            <div class="form-group">
              <label for="venue">Select Venue</label>
              <?php
              $sql5 = "SELECT*FROM `venue`";
              $run5 = mysqli_query($conn, $sql5);
              if (mysqli_num_rows($run5) > 0) {
                echo '<select name="venue" class="w-50 my-2 m6 form-control">';
                while ($fet5 = mysqli_fetch_assoc($run5)) {
                  if ($gfet['venue'] == $fet5['id']) {
                    $select = "selected";
                  } else {
                    $select = "";
                  }
                  echo "<option {$select} value='{$fet5['id']}'> {$fet5['venuename']} </option>";
                }
                echo "</select>";
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Occasion Description</label>
              <textarea type="text" class="form-control" id="description" name="description"><?php
                                                                                              echo $gfet['description'];
                                                                                              ?></textarea>
            </div>
            <div class="form-group">
              <p>Occasion Type</p>
              <input type="radio" id="public" value="Public" name="type"
                <?php
                echo $gfet['type'] ? 'checked' : "";
                ?>>
              <label for="public">
                <h6>Public</h6>
              </label>
              <input type="radio" id="private" value="Private" name="type"
                <?php
                echo $gfet['type'] ? 'checked' : "";
                ?>>
              <label for="private">
                <h6>Private</h6>
              </label>
            </div>
            <div class="form-group">
              <label>Old Photo</label>
              <img src="<?php echo "./image/" . $gfet['image'] ?>" width="70" alt="image"><br>
              <label class="my-2">Select New Photo</label>
              <input type="file" name="image" class="form-control">
            </div>
            <div>
              <input type="submit" name="submit" placeholder="Update" value="Update" class="btn btn-primary mb-3 mx-3">
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