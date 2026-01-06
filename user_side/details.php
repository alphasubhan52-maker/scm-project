<?php
include('./connection.php');
include('./include/header.php');
$uid = $_GET['id'];
$sql = "SELECT*FROM `news` INNER JOIN `categoryname` ON news.category=categoryname.id WHERE `newsid`='$uid'";
$run = mysqli_query($conn, $sql);
$fet = mysqli_fetch_assoc($run);
?>
<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
    <!-- Subpage title start -->
    <div class="page-banner-title">
        <div class="text-center">
            <h2>News Details</h2>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Page Banner end -->
<div class="post-media post-image text-center">
    <?php
    $pho = unserialize($fet['images']);
    ?>
    <img src="<?php echo "../admin_side/otika-bootstrap-admin-template/image/" . $pho[0]; ?>" width="400" alt="image" class="mt-4 p-4">
</div>

<div class="post-content post-single justify-content-center">
    <div class="post-body clearfix">
        <div class="entry-content">
            <blockquote>
                <h2 class="mt-3"><?php echo $fet['title'] ?></h2>
            </blockquote>
            <blockquote>
                <h4>Categoryname:</h4><span><?php echo $fet['name'] ?></span>
            </blockquote>
            <div class="post-media post-image text-center">
                <img src="<?php echo "../admin_side/otika-bootstrap-admin-template/image/" . $pho[1]; ?>" width="400" alt="image" class="mt-4 p-4">
            </div>
            <blockquote>
                <h4>News Description:</h4>
            </blockquote>
            <p><?php echo $fet['newsdescription'] ?></p>
            <blockquote>
                <h4>Status:</h4><span><?php echo $fet['status'] ?></span>
            </blockquote>
        </div>
    </div>
</div>





















<?php
include('./include/footer.php');
?>