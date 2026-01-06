<?php
include('./connection.php');
include('./include/header.php');
?>
<!--/ Header end -->

<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
   <!-- Subpage title start -->
   <div class="page-banner-title">
      <div class="text-center">
         <h2>News Blog</h2>
      </div>
   </div><!-- Subpage title end -->
</div><!-- Page Banner end -->

<section id="main-container" class="main-container">
   <div class="container">
      <div class="row">
         <?php
         $sql = "SELECT*FROM `news` INNER JOIN `categoryname` ON news.category=categoryname.id";
         $run = mysqli_query($conn, $sql);
         while ($fet = mysqli_fetch_assoc($run)) {
            $p = unserialize($fet['images']);
         ?>
            <div class="col-sm-12 col-md-6 col-lg-6 my-5">
               <div class="post">
                  <div class="post-media post-image">
                     <a href="#">
                        <img src="<?php echo "../admin_side/otika-bootstrap-admin-template/image/" . $p[0]; ?>" width="250" height="200px" alt="image" class="mx-5">
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
                        <a href="details.php?id=<?php echo $fet['newsid'] ?>" class="btn-link">Read More <i class="icon icon-arrow-right"></i></a>
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
         ?><!-- Content Col end -->
         <!-- <div class="col-lg-4 col-md-4 col-sm-12 mx-auto">
               <div class="post">
                  <div class="post-media post-image">
                     <a href="#"><img src="images/blog/blog1.jpg" class="img-fluid" alt=""></a>
                  </div>


                  <div class="post-body">
                     <div class="post-meta">
                        <span class="post-author">
                           <a href="#">BY Admin</a>
                        </span>

                        <div class="post-meta-date">
                           <span class="day">29</span>
                           <span class="month">October</span>
                           <span class="year">2018</span>
                        </div>
                     </div>
                     <div class="entry-header">
                        <h2 class="entry-title">
                           <a href="#">Met Gala planner to the oversee inauguration
                              events why virtual reality</a>
                        </h2>
                     </div> header end -->
         <!-- 
                     <div class="entry-content">
                        <p>How you transform your business asap technology, consumer habit industry on dynamic web
                           design change? Find out from those leading the charge Met Gala</p>
                     </div>

                     <div class="post-footer">
                        <a href="news-single.html" class="btn-link">Read More <i class="icon icon-arrow-right"></i></a>
                     </div>

                  </div> post-body end -->

         <!-- </div> 1st post end -->

         <!-- </div> -->
      </div><!-- Main row end -->

   </div><!-- Container end -->
</section><!-- Main container end -->


</body>


<!-- blog17:31-->

</html>
<?php
include('./include/footer.php');
?>