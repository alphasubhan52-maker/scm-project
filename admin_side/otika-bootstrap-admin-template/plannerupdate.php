<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');

$uid = $_GET['id'];
$osql = "SELECT*FROM `planner`INNER JOIN `experience` ON planner.experience=experience.expid WHERE `id`='$uid'";
$orun = mysqli_query($conn, $osql);
$ofet = mysqli_fetch_assoc($orun);
$em = $ofet['email'];
$lsql = "SELECT*FROM `login` WHERE `email`='$em'";
$lrun = mysqli_query($conn, $lsql);
$lfet = mysqli_fetch_assoc($lrun);
if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $experience = mysqli_real_escape_string($conn, $_POST['experience']);
  $achievements = mysqli_real_escape_string($conn, $_POST['achievements']);
  $skills = mysqli_real_escape_string($conn, $_POST['skills']);
  $partners = mysqli_real_escape_string($conn, $_POST['partners']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $first = $_FILES['image']['name'];
  if ($password == $confirmpassword) {
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
        if ($lfet['email'] == $em) {
          $usql = "UPDATE `login` SET `name`='$name',`email`='$email', `password`='$password' WHERE `email`='$em'";
          $urun = mysqli_query($conn, $usql);
          if ($urun) {
            unlink("./image/" . $ofet['image']);
            $sql = "UPDATE `planner` SET `name`='$name',`lastname`='$lastname',`email`='$email',
         `dob`='$dob',`gender`='$gender',`phone`='$phone',`city`='$city',`experience`='$experience',
         `achievements`='$achievements',`skills`='$skills',`partners`='$partners',`password`='$password',
         `confirmpassword`='$confirmpassword',`address`='$address',`image`='$third' WHERE `id`='$uid'";
            $run = mysqli_query($conn, $sql);
          }
          if ($run) {
            move_uploaded_file($_FILES['image']['tmp_name'], "./image/" . $third);
            echo "<script>alert('Data has been updated successfully!');</script>";
            echo "<script>
            setTimeout(function(){ window.location.href = './plannerview.php';},1000);
            </script>";
          } else {
            echo "<script>alert('Data has not been updated successfully!');</script>";
          }
        }
      }
    } else {
      if ($lfet['email'] == $em) {
        $old = $ofet['image'];
        $usql = "UPDATE `login` SET `name`='$name',`email`='$email', `password`='$password' WHERE `email`='$em'";
        $urun = mysqli_query($conn, $usql);
        if ($urun) {
          $sql3 = "UPDATE `planner` SET `name`='$name',`lastname`='$lastname',`email`='$email',
          `dob`='$dob',`gender`='$gender',`phone`='$phone',`city`='$city',`experience`='$experience',
          `achievements`='$achievements',`skills`='$skills',`partners`='$partners',`password`='$password',
          `confirmpassword`='$confirmpassword',`address`='$address',`image`='$old' WHERE `id`='$uid'";
          $run3 = mysqli_query($conn, $sql3);
        }
        if ($run3) {
          echo "<script>alert('Data has been updated with old picture!');</script>";
          echo "<script>
          setTimeout(function(){ window.location.href = './plannerview.php';},1000);
          </script>";
        }
      }
    }
  } else {
    echo "<script>alert('Enter same password in password nd confirm password!');</script>";
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

          <div class="card w-75 px-4">
            <div class="card-header">
              <h4>Planner</h4>
            </div>
            <div class="card-body">
              <form class="form-row" action="" method="post" enctype="multipart/form-data">
                <?php
                $uid = $_GET['id'];
                $gsql = "SELECT*FROM `planner` WHERE `id`='$uid'";
                $grun = mysqli_query($conn, $gsql);
                $gfet = mysqli_fetch_assoc($grun);
                ?>
                <div class="form-group col-md-6">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo $gfet['name'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname"
                    value="<?php echo $gfet['lastname'] ?>">
                </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                value="<?php echo $gfet['email'] ?>">
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="date" class="form-control" id="dob" name="dob"
                value="<?php echo $gfet['dob'] ?>">
            </div>
            <div class="form-group">
              <p>Gender</p>
              <input type="radio" id="male" name="gender" value="Male"
                <?php
                echo $gfet['gender'] ? 'checked' : ""
                ?>>
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender" value="Female"
                <?php
                echo $gfet['gender'] ? 'checked' : ""
                ?>>
              <label for="female">Female</label>
              <input type="radio" id="other" name="gender" value="Other"
                <?php
                echo $gfet['gender'] ? 'checked' : ""
                ?>>
              <label for="other">Other</label>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone"
                value="<?php echo $gfet['phone'] ?>">
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city"
                value="<?php echo $gfet['city'] ?>">
            </div>
            <div class="form-group">
              <label for="experience">Experience</label>
              <?php
              $sql1 = "SELECT*FROM `experience`";
              $run1 = mysqli_query($conn, $sql1);
              if (mysqli_num_rows($run1) > 0) {
                echo '<select name="experience" class="w-50 my-2 m6 form-control">';
                while ($fet1 = mysqli_fetch_assoc($run1)) {
                  if ($gfet['experience'] == $fet1['expid']) {
                    $select = "selected";
                  } else {
                    $select = "";
                  }
                  echo "<option {$select} value='{$fet1['expid']}'> {$fet1['experienceyear']} </option>";
                }
                echo "</select>";
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="achievements">Achievements</label>
              <div class="tag-input-container">
                <div class="tag-list">
                </div>
                <input type="text" id="achievements" value="<?php echo $gfet['achievements'] ?>"
                  name="achievements" class="form-control" />
              </div>
              <div class="form-group">
                <label for="skills">Skills</label>
                <div class="tag-input-container">
                  <div class="tag-list">
                  </div>
                  <input type="text" id="skills" value="<?php echo $gfet['skills'] ?>" name="skills"
                    class="form-control" />
                </div>
                <div class="form-group">
                  <label for="partners">Partners</label>
                  <div class="tag-input-container">
                    <div class="tag-list">
                    </div>
                    <input type="text" id="partners" value="<?php echo $gfet['partners'] ?>" name="partners"
                      class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control col-4" value="<?php echo $gfet['password'] ?>"
                    aria-describedby="button-addon" id="password" name="password">
                  <button class="btn" type="button" id="button-addon"
                    onclick="togglePasswordVisibility('password')">
                  </button>
                </div>
                <div class="form-group">
                  <label for="confirmpassword">Confirm Password</label>
                  <input type="password" class="form-control col-4" value="<?php echo $gfet['confirmpassword'] ?>"
                    aria-describedby="button-addon" id="confirmpassword" name="confirmpassword">
                  <button class="btn" type="button" id="button-addon"
                    onclick="togglePasswordVisibility('confirmpassword')">
                  </button>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea type="text" class="form-control" id="address" name="address"
                    placeholder="Enter Address here...">
                       <?php echo $gfet['address'] ?></textarea>
                </div>
                <div class="form-group">
                  <label>Old Photo</label>
                  <img src="<?php echo "./image/" . $gfet['image'] ?>" width="70" alt="image">
                </div>
                <div class="form-group">
                  <label>Select New Photo</label>
                  <input type="file" name="image" class="form-control">
                </div>
                <div>
                  <button type="submit" name="submit" class="btn btn-primary mb-3 mx-3">Update</button>
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

      <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
      <script>
        // Initialize Tagify on each input field
        const achievementsInput = document.querySelector('#achievements');
        const skillsInput = document.querySelector('#skills');
        const partnersInput = document.querySelector('#partners');

        new Tagify(achievementsInput, {
          whitelist: ["Birthday Party", "Conference managed", "Wedding"], // Example data
          dropdown: {
            maxItems: 5,
            classname: "tags-look",
            enabled: 0,
            closeOnSelect: false
          }
        });

        new Tagify(skillsInput, {
          whitelist: ["Creativity", "Problem Solving", "Time Management"], // Example data
          dropdown: {
            maxItems: 5,
            classname: "tags-look",
            enabled: 0,
            closeOnSelect: false
          }
        });

        new Tagify(partnersInput, {
          whitelist: ["Lorem", "Ipsum", "Opeg"], // Example data
          dropdown: {
            maxItems: 5,
            classname: "tags-look",
            enabled: 0,
            closeOnSelect: false
          }
        });
      </script>


</body>

</html>