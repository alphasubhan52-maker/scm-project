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
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  // $achievements=mysqli_real_escape_string($conn,$_POST['achievements']);
  // $skills=mysqli_real_escape_string($conn,$_POST['skills']);
  // $partners=mysqli_real_escape_string($conn,$_POST['partners']);
  // $ach=serialize($achievements);
  // $ski=serialize($skills);
  // $part=serialize($partners);
  $achievements = isset($_POST['achievements']) ? $_POST['achievements'] : '';
  $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
  $partners = isset($_POST['partners']) ? $_POST['partners'] : '';

  // Example: convert comma-separated values into JSON arrays (or leave as strings if preferred)
  $achievementsArray = explode(',', $achievements); // splitting based on commas
  $skillsArray = explode(',', $skills);
  $partnersArray = explode(',', $partners);

  // Convert arrays to JSON for storage in the database
  $ach = json_encode(array_map('trim', $achievementsArray)); // Trim values
  $ski = json_encode(array_map('trim', $skillsArray));
  $part = json_encode(array_map('trim', $partnersArray));
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
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
      $sql = "INSERT INTO `planner`(`name`, `lastname`, `email`, `dob`, `gender`, `phone`, `city`, `experience`,
     `achievements`, `skills`, `partners`, `password`, `confirmpassword`, `address`, `image`) VALUES('$name',
     '$lastname','$email','$dob','$gender','$phone','$city','$experience','$ach','$ski','$part',
     '$password','$confirmpassword','$address','$third')";
      $run = mysqli_query($conn, $sql);
      if ($run) {
        echo "<script>alert('Data has been inserted successfully!');</script>";
        echo "<script>
        setTimeout(function(){ window.location.href = './plannerview.php';},1000);
        </script>";
      } else {
        echo "<script>alert('Data has not been inserted successfully!');</script>";
      }
    }
    if ($run) {
      $lsql = "INSERT INTO `login`(`name`,`email`,`password`,`role`) VALUES ('$name','$email','$password','$role')";
      $lrun = mysqli_query($conn, $lsql);
      mysqli_close($conn);
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
            <div class="card-header row">
              <div class="justify-content-center">
                <h1>Planner</h1>
                <a href="./plannerview.php">
                  <button class="btn btn-primary">View Planner</button>
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
              <input type="radio" id="other" value="other" name="gender">
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
              <label for="achievements">Achievements</label>
              <div class="tag-input-container">
                <div class="tag-list">
                </div>
                <input type="text" id="achievements" placeholder="Add achievements..."
                  name="achievements" class="form-control" />
              </div>
              <div class="form-group">
                <label for="skills">Skills</label>
                <div class="tag-input-container">
                  <div class="tag-list">
                  </div>
                  <input type="text" id="skills" placeholder="Add skills..." name="skills"
                    class="form-control" />
                </div>
                <div class="form-group">
                  <label for="partners">Partners</label>
                  <div class="tag-input-container">
                    <div class="tag-list">
                    </div>
                    <input type="text" id="partners" placeholder="Add planners..." name="partners"
                      class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control col-4" placeholder="Enter Password"
                    aria-describedby="button-addon" id="password" name="password">
                  <button class="btn" type="button" id="button-addon"
                    onclick="togglePasswordVisibility('password')">
                  </button>
                </div>
                <div class="form-group">
                  <label for="confirmpassword">Confirm Password</label>
                  <input type="password" class="form-control col-4" placeholder="Confirm Password"
                    aria-describedby="button-addon" id="confirmpassword" name="confirmpassword">
                  <button class="btn" type="button" id="button-addon"
                    onclick="togglePasswordVisibility('confirmpassword')">
                  </button>
                </div>
                <div>
                  <input value="planner" type="hidden" name="role">
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