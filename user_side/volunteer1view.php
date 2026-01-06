<?php
include('./connection.php');
include('./include/header.php');

?>
<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
    <!-- Subpage title start -->
    <div class="page-banner-title">
        <div class="text-center">
            <h2>Volunteer Data</h2>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Page Banner end -->
<div class="row">
    <div class="col-lg-12">
        <h2 class="section-title mt-5">
            Volunteer Data
        </h2>
    </div><!-- col end-->
</div><!-- row end-->
<div class="row mb-3 justify-content-center">
    <div class="col-lg-10">
        <?php
        $sql = "SELECT*FROM `volunteer`INNER JOIN `experience` ON volunteer.experience=experience.expid";
        $run = mysqli_query($conn, $sql);
        while ($fet = mysqli_fetch_assoc($run)) {
        ?>
            <div class="tab-content schedule-tabs mb-3">
                <div role="tabpanel" class="tab-pane active" id="date3">

                    <div class="schedule-listing">
                        <div class="schedule-slot-time">
                            <span>
                                <img src="<?php echo '../admin_side/otika-bootstrap-admin-template/image/' . $fet['image'] ?>" width="150px;" alt="image">
                            </span>
                        </div>
                        <div class="schedule-slot-info">
                            <h3 class="schedule-slot-title"><?php echo $fet['name'] ?>
                                <strong><?php echo $fet['phone'] ?></strong>
                            </h3>
                            <div class="schedule-slot-info-content">
                                <p><?php echo $fet['address'] ?> </p>
                            </div>
                            <div class="schedule-listing-btn">
                                <a href="info.php?id=<?php echo $fet['id'] ?>" class="btn float-right">More Details</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>







<?php
include('./include/footer.php');
?>