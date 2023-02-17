<?php
    error_reporting(1);
    ob_start();
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

<?php
  if(isset($_POST['order_btn'])) {
    $username = $_SESSION['username'];
    $name = $_POST['username'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];
    $street = $_POST['street'];
    $township = $_POST['township'];
    $city = $_POST['city'];
    $method = $_POST['method'];

    $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE username='$username'");
    $price_total = 0;
    
    if(mysqli_num_rows($cart_query) > 0) {
      while($product_item = mysqli_fetch_assoc($cart_query)) {
        $product_name[] = $product_item['cpro_name'].'('.$product_item['cpro_qty'].')';
        $product_price = $product_item['cpro_price'] * $product_item['cpro_qty'];
        $price_total += $product_price;
      };
      
    };

    $total_products = implode(', ',$product_name);
    $insert_order = mysqli_query($con,"INSERT INTO `order`(`username`, `phone_no`, `address`, `street`, `township`, `city`, `method`, `total_products`, `total_price`) VALUES('$name', '$phone_no', '$address', '$street', '$township', '$city', '$method', '$total_products', '$price_total');");
    if($insert_order){
      header("location: confirmation.php");
      $err="order success";
    };
    
  };
?>

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top pb-5">
    <div class="container">
      <div class="billing_details">
        <div class="row">
          <div class="col-lg-8">
            <h3>Billing Details<?php echo $err; ?></h3>
            <form class="row contact_form" method="POST">

              <?php
                $user = $_SESSION['username'];
                $sel_user_data = mysqli_query($con, "SELECT * FROM customer WHERE username='$user'");
                $arr_user_data = mysqli_fetch_array($sel_user_data);
              ?>
              <div class="col-md-6 form-group p_star">
                <span class="p-2">Username : </span>
                <input type="text" class="form-control mt-2" id="username" name="username" value="<?php echo $arr_user_data['username']; ?>" readonly/>
              </div>
              <div class="col-md-6 form-group p_star">
                <span class="p-2 py-2">Phone No : </span>
                <input type="number" class="form-control mt-2" id="phone_no" name="phone_no" value="<?php echo $arr_user_data['phone_no']; ?>" readonly/>
              </div>
              <div class="col-md-6 form-group p_star">
                <span class="p-2">Address : </span>
                <input type="text" class="form-control mt-2" id="address" name="address" placeholder="Enter Address" required>
              </div>
              <div class="col-md-6 form-group p_star">
                <span class="p-2">Street : </span>
                <input type="text" class="form-control mt-2" id="street" name="street" placeholder="Enter Street" required>
              </div>
              <div class="col-md-6 form-group p_star">
                <span class="p-2">Township : </span>
                <input type="text" class="form-control mt-2" id="township" name="township" placeholder="Enter Township/Block" required>
              </div>
              <div class="col-md-6 form-group p_star">
                <span class="p-2">City : </span>
                <input type="text" class="form-control mt-2" id="city" name="city" placeholder="Enter City" required>
              </div>
              <div class="col-md-12 form-group p_star">
                <span class="p-2">Method : </span>
                <input type="text" class="form-control mt-2" id="method" name="method" value="Cash on Delivery" readonly>
              </div>
          </div>
          <div class="col-lg-4">
            <div class="order_details_iner checkout_order_list">
              <h3>Order Details</h3>
              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col" colspan="2">Product</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $username = $_SESSION['username'];
                    $sel_cart = mysqli_query($con, "SELECT * FROM cart WHERE username='$username'");
                    $sub_total = 0;
                    $total = 0;
                    if(mysqli_num_rows($sel_cart) > 0) {
                      while($fetch_cart = mysqli_fetch_assoc($sel_cart)) {
                        $sub_total = $fetch_cart['cpro_price'] * $fetch_cart['cpro_qty'];
                        $total += $sub_total;
                  ?>
                    <tr>
                      <th colspan="2"><span><?php echo $fetch_cart['cpro_name']; ?></span></th>
                      <th>x<?php echo $fetch_cart['cpro_qty']; ?></th>
                      <th> <span><?php echo number_format($sub_total); ?> Kyats</span></th>
                    </tr>
                  <?php
                      }
                    } else {
                      echo'<tr><th colspan="4"><span>Your cart is empty</span></th></tr>';
                    }
                  ?>
                  <tr>
                    <th colspan="3">Total</th>
                    <th> <span><?php echo number_format($total); ?> Kyats</span></th>
                  </tr>
              </table>
              <button class="btn_2"  name="order_btn">Proceed</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->
<!-- footer section -->
<?php
  include("footer.php");
?>
<!-- end of footer section -->