<?php
    error_reporting(1);
    include("connection.php"); 
    session_start();

    if(!isset($_SESSION['username'])) {
        header("location: index.php");
    }
?>

<!-- header sercion -->
<?php
    include("header.php");
?>
<!-- end of header section -->



  <!--================ confirmation part start =================-->
  <section class="confirmation_part padding_top mb-5">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-12 confirm_box mx-2">
            <div class="single_confirmation_details">
              <?php
                $username = $_SESSION['username'];
                $order_query = mysqli_query($con, "SELECT * FROM `order` WHERE username='$username'");
                $arr_order = mysqli_fetch_array($order_query);
              ?>
              <p class="py-2">Dear <?php echo $username; ?></p>
              <h4>Thank you for being our valued customer</h4>
              <br>
              <p class="py-2">I hope that your shopping experience was a pleasant one. We work hard to ensure a memorable experience each time you purchase anything from us. </p>
            </div>
            <div class="billing_details text-center">
              <a href="home.php" class="col-lg-4 col-sm-6 btn_2 m-auto" name="order_btn">Home</a>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->

<!-- footer section -->
<?php
  include("footer.php");
?>
<!-- end of footer section -->