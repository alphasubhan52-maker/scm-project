<?php
include('./connection.php');
include('./include/header.php');
include('./include/sidebar.php');
include('./include/setting.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {
    $email = $_POST['email'];
    // $message =$_POST['message'];
    $reply =  $_POST['reply'];

    require 'PHPMailer\Exception.php';
    require 'PHPMailer\PHPMailer.php';
    require 'PHPMailer\SMTP.php';
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'alphasubhan25@gmail.com';
    $mail->Password = 'spas bvnj vcow iaca';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('alphasubhan25@gmail.com');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "Admin's Reply";
    $mail->Body = ($reply);
    $mail->send();

    echo "<script>alert('Mail Sent Successfully'); document.location.href='message.php';</script>";
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
                                <h1>Reply</h1>
                                <div>
                                    <a href="./message.php">
                                        <button class="btn btn-primary">Back to Message's</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="form-row" action="" method="post" enctype="multipart/form-data">
                        </div>
                        <?php
                        $rid = $_GET['id'];
                        $rsql = "SELECT*FROM `contact` WHERE `contactid`='$rid'";
                        $rrun = mysqli_query($conn, $rsql);
                        $rfet = mysqli_fetch_assoc($rrun);
                        ?>
                        <div class="form-group">
                            <label for="text">Customer Email</label>
                            <input type="" class="form-control" id="title" name="email"
                                value="<?php echo $rfet['email'] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="description">Question From Customer</label>
                            <textarea type="text" class="form-control" id="description" name="message" disabled>
                       <?php echo $rfet['message'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="reply">Reply</label>
                            <textarea type="text" class="form-control" id="reply" name="reply" placeholder="Your Reply....." rows="6" required></textarea>
                        </div>
                        <div>
                            <input type="submit" name="send" placeholder="Send Reply" class="btn btn-primary mb-3 mx-3">
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