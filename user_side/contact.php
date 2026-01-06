<?php
include('./connection.php');
include('./include/header.php');
if (isset($_POST['submit'])) {
   $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $subject = mysqli_real_escape_string($conn, $_POST['subject']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $message = mysqli_real_escape_string($conn, $_POST['message']);
   $sql = "INSERT INTO `contact`(`firstname`, `lastname`, `subject`, `email`, `message`) VALUES ('$firstname','$lastname','$subject','$email','$message')";
   $run = mysqli_query($conn, $sql);
   if ($run) {
      echo "<script>alert('Message has been sent!');</script>";
   }
}
?>

<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
   <!-- Subpage title start -->
   <div class="page-banner-title">
      <div class="text-center">
         <h2>Contact Us</h2>
      </div>
   </div><!-- Subpage title end -->
</div><!-- Page Banner end -->

<!-- ts intro start -->
<section class="ts-contact">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 mx-auto">
            <h2 class="section-title text-center">
               <span>Get Information</span>
               Contact Information
            </h2>
         </div><!-- col end-->
      </div>
      <div class="row">
         <div class="col-lg-4">
            <div class="single-intro-text single-contact-feature">
               <h3 class="ts-title">Tickets info</h3>
               <p>
                  <strong>Name:</strong> Ronaldo König
               </p>
               <p>
                  <strong>Phone:</strong> 009-215-5595
               </p>
               <p>
                  <strong>Email:</strong> info@example.com
               </p>
               <span class="count-number fa fa-paper-plane"></span>
            </div><!-- single intro text end-->
            <div class="border-shap left"></div>
         </div><!-- col end-->
         <div class="col-lg-4">
            <div class="single-intro-text single-contact-feature">
               <h3 class="ts-title">Partnerships info</h3>
               <p>
                  <strong>Name:</strong> Ronaldo König
               </p>
               <p>
                  <strong>Phone:</strong> 009-215-5595
               </p>
               <p>
                  <strong>Email:</strong> info@example.com
               </p>
               <span class="count-number fa fa-paper-plane"></span>
            </div><!-- single intro text end-->
            <div class="border-shap left"></div>
         </div><!-- col end-->
         <div class="col-lg-4">
            <div class="single-intro-text single-contact-feature">
               <h3 class="ts-title">Programme Details</h3>
               <p>
                  <strong>Name:</strong> Ronaldo König
               </p>
               <p>
                  <strong>Phone:</strong> 009-215-5595
               </p>
               <p>
                  <strong>Email:</strong> info@example.com
               </p>
               <span class="count-number fa fa-paper-plane"></span>
            </div><!-- single intro text end-->
            <div class="border-shap left"></div>
         </div><!-- col end-->

      </div><!-- row end-->
   </div><!-- container end-->
   <div class="speaker-shap">
      <img class="shap2" src="images/shap/home_schedule_memphis1.png" alt="">
   </div>
</section>
<!-- ts contact end-->

<section class="ts-contact-map no-padding">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 no-padding">
            <div class="mapouter">
               <div class="gmap_canvas">
                  <!-- <iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Park%20Street%2C%20Jacksonville%2C%20IL%2C%20USA&t=&z=13&ie=UTF8&iwloc=&output=embed"
									frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe> -->
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4238.075542978786!2d-0.14258530106536377!3d50.83163078652512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487585765dd0f7f3%3A0x5a144a31ef19ef9d!2sJurys+Inn+Brighton!5e0!3m2!1sen!2sbd!4v1541576429082" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  <!-- <a href="https://www.pureblack.de">werbeagentur</a></div> -->

               </div>
            </div>
         </div>
      </div>
</section>

<section class="ts-contact-form">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 mx-auto">
            <h2 class="section-title text-center">
               <span>Have Questions?</span>
               Send Message
            </h2>
         </div><!-- col end-->
      </div>
      <div class="row">
         <div class="col-lg-8 mx-auto">
            <form id="contact-form" class="contact-form" action="" method="post">
               <div class="error-container"></div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <input class="form-control form-control-name" placeholder="First Name" name="firstname" id="f-name"
                           type="text" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input class="form-control form-control-name" placeholder="Last Name" name="lastname" id="l-name"
                           type="text" required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input class="form-control form-control-subject" placeholder="Subject" name="subject" id="subject"
                           required>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input class="form-control form-control-email" placeholder="Email" name="email" id="email"
                           type="email" required>
                     </div>
                  </div>

               </div>
               <div class="form-group">
                  <textarea class="form-control form-control-message" name="message" id="message" placeholder="Your message...*"
                     rows="6" required></textarea>
               </div>
               <div class="text-center"><br>
                  <button class="btn" type="submit" name="submit"> Send Message</button>
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