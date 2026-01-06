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
<?php
session_start();
if (empty($_SESSION['email'])) {
?>

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
                                <li class="dropdown nav-item active">
                                    <a href="#" class="" data-toggle="dropdown">Home <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="index-2.php">Home One</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown nav-item">
                                    <a href="#" class="" data-toggle="dropdown">About <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="venue.html">Venue</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="" data-toggle="dropdown">Applications <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu main" role="menu">
                                        <li><a href="volunteer1.php">Volunteer</a>
                                            <ul class="extra">
                                                <li><a href="volunteer1view.php">Volunteer View</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="planner1.php">Planner</a>
                                            <ul class="extra">
                                                <li><a href="planner1view.php">Planner View</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="designer1.php">Designer</a>
                                            <ul class="extra">
                                                <li><a href="designer1view.php">Designer View</a></li>
                                            </ul>
                                        </li>
                                    </ul>

                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#"> Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="blog.php">News</a></li>
                                        <li><a href="event.php">Event</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="book.php" type="disabled">Booking</a>
                                </li>
                                <li class="nav-item">
                                    <a href="contact.php">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a href="payment.php">Payment</a>
                                </li>
                                <li class="header-ticket nav-item">
                                    <a class="ticket-btn btn" href="login.php"> Login
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div><!-- container end-->
            </header>
            <!--/ Header end -->
        <?php
    }
        ?>
        <?php
        if (!empty($_SESSION['email'])) {
        ?>

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
                                        <li class="dropdown nav-item active">
                                            <a href="#" class="" data-toggle="dropdown">Home <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="index-2.php">Home One</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown nav-item">
                                            <a href="#" class="" data-toggle="dropdown">About <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="venue.html">Venue</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="#" class="" data-toggle="dropdown">Applications <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu main" role="menu">
                                                <li><a href="volunteer1.php">Volunteer</a>
                                                    <!-- <ul class="extra">
                                                        <li><a href="volunteer1view.php">Volunteer View</a></li>
                                                    </ul> -->
                                                </li>
                                                <li><a href="planner1.php">Planner</a>
                                                    <ul class="extra">
                                                        <li><a href="planner1view.php">Planner View</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="designer1.php">Designer</a>
                                                    <ul class="extra">
                                                        <li><a href="designer1view.php">Designer View</a></li>
                                                    </ul>
                                                </li>
                                            </ul>

                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="#"> Blog <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="blog.php">News</a></li>
                                                <li><a href="event.php">Event</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="book.php">Booking</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="contact.php">Contact</a>
                                        </li>
                                        <li class="header-ticket nav-item">
                                            <a class="ticket-btn btn" href="logout.php"> logout
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div><!-- container end-->
                    </header>
                    <!--/ Header end -->
                <?php
            }
                ?>