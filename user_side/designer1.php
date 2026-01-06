<?php
include('./connection.php');
include('./include/header.php');
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
    $role = "designer";
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
            move_uploaded_file($_FILES['image']['tmp_name'], "../admin_side/otika-bootstrap-admin-template/image/" . $third);
        }
        if ($msg == "Right") {
            $sql = "INSERT INTO `designer`(`name`, `lastname`, `email`, `dob`, `gender`, `phone`, `city`,`experience`,
      `design`, `description`,`company`, `color`, `tools`, `content`, `number`, `password`, `confirmpassword`,
       `address`, `image`) VALUES ('$name','$lastname','$email','$dob','$gender','$phone','$city','$experience',
       '$design','$description','$company','$color','$tools','$content','$number','$password','$confirmpassword',
       '$address','$third')";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                $lsql = "INSERT INTO `login`(`name`, `email`, `password`,`role`) VALUES ('$name','$email','$password','$role')";
                $lrun = mysqli_query($conn, $lsql);
                echo "<script>alert('Data has been inserted successfully!');</script>";
                //  header('Refresh:1,url=./designer.php');
                mysqli_close($conn);
            } else {
                echo "<script>alert('Data has not been inserted successfully!');</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
        <!-- Subpage title start -->
        <div class="page-banner-title">
            <div class="text-center">
                <h2>Designer</h2>
            </div>
        </div><!-- Subpage title end -->
    </div><!-- Page Banner end -->
    <section class="ts-contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title text-center">

                        Insert Designer
                    </h2>
                </div><!-- col end-->
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form id="contact-form" class="contact-form" action="" method="post" enctype="multipart/form-data">
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Firstname" name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dob">DOB</label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Gender</p>
                                    <input type="radio" id="male" value="Male" name="gender">
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" value="Female" name="gender">
                                    <label for="female">Female</label>
                                    <input type="radio" id="other" value="Other" name="gender">
                                    <label for="other">Other</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="E.g +927324---">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="experience">Experience</label>
                                    <select name="experience" id="experience" class="form-control h-50">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="design">Ordered Design Off</label>
                                    <select class="form-control h-50" id="design" name="design">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Description(optional)</label>
                                    <textarea type="text" class="form-control" id="description" name="description"
                                        placeholder="Enter Description here..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="color">Prefer Color</label>
                                    <input type="color" class="form-control" id="color" name="color">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tools">Tools Worked On</label>
                                    <div class="tag-input-container">
                                        <div class="tag-list"></div>
                                        <input type="text" class="" id="tools" placeholder="Add a tag..." name="tools" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="content">Written Content To Be Added</label>
                                    <input type="text" class="form-control" id="content" name="content" placeholder="Enter Written Content">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="number">Number of Designs</label>
                                    <input type="number" class="form-control" id="number" name="number" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="Enter Password"
                                            id="password" name="password">
                                        <button class="btn btn-secondary toggle-btn" type="button"
                                            onclick="togglePasswordVisibility('password')"><i class="fa-solid fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmpassword">Confirm Password</label>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                            id="confirmpassword" name="confirmpassword">
                                        <button class="btn btn-secondary toggle-btn" type="button"
                                            onclick="togglePasswordVisibility('confirmpassword')"><i class="fa-solid fa-eye"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address"
                                        placeholder="Enter Address here..."></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="file" name="image" class="form-control">
                            </div>


                        </div>
                        <div class="text-center"><br>
                            <button class="btn" type="submit" name="submit"> Submit</button>
                        </div>
                    </form><!-- Contact form end -->
                </div>
            </div>
        </div>
        <div class="speaker-shap">
            <img class="shap1" src="images/shap/home_schedule_memphis2.png" alt="">
        </div>
    </section>





    <?php
    include('./include/footer.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script>
        function togglePasswordVisibility(inputId) {
            const inputField = document.getElementById(inputId);
            if (inputField.type === "password") {
                inputField.type = "text";
            } else {
                inputField.type = "password";
            }
        }
        //Initialize Tagify on the input field
        // const input = document.querySelector('#tools');
        // const tagify = new Tagify(input, {
        //     whitelist: [
        //         "Adobe Photoshop",
        //         "Adobe Illustrator",
        //         "Canva",
        //         "Blender",
        //         "Vyond",
        //         "Microsoft Powerpoint",
        //         "Microsoft Word",
        //         "Microsoft Excel"
        //     ],
        //     dropdown: {
        //         maxItems: 5,
        //         classname: "tags-look",
        //         enabled: 0,
        //         closeOnSelect: false
        //     }
        // });
        const toolsInput = document.querySelector('#tools');

        new Tagify(toolsInput, {
            whitelist: ["Adobe Photoshop", "Adobe Illustrator", "Canva",
                "Blender",
                "Vyond",
                "Microsoft Powerpoint",
                "Microsoft Word",
                "Microsoft Excel"
            ], // Example data
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