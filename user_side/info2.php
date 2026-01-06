<?php
include('./connection.php');
include('./include/header.php');
$uid = $_GET['id'];
$sql = "SELECT*FROM `designer` INNER JOIN `experience` ON designer.experience=experience.expid
                        INNER JOIN `design` ON designer.design=design.designid WHERE `id`='$uid'";
$run = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($run);
?>
<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
    <!-- Subpage title start -->
    <div class="page-banner-title">
        <div class="text-center">
            <h2>Complete Designer Info</h2>
        </div>
    </div><!-- Subpage title end -->
</div>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-lg-8 col-md-8 col-sm-12 mx-auto">
                <div class="post">
                    <div class="post-media post-image">
                        <a href="#"><img src="<?php echo '../admin_side/otika-bootstrap-admin-template/image/' . $fet['image'] ?>" width="400px" class="img-fluid" alt=""></a>
                    </div>

                    <div class="post-body">
                        <div class="post-meta">
                            <span class="post-author">
                                <a href="#"><?php echo $fet['name'] ?></a>
                                <a href="#"><?php echo $fet['lastname'] ?></a>
                            </span>


                            <div class="post-meta-date">
                                <span><?php echo $fet['email'] ?></span>
                            </div>
                            <div class="post-meta-date mx-4">
                                <span><?php echo $fet['phone'] ?></span>
                            </div>
                        </div>
                        <div class="entry-header">
                            <h2 class="entry-title">
                                <p>DOB: <?php echo $fet['dob'] ?></p>
                                <p>Gender: <?php echo $fet['gender'] ?></p>
                                <p>City: <?php echo $fet['city'] ?></p>
                                <p>Experience: <?php echo $fet['experienceyear'] ?></p>
                                <p>Design: <?php echo $fet['designname'] ?></p>
                                <p>Description: <?php echo $fet['description'] ?></p>
                                <p>Company: <?php echo $fet['company'] ?></p>
                                <p>Color: <?php echo $fet['color'] ?></p>
                                <p>Tools: <?php echo $fet['tools'] ?></p>
                                <p>Content: <?php echo $fet['content'] ?></p>
                                <p>Number: <?php echo $fet['number'] ?></p>
                                <p>Address: <?php echo $fet['address'] ?></p>
                            </h2>
                        </div>

                        <div class="schedule-listing-btn">
                            <a href="booking2.php?id=<?php echo $fet['id'] ?>" class="btn ">
                                Hire Now!</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
















<?php
include('./include/footer.php');
?>