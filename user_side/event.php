<?php
include('./connection.php');
include('./include/header.php');
?>
<!--/ Header end -->

<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
    <!-- Subpage title start -->
    <div class="page-banner-title">
        <div class="text-center">
            <h2>Event Blog</h2>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Page Banner end -->

<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT*FROM `event` INNER JOIN `categoryname` ON event.category=categoryname.id";
            $run = mysqli_query($conn, $sql);
            while ($fet = mysqli_fetch_assoc($run)) {
                $pic = unserialize($fet['images']);
            ?>
                <div class="col-sm-12 col-md-6 col-lg-6 my-5">
                    <div class="post">
                        <div class="post-media post-image">
                            <a href="#">
                                <img
                                    src="<?php echo "../admin_side/otika-bootstrap-admin-template/image/" . $pic[0]; ?>" width="250" height="200px" alt="image" class="mx-5">
                            </a>
                        </div>


                        <div class="post-body">
                            <div class="post-meta">
                                <span class="post-author">
                                    <a href="#"><?php echo $fet['name'] ?></a>
                                </span>
                            </div>
                            <div class="entry-header">
                                <h2 class="entry-title">
                                    <a href="#"><?php echo $fet['title'] ?></a>
                                </h2>
                            </div><!-- header end -->

                            <div class="post-footer">
                                <a href="eventdetails.php?id=<?php echo $fet['eventid'] ?>" class="btn-link">Read More <i class="icon icon-arrow-right"></i></a>
                            </div>

                        </div><!-- post-body end -->

                    </div><!-- 1st post end -->


                    <!-- <div class="pages mt-60">
                     <nav aria-label="Page navigation ">
                        <ul class="pagination mx-auto">
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-right"></i></a></li>
                        </ul>
                     </nav>
                  </div> -->

                </div>
            <?php
            }
            ?>
        </div><!-- Main row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->


</body>


<!-- blog17:31-->

</html>
<?php
include('./include/footer.php');
?>