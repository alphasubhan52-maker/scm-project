<!DOCTYPE html>
<html lang="en">


<!-- index12:16-->

<head>
    <!-- Basic Page Needs ================================================== -->
    <meta charset="utf-8">

    <!-- Mobile Specific Metas ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <!-- Site Title -->
    <title>Exhibz - Conference &amp; Event HTML Template</title>
    <link rel="stylesheet" href="view.css">


    <!-- CSS
         ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./include/css.css"> -->
    <!-- FontAwesome -->
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="Font/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="./css/animate.css">
    <!-- magnific -->
    <link rel="stylesheet" href="./css/magnific-popup.css">
    <!-- carousel -->
    <link rel="stylesheet" href="./css/owl.carousel.min.css">
    <!-- isotop -->
    <link rel="stylesheet" href="./css/isotop.css">
    <!-- ico fonts -->
    <link rel="stylesheet" href="./css/xsIcon.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="./css/responsive.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

</head>

<body>
    <div class="body-inner">
        <!-- Header start -->
        <header id="header" class="header header-transparent">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <!-- logo-->
                    <a class="navbar-brand" href="index-2.php">
                        <img src="images/logos/logo.png" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item mx-5">
                                <a href="./index-2.php" class="">Home</a>
                            </li>
                            <li class="header-ticket nav-item">
                                <span style="color: white;">Dont Have an Account?</span>
                                <a class="ticket-btn btn" href="signin.php"> Signin
                                </a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div><!-- container end-->
        </header>
        <!--/ Header end -->

        <?php
        include('./connection.php');
        session_start();
        if (isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);
            $sql = "SELECT*FROM `login` WHERE `email`='$email' AND `password`='$password' AND `role`='client'";
            $run = mysqli_query($conn, $sql);
            $fet = mysqli_fetch_assoc($run);
            if (mysqli_num_rows($run)) {
                $_SESSION['email'] = $email;
                echo "<script>alert('You logged in successfuly!');</script>";
                header('location:http://localhost/PhpProjects/Php%20Project/user_side/index-2.php');
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
                        <h2>login</h2>
                    </div>
                </div><!-- Subpage title end -->
            </div><!-- Page Banner end -->
            <section class="ts-contact-form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h2 class="section-title text-center">

                                Login
                            </h2>
                        </div><!-- col end-->
                    </div>
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <form id="contact-form" class="contact-form" action="" method="post" enctype="multipart/form-data">
                                <div class="error-container"></div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Enter Password"
                                                    id="password" name="password" required>
                                                <button class="btn btn-secondary toggle-btn" type="button"
                                                    onclick="togglePasswordVisibility('password')"><i class="fa-solid fa-eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center"><br>
                                    <button class="btn" type="submit" name="submit"> Login</button>
                                </div>
                            </form><!-- Contact form end -->
                        </div>
                    </div>
                </div>
                <div class="speaker-shap">
                    <img class="shap1" src="images/shap/home_schedule_memphis2.png" alt="">
                </div>
            </section>





            <!-- ts footer area start-->
            <div class="footer-area">

                <!-- footer start-->
                <footer class="ts-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 mx-auto">
                                <div class="ts-footer-social text-center mb-30">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- footer social end-->
                                <div class="footer-menu text-center mb-25">
                                    <ul>
                                        <li><a href="#">About Eventime</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                        <li><a href="#">Tickets</a></li>
                                        <li><a href="#">Venue</a></li>
                                    </ul>
                                </div><!-- footer menu end-->
                                <div class="copyright-text text-center">
                                    <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- footer end-->
                <div class="BackTo">
                    <a href="#" class="fa fa-angle-up" aria-hidden="true"></a>
                </div>

            </div>
            <!-- ts footer area end-->




            <!-- Javascript Files
        ================================================== -->
            <!-- initialize jQuery Library -->
            <script src="js/jquery.js"></script>

            <script src="js/popper.min.js"></script>
            <!-- Bootstrap jQuery -->
            <script src="js/bootstrap.min.js"></script>
            <!-- Counter -->
            <script src="js/jquery.appear.min.js"></script>
            <!-- Countdown -->
            <script src="js/jquery.jCounter.js"></script>
            <!-- magnific-popup -->
            <script src="js/jquery.magnific-popup.min.js"></script>
            <!-- carousel -->
            <script src="js/owl.carousel.min.js"></script>
            <!-- Waypoints -->
            <script src="js/wow.min.js"></script>

            <!-- isotop -->
            <script src="js/isotope.pkgd.min.js"></script>

            <!-- Template custom -->
            <script src="js/main.js"></script>

    </div>
    <!-- Body inner end -->
</body>


<!-- index12:17-->

</html>

</body>

</html>