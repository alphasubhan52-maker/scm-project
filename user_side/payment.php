<?php
include('./connection.php');
include('./include/header.php');

?>
<script src="https://js.stripe.com/v3/"></script>
<div id="page-banner-area" class="page-banner-area" style="background-image:url(images/hero_area/banner_bg.jpg)">
    <!-- Subpage title start -->
    <div class="page-banner-title">
        <div class="text-center">
            <h2>Payment</h2>
        </div>
    </div><!-- Subpage title end -->
</div><!-- Page Banner end -->

<section class="ts-contact-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center">
                    Pay
                </h2>
            </div><!-- col end-->
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form id="contact-form" class="contact-form" action="checkout.php" method="Post">
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
                                <input class="form-control form-control-subject" placeholder="Address" name="address" id="address"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control form-control-email" placeholder="Contact" name="contact" id="ontact"
                                    type="text" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="ticket" id="" class="form-control h-50">
                                    <option value="" selected>Select Ticket...</option>
                                    <option value="platinum">Platinum (50$)</option>
                                    <option value="diamond">Diamond (30$)</option>
                                    <option value="gold">Gold (20$)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                if ('ticket' == 'platinum') {
                                    $price = 5000;
                                }
                                if ('ticket' == 'diamond') {
                                    $price = 3000;
                                }
                                if ('ticket' == 'gold') {
                                    $price = 2000;
                                }
                                ?>
                                <!-- <input class="form-control form-control-email" name="price" id="price"
                                    type="hidden"> -->
                            </div>
                        </div>
                    </div>
                    <div class="text-center"><br>
                        <button class="btn" type="submit" name="pay" id="btn"> Pay Now</button>
                    </div>
                    <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo $publishableKey ?>"
                        data-amount="2000"
                        data-name="Ticket"
                        data-description="Gold"
                        data-image=""
                        data-currency="usd">

                    </script>
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
require('./config.php');
?>