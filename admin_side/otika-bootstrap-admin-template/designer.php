<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
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
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $first = $_FILES['image']['name'];
  if ($password == $confirmpassword) {
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
      move_uploaded_file($_FILES['image']['tmp_name'], "./image/" . $third);
    }
    if ($msg == "Right") {
      $sql = "INSERT INTO `designer`(`name`, `lastname`, `email`, `dob`, `gender`, `phone`, `city`,`experience`,
    `design`, `description`,`company`, `color`, `tools`, `content`, `number`, `password`, `confirmpassword`,
     `address`, `image`) VALUES ('$name','$lastname','$email','$dob','$gender','$phone','$city','$experience',
     '$design','$description','$company','$color','$tools','$content','$number','$password','$confirmpassword',
     '$address','$third')";
      $run = mysqli_query($conn, $sql);
      if ($run) {
        echo "<script>alert('Data has been inserted successfully!');</script>";
        echo "<script>
    setTimeout(function(){ window.location.href = './designerview.php';},1000);
    </script>";
      } else {
        echo "<script>alert('Data has not been inserted successfully!');</script>";
      }
      if ($run) {
        $lsql = "INSERT INTO `login`(`email`,`password`,`role`) VALUES ('$email','$password','$role')";
        $lrun = mysqli_query($conn, $lsql);
        mysqli_close($conn);
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
            <div class="card-header row">
              <div class="justify-content-center">
                <h1>Designer</h1>
                <a href="./designerview.php">
                  <button class="btn btn-primary">View Designer</button>
                </a>
              </div>
            </div>
            <div class="card-body">
              <form class="form-row" action="" method="post" enctype="multipart/form-data">
                <div class="form-group col-md-6">
                  <label for="name">First Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter Firstname" name="name">
                </div>
                <div class="form-group col-md-6">
                  <label for="lastname">Last Name</label>
                  <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
                </div>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <label for="dob">DOB</label>
              <input type="date" class="form-control" id="dob" name="dob">
            </div>
            <div class="form-group">
              <p>Gender</p>
              <input type="radio" id="male" value="Male" name="gender">
              <label for="male">Male</label>
              <input type="radio" id="female" value="Female" name="gender">
              <label for="female">Female</label>
              <input type="radio" id="other" value="Other" name="gender">
              <label for="other">Other</label>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="E.g +927324---">
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name">
            </div>
            <div class="form-group">
              <label for="experience">Experience</label>
              <select name="experience" id="experience" class="form-control">
                <option value="selected">---Select Experience---</option>
                <?php
                $sql1 = "SELECT*FROM `experience`";
                $run1 = mysqli_query($conn, $sql1);
                while ($fet1 = mysqli_fetch_assoc($run1)) {
                ?>
                  <option value="<?php echo $fet1['expid'] ?>"><?php echo $fet1['experienceyear'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="design">Ordered Design Off</label>
              <select class="form-control" id="design" name="design">
                <option value="selected">---Select Design---</option>
                <?php
                $sql2 = "SELECT*FROM `design`";
                $run2 = mysqli_query($conn, $sql2);
                while ($fet2 = mysqli_fetch_assoc($run2)) {
                ?>
                  <option value="<?php echo $fet2['designid'] ?>"><?php echo $fet2['designname'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="description">Description(optional)</label>
              <textarea type="text" class="form-control" id="description" name="description"
                placeholder="Enter Description here..."></textarea>
            </div>
            <div class="form-group">
              <label for="company">Company</label>
              <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company Name">
            </div>
            <div class="form-group">
              <label for="color">Prefer Color</label>
              <input type="color" class="form-control" id="color" name="color">
            </div>
            <div class="form-group">
              <label for="tools">Tools Worked On</label>
              <div class="tag-input-container">
                <div class="tag-list">
                </div>
                <input type="text" class="" id="tools" placeholder="Add a tag..." name="tools" />
              </div>
            </div>
            <div class="form-group">
              <label for="content">Written Content To Be Added</label>
              <input type="text" class="form-control" id="content" name="content" placeholder="Enter Written Content">
            </div>
            <div class="form-group">
              <label for="number">Number of Designs</label>
              <input type="number" class="form-control" id="number" name="number" placeholder="0">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control col-4" placeholder="Enter Password"
                aria-describedby="button-addon" id="password" name="password">
              <button class="btn" type="button" id="button-addon"
                onclick="togglePasswordVisibility('password')">
              </button>
            </div>
            <div>
              <input value="designer" type="hidden" name="role">
            </div>
            <div class="form-group">
              <label for="confirmpassword">Confirm Password</label>
              <input type="password" class="form-control col-4" placeholder="Confirm Password"
                aria-describedby="button-addon" id="confirmpassword" name="confirmpassword">
              <button class="btn" type="button" id="button-addon"
                onclick="togglePasswordVisibility('confirmpassword')">
              </button>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea type="text" class="form-control" id="address" name="address"
                placeholder="Enter Address here..."></textarea>
            </div>
            <div class="form-group">
              <input type="file" name="image" class="form-control">
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