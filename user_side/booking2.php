<?php
include('./include/header.php');
include('./connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    $workertitle = mysqli_real_escape_string($conn, $_POST['workertitle']);
    $workername = mysqli_real_escape_string($conn, $_POST['workername']);
    $workerphone = mysqli_real_escape_string($conn, $_POST['workerphone']);
    $workeremail = mysqli_real_escape_string($conn, $_POST['workeremail']);
    $first = $_FILES['image']['name'];

    $usql = "SELECT*FROM `userbooking` WHERE `date`='$date' AND `time`='$time' AND `workeremail`='$workeremail'";
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
            $sql = "INSERT INTO `userbooking`(`category`, `clientname`, `email`, `contact`, `title`, `date`, `time`, `country`, `state`, `city`, `seats`, `venue`, `description`, `type`, `image`, `workertitle`, `workername`, `workerphone`, `workeremail`) VALUES ('$category','$clientname',
            '$email','$contact','$occasion','$date','$time','$country','$state','$city','$seats','$venue','$description',
            '$type','$third','$workertitle','$workername','$workerphone','$workeremail')";
            $run = mysqli_query($conn, $sql);
            if ($run) {
                echo "<script>alert('Designer Booked successfully!');</script>";
                echo "<script>
                setTimeout(function(){ window.location.href = './designer1view.php';},1000);
                </script>";
            } else {
                echo "<script>alert('Data has not been inserted successfully!');</script>";
            }
            if ($run) {


                require 'PHPMailer\Exception.php';
                require 'PHPMailer\PHPMailer.php';
                require 'PHPMailer\SMTP.php';
                $mail = new PHPMailer(true);

                try {
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'alphasubhan25@gmail.com';
                    $mail->Password = 'spas bvnj vcow iaca';
                    $mail->SMTPSecure = 'tsl';
                    $mail->Port = 587;

                    $mail->setFrom('alphasubhan25@gmail.com');
                    $recipientmail = [$email, $workeremail];
                    foreach ($recipientmail as $recipient) {
                        $mail->addAddress(trim($recipient));
                    }

                    $mail->isHTML(true);
                    $mail->Subject = 'Booking Confirmation -' . $workername . 'Event Designer';
                    $mail->Body = "
            <h3>Booking Details</h3>
            <p><strong>Date:</strong> $date</p>
            <p><strong>Time:</strong> $time</p>
            <p><strong>Event:</strong> $category</p>
            <p><strong>Venue:</strong> $venue, $state,$city</p>
            <p><strong>Seats:</strong> $seats</p>
            <p><strong>Description:</strong> $description</p>
        ";
                    $mail->send();

                    echo "<script>alert('Mail Sent Successfully'); document.location.href='index-2.php';</script>";
                } catch (Exception $e) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
            }else {
                echo "SQL Error: " . mysqli_error($con);
            }
        }
    }
}
?>
<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
    <!-- Subpage title start -->
    <div class="page-banner-title">
        <div class="text-center">
            <h2>Booking</h2>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Page Banner end -->
<section class="ts-contact-form ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center">
                    Booking
                </h2>
            </div><!-- col end-->
        </div>
        <div class="row mx-auto justify-content-center">
            <div class="col-lg-8 mx-auto">
                <form id="contact-form" class="contact-form" action="" method="post" enctype="multipart/form-data">
                    <?php
                    $gid = $_GET['id'];
                    $gsql = "SELECT*FROM `designer` WHERE `id`='$gid'";
                    $grun = mysqli_query($conn, $gsql);
                    $gfet = mysqli_fetch_assoc($grun);
                    ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="title" name="workertitle"
                                value="Designer">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dname">Designer NAME</label>
                                <input type="text" class="form-control" id="dname" name="workername"
                                    value="<?php echo $gfet['name'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dphone">Designer Phone</label>
                                <input type="text" class="form-control" id="dphone" name="workerphone"
                                    value="<?php echo $gfet['phone'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="demail">Designer Email</label>
                                <input type="text" class="form-control" id="demail" name="workeremail"
                                    value="<?php echo $gfet['email'] ?>" readonly>
                            </div>
                        </div>
                        <div class="error-container"></div>
                        <div class="row">
                            <div class="col-md-12 h-100">
                                <div class="form-group">
                                    <label for="category"> Category</label>
                                    <select name="category" id="category" class="form-control h-25">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Client NAME</label>
                                    <input type="text" class="form-control" id="name" name="clientname">
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
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="E.g +927324---">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="occasion">Occasion Title</label>
                                    <input type="text" class="form-control" id="occasion" name="occasion">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Occasion Start Date</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time">Occasion Start Time</label>
                                    <input type="time" class="form-control" id="time" name="time">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <select class="form-control h-25" name="country" id="country" class="city">
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
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="state">State</label>
                                    <select class="form-control h-25" name="state" id="state">
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
                            </div>
                            <div class="form-group col-12">
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
                    </div>
                    <div class="col-md-8">
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
                    </div>
            </div>
            <div class="form-group col-md-8">
                <label for="description">Occasion Description</label>
                <textarea type="text" class="form-control" id="description" name="description"
                    placeholder="Enter Description here..."></textarea>
            </div>
            <div class="col-md-8 mx-5">
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
            </div>
            <div class="form-group col-md-8">
                <input type="file" name="image" class="form-control">
            </div>
        </div>

    </div>

    </div>
    </div>
    <div class="text-center"><br>
        <button class="btn mb-4" type="submit" name="submit">Book Now</button>
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