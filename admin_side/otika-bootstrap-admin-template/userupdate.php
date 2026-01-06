<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
if (isset($_POST['submit'])) {
    // ----------------------------------------------------------------
    $uid = $_GET['logid'];
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $userrole = mysqli_real_escape_string($conn, $_POST['role']);
    $sql = "UPDATE `login` SET `name`='$fullname',`email`='$email',`password`='$password',`role`='$userrole' WHERE `loginid`='$uid'";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        echo "<script>alert('Data has been updated successfully!');</script>";
        echo "<script>
        setTimeout(function(){ window.location.href = './userview.php';},1000);
        </script>";
    } else {
        echo "<script>alert('Data has not been updated!');</script>";
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
                                <h1>User</h1>
                                <a href="./userview.php">
                                    <button class="btn btn-primary">View User</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-row" action="" method="post" enctype="multipart/form-data">
                                <?php
                                $uid = $_GET['logid'];
                                $gsql = "SELECT*FROM `login` WHERE `loginid`='$uid'";
                                $grun = mysqli_query($conn, $gsql);
                                $gfet = mysqli_fetch_assoc($grun);
                                ?>
                                <div class="form-group col-12">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" id="fullname" name="fullname"
                                        value="<?php echo $gfet['name'] ?>">
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $gfet['email'] ?>">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" placeholder="Enter Password"
                                                id="password" name="password" value="<?php echo $gfet['password'] ?>">
                                            <button class="btn btn-secondary toggle-btn" type="button"
                                                onclick="togglePasswordVisibility('password')"><i class="fa-solid fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Select Role</label><br>
                                    <select class="form-control" name="role">
                                        <option type="selected"><?php echo $gfet['role'] ?></option>
                                        <option name="role" value="admin">Admin</option>
                                        <option name="role" value="planner">Planner</option>
                                        <option name="role" value="designer">Designer</option>
                                        <option name="role" value="volunteer">Volunteer</option>
                                        <option name="role" value="client">Client</option>
                                    </select>
                                </div>
                        </div>


                        <div>
                            <input type="submit" name="submit" placeholder="Update" class="btn btn-primary mb-3 mx-3">
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
        function togglePasswordVisibility(inputId) {
            const inputField = document.getElementById(inputId);
            if (inputField.type === "password") {
                inputField.type = "text";
            } else {
                inputField.type = "password";
            }
        }
    </script>

</body>

</html>