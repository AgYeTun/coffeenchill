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
  <section class="confirmation_part padding_top mb-3">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-12 confirm_box mx-2">
          <div class="col-lg-6 col-lx-4">
            <div class="single_confirmation_details">
              <h4>order info</h4>

              <?php
                $username = $_SESSION['username'];
                $order_query = mysqli_query($con, "SELECT * FROM `order` WHERE username='$username'");
                $arr_order = mysqli_fetch_array($order_query);
              ?>

              <ul>
                <li>
                  <p>order number</p><span>: <?php echo $arr_order['order_id']; ?></span>
                </li>
                <li>
                  <p>username</p><span>: <?php echo $arr_order['username']; ?></span>
                </li>
                <li>
                  <p>phone no</p><span>: <?php echo $arr_order['phone_no']; ?></span>
                </li>
                <li>
                  <p>address</p><span>: <?php echo $arr_order['address']; ?></span>
                </li>
                <li>
                  <p>street</p><span>: <?php echo $arr_order['street']; ?></span>
                </li>
                <li>
                  <p>township</p><span>: <?php echo $arr_order['township']; ?></span>
                </li>
                <li>
                  <p>city</p><span>: <?php echo $arr_order['city']; ?></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $cart_query = mysqli_query($con, "SELECT * FROM `cart` WHERE username='$username'");
                $sub_total = 0;
                $total = 0;
                if(mysqli_num_rows($cart_query) > 0) {
                  while($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                    $sub_total = $fetch_cart['cpro_price'] * $fetch_cart['cpro_qty'];
                    $total += $sub_total;
              ?>
                <tr>
                  <th colspan="2"><span><?php echo $fetch_cart['cpro_name']; ?></span></th>
                  <th><span><?php echo $fetch_cart['cpro_price']; ?> Kyats</span></th>
                  <th>x <?php echo $fetch_cart['cpro_qty']; ?></th>
                  <th> <span><?php echo $sub_total; ?> Kyats</span></th>
                </tr>
              <?php
                    };
                  };
              ?>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="4">Total</th>
                  <th scope="col"><?php echo $total; ?> Kyats</th>
                </tr>
              </tfoot>
            </table>
            <div class="billing_details">
              <a href="thank.php" class="col-lg-4 col-sm-6 btn_2 m-auto" name="order_btn">Order</a>
            </div>
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