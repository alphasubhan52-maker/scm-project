<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
$uid = $_GET['id'];
$osql = "SELECT*FROM `designer` WHERE `id`='$uid'";
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
  $design = mysqli_real_escape_string($conn, $_POST['design']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);
  $company = mysqli_real_escape_string($conn, $_POST['company']);
  $color = mysqli_real_escape_string($conn, $_POST['color']);
  $tools = mysqli_real_escape_string($conn, $_POST['tools']);
  $content = mysqli_real_escape_string($conn, $_POST['content']);
  $number = mysqli_real_escape_string($conn, $_POST['number']);
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
        }
        if ($urun) {
          unlink("./image/" . $ofet['image']);
          $sql = "UPDATE `designer` SET `name`='$name', `lastname`='$lastname', `email`='$email', `dob`='$dob',
         `gender`='$gender', `phone`='$phone', `city`='$city',`experience`='$experience', `design`='$design', 
         `description`='$description',`company`='$company', `color`='$color', `tools`='$tools', `content`='$content',
         `number`='$number', `password`='$password', `confirmpassword`='$confirmpassword',
         `address`='$address', `image`='$third' WHERE `id`='$uid'";
          $run = mysqli_query($conn, $sql);
        }
        if ($run) {
          move_uploaded_file($_FILES['image']['tmp_name'], "./image/" . $third);
          echo "<script>alert('Data has been updated successfully!');</script>";
          echo "<script>
    setTimeout(function(){ window.location.href = './designerview.php';},1000);
    </script>";
        } else {
          echo "<script>alert('Data has not been updated successfully!');</script>";
        }
      }
    } else {
      $old = $ofet['image'];
      if ($lfet['email'] == $em) {
        $usql = "UPDATE `login` SET `name`='$name',`email`='$email', `password`='$password' WHERE `email`='$em'";
        $urun = mysqli_query($conn, $usql);
      }
      if ($urun) {
        $sql3 = "UPDATE `designer` SET `name`='$name', `lastname`='$lastname', `email`='$email', `dob`='$dob',
      `gender`='$gender', `phone`='$phone', `city`='$city',`experience`='$experience', `design`='$design', 
      `description`='$description',`company`='$company', `color`='$color', `tools`='$tools', `content`='$content',
      `number`='$number', `password`='$password', `confirmpassword`='$confirmpassword',
      `address`='$address', `image`='$old' WHERE `id`='$uid'";
        $run3 = mysqli_query($conn, $sql3);
      }
      if ($run3) {
        echo "<script>alert('Data has been updated with old picture!');</script>";
        echo "<script>
        setTimeout(function(){ window.location.href = './designerview.php';},1000);
        </script>";
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

          <div class="card w-75">
            <div class="card-header">
              <h4>Designer</h4>
            </div>
            <div class="card-body">
              <form class="form-row" action="" method="post" enctype="multipart/form-data">
                <?php
                $uid = $_GET['id'];
                $gsql = "SELECT*FROM `designer` WHERE `id`='$uid'";
                $grun = mysqli_query($conn, $gsql);
                $gfet = mysqli_fetch_assoc($grun);
                ?>
                <div class="form-group col-md-6">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Firstname" name="name"
                    value="<?php echo $gfet['name'] ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name"
                    name="lastname" value="<?php echo $gfet['lastname'] ?>">
                </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                value="<?php echo $gfet['email'] ?>">
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $gfet['dob'] ?>">
            </div>
            <div class="form-group">
              <p>Gender</p>
              <input type="radio" id="male" name="gender"
                <?php
                echo $gfet['gender'] ? 'checked' : "";
                ?>>
              <label for="male">Male</label>
              <input type="radio" id="female" name="gender"
                <?php
                echo $gfet['gender'] ? 'checked' : "";
                ?>>
              <label for="female">Female</label>
              <input type="radio" id="other" name="gender"
                <?php
                echo $gfet['gender'] ? 'checked' : "";
                ?>>
              <label for="other">Other</label>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone"
                placeholder="E.g +927324---" value="<?php echo $gfet['phone'] ?>">
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name"
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
              <label for="design">Ordered Design Off</label>
              <?php
              $sql5 = "SELECT*FROM `design`";
              $run5 = mysqli_query($conn, $sql5);
              if (mysqli_num_rows($run5) > 0) {
                echo '<select name="design" class="w-50 my-2 m6 form-control">';
                while ($fet4 = mysqli_fetch_assoc($run5)) {
                  if ($gfet['design'] == $fet4['designid']) {
                    $select = "selected";
                  } else {
                    $select = "";
                  }
                  echo "<option {$select} value='{$fet4['designid']}'> {$fet4['designname']} </option>";
                }
                echo "</select>";
              }
              ?>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description(optional)</label>
              <textarea type="text" class="form-control" id="description" name="description"><?php echo $gfet['description'] ?>
                    </textarea>
            </div>
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company" name="company"
                placeholder="Enter Company Name" value="<?php echo $gfet['company'] ?>">
            </div>
            <div class="form-group">
              <label for="color">Prefer Color</label>
              <input type="color" class="form-control" id="color" name="color" value="<?php echo $gfet['color'] ?>">
            </div>
            <div class="form-group">
              <label for="tools">Tools Worked On</label>
              <div class="tag-input-container">
                <div class="tag-list">
                </div>
                <input type="text" class="" id="tools" name="tools"
                  value="<?php echo $gfet['tools'] ?>" />
              </div>
            </div>
            <div class="form-group">
              <label for="content">Written Content To Be Added</label>
              <input type="text" class="form-control" id="content" name="content"
                placeholder="Enter Written Content" value="<?php echo $gfet['content'] ?>">
            </div>
            <div class="form-group">
              <label for="number">Number of Designs</label>
              <input type="number" class="form-control" id="number" name="number" placeholder="0"
                value="<?php echo $gfet['number'] ?>">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control col-4" placeholder="Enter Password"
                aria-describedby="button-addon" id="password" name="password" value="<?php echo $gfet['password'] ?>">
              <button class="btn" type="button" id="button-addon"
                onclick="togglePasswordVisibility('password')">
              </button>
            </div>
            <div class="form-group">
              <label for="confirmpassword">Confirm Password</label>
              <input type="password" class="form-control col-4" placeholder="Confirm Password"
                aria-describedby="button-addon" id="confirmpassword" name="confirmpassword"
                value="<?php echo $gfet['confirmpassword'] ?>">
              <button class="btn" type="button" id="button-addon"
                onclick="togglePasswordVisibility('confirmpassword')">
              </button>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea type="text" class="form-control" id="address" name="address">
                        <?php echo $gfet['address'] ?></textarea>
            </div>
            <div class="form-group">
              <label>Old Photo</label>
              <img src="<?php echo "./image/" . $gfet['image'] ?>" width="70" alt="image"><br>
              <label class="my-2">Select New Photo</label>
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
    // Initialize Tagify on the input field
    const input = document.querySelector('#tools');
    new Tagify(input, {
      whitelist: ["Adobe Photoshop", "Adobe Illustrator", "Canva", "Blender", "Vyond",
        "Microsoft Powerpoint", "Microsoft Word", "Microsoft Excel"
      ], // Example whitelist
      dropdown: {
        maxItems: 5, // maximum allowed rendered suggestions
        classname: "tags-look", // custom class for the dropdown menu
        enabled: 0, // show suggestions on focus
        closeOnSelect: false // keep dropdown open after selecting a suggestion
      }
    });
  </script>

</body>

</html>