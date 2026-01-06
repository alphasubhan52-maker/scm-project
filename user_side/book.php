<?php
include('./connection.php');
include('./include/header.php');
// $usql = "SELECT*FROM `booking`";
// $urun = mysqli_query($conn, $usql);
// $ufet = mysqli_fetch_assoc($urun);
// $od = $ufet['date'];
// $ot = $ufet['time'];
if (!empty($_SESSION['email'])) {
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


        $usql = "SELECT*FROM `booking` WHERE `date`='$date' AND `time`='$time'";
        $urun = mysqli_query($conn, $usql);
        if (mysqli_num_rows($urun) > 0) {
            echo "<script>
                alert('Booking Not Availaible!');
            </script>";
        } else {
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
                $sql = "INSERT INTO `booking`(`category`, `clientname`, `email`, `contact`, `title`, `date`, `time`, `country`,
                `state`, `city`, `seats`, `venue`, `description`, `type`, `image`) VALUES ('$category','$clientname',
                '$email','$contact','$occasion','$date','$time','$country','$state','$city','$seats','$venue','$description',
                '$type','$third')";
                $run = mysqli_query($conn, $sql);
                if ($run) {
                    echo "<script>
                    alert('Data has been inserted successfully!');
                </script>";
                    echo "<script>
                setTimeout(function(){ window.location.href = './book.php';},1000);
                </script>";
                    // mysqli_close($conn);
                } else {
                    echo "<script>
                    alert('Data has not been inserted successfully!');
                </script>";
                    echo "<script>
                setTimeout(function(){ window.location.href = './book.php';},1000);
                </script>";
                }
            }
            if ($msg == "Right") {
            }
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
                    <h2>Booking</h2>
                </div>
            </div><!-- Subpage title end -->
        </div><!-- Page Banner end -->
        <section class="ts-contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h2 class="section-title text-center">

                            Book for Event
                        </h2>
                    </div><!-- col end-->
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8 mx-auto">
                        <form id="contact-form" class="contact-form" action="" method="post" enctype="multipart/form-data">
                            <div class="error-container"></div>
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="category">Event Category</label>
                                    <select name="category" id="category" class="form-control h-75">
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
                                <label for="name">Client NAME</label>
                                <input type="text" class="form-control" id="name" name="clientname">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" placeholder="E.g +927324---">
                            </div>
                            <div class="form-group">
                                <label for="occasion">Occasion Title</label>
                                <input type="text" class="form-control" id="occasion" name="occasion">
                            </div>
                            <div class="form-group">
                                <label for="date">Occasion Start Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="time">Occasion Start Time</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="country">Country</label>
                                    <select class="form-control h-75" name="country" id="country" class="city">
                                        <option value="selected">---Select Country---</option>
                                        <?php
                                        $sql2 = "SELECT*FROM `country`";
                                        $run2 = mysqli_query($conn, $sql2);
                                        while ($fet2 = mysqli_fetch_assoc($run2)) {
                                        ?>
                                            <option value="<?php echo $fet2['contid'] ?>"><?php echo $fet2['contname'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="state">State</label>
                                    <select class="form-control h-75" name="state" id="state" class="city">
                                        <option value="selected">---Select State---</option>
                                        <?php
                                        $sql2 = "SELECT*FROM `state`";
                                        $run2 = mysqli_query($conn, $sql2);
                                        while ($fet2 = mysqli_fetch_assoc($run2)) {
                                        ?>
                                            <option value="<?php echo $fet2['stateid'] ?>"><?php echo $fet2['statename'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label for="city">City</label>
                                    <select class="form-control h-75" name="city" id="city" class="city">
                                        <option value="selected">---Select City---</option>
                                        <?php
                                        $sql4 = "SELECT*FROM `city`";
                                        $run4 = mysqli_query($conn, $sql4);
                                        while ($fet4 = mysqli_fetch_assoc($run4)) {
                                        ?>
                                            <option value="<?php echo $fet4['id'] ?>"><?php echo $fet4['cityname'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="seats">Number of Seats</label>
                                <input type="number" class="form-control" id="seats" name="seats" placeholder="0">
                            </div>
                            <div class="form-group">
                                <label for="venue">Select Venue</label>
                                <select class="form-control h-75" id="venue" name="venue">
                                    <option value="selected">---Select Venue---</option>
                                    <?php
                                    $sql3 = "SELECT*FROM `venue`";
                                    $run3 = mysqli_query($conn, $sql3);
                                    while ($fet3 = mysqli_fetch_assoc($run3)) {
                                    ?>
                                        <option value="<?php echo $fet3['id'] ?>"><?php echo $fet3['venuename'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Occasion Description</label>
                                <textarea type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter Description here..."></textarea>
                            </div>
                            <div class="form-group">
                                <p>Occasion Type</p>
                                <input type="radio" id="public" value="Public" name="type">
                                <label for="public">
                                    <h6>Public</h6>
                                </label>
                                <input type="radio" id="private" value="Private" name="type">
                                <label for="private">
                                    <h6>Private</h6>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="text-center"><br>
                                <button class="btn" type="submit" name="submit"> Submit</button>
                            </div>
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
}
if (empty($_SESSION['email'])) {
    echo "<script>alert('Login to book event!');</script>";
    //header('Refresh:1,url=./login.php');
    echo "<script>
            setTimeout(function(){ window.location.href = './login.php';},1000);
            </script>";
}
include('./include/footer.php');

    ?>

    </body>

    </html>