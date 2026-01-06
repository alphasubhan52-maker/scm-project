<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');
$osql = "SELECT * FROM `profile`";
$orun = mysqli_query($conn, $osql);
$ofet = mysqli_fetch_assoc($orun);
if (isset($_POST['submit'])) {

    $logo = $_FILES['logo']['name'];
    if (!empty($logo)) {
        $exe = pathinfo($logo, PATHINFO_EXTENSION);
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
            unlink("./image/" . $ofet['logo']);
        }
        if ($msg == "Right") {
            $sql = "UPDATE `profile` SET `logo`='$third'";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                move_uploaded_file($_FILES['logo']['tmp_name'], "./image/" . $third);
                echo "<script>alert('Logo has been updated successfully!');</script>";
            }
        }
    } else {
        $ologo = $ofet['logo'];
    }
    $profile = $_FILES['profile']['name'];
    if (!empty($profile)) {
        $exe1 = pathinfo($profile, PATHINFO_EXTENSION);
        $e1 = strtolower($exe1);
        $ext1 = array("jpg", "png", "jpeg");
        if (in_array($e1, $ext1)) {
            $sec1 = rand(1, 99999);
            $third1 = $sec1 . "." . $e1;
            $msg1 = "Right";
        } else {
            $msg1 = "NotRight";
        }
        if ($msg1 == "Right") {
            unlink("./image/" . $ofet['profile']);
        }
        if ($msg1 == "Right") {
            $sql1 = "UPDATE`profile` SET `profile`='$third1'";
            $run1 = mysqli_query($conn, $sql1);
            if ($run1) {
                move_uploaded_file($_FILES['profile']['tmp_name'], "./image/" . $third1);
                echo "<script>alert('Profile has been updated successfully!');</script>";
                echo "<script>
            setTimeout(function(){ window.location.href = './profile.php';},1000);
            </script>";
            }
        }
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
                            <h2 style="font-family:sans-serif;color:black;">Profile</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form-row" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group col-12">
                                <label>Current Logo</label><br>
                                <img src="<?php echo "./image/" . $ofet['logo'] ?>" alt="img" width="70px;">
                                <br>
                                <label class="my-4">Logo</label>
                                <input type="file" name="logo" class="form-control">
                                <label class="my-4">Current Profile</label><br>
                                <img src="<?php echo "./image/" . $ofet['profile'] ?>" alt="img" width="90px">
                                <br>
                                <label class="mt-5">Profile</label>
                                <input type="file" name="profile" class="form-control">
                            </div>

                            <div class="px-4 py-2 col-4">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<?php
include('./include/footer.php');
?>