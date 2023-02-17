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

<?php
    if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $del_query = mysqli_query($con, "DELETE FROM cart WHERE cart_id='$del_id'");
        if($del_query) {
          $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                  Successfully deleted!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          ';
        };
    }

    if(isset($_POST['update_btn'])) {
      $update_id = $_POST['update_qty_id'];
      $update_qty = $_POST['update_qty'];

      $update_qty_query = mysqli_query($con, "UPDATE `cart` SET cpro_qty=$update_qty WHERE cart_id=$update_id");
      if($update_qty_query) {
        $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                Successfully Updated!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
      };
    }
?>



  <!--================Cart Area =================-->
  <section class="cart_area padding_top pb-4">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <div class="col-12 text-center">
            <p><?php echo $er; ?></p>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col"> </th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $username = $_SESSION['username'];
                $sel = mysqli_query($con, "SELECT * FROM cart WHERE username='$username'");
                $total = 0;
                if(mysqli_num_rows($sel) > 0) {
                  while($fetch_cart = mysqli_fetch_assoc($sel)){
              ?>
                  <tr>
                    <td>
                      <!-- <a href="#" class="btn btn-info btn-sm my-1" name="update"><i class="ti-upload"></i></a><br> -->
                      <a href="cart.php?del=<?php echo $fetch_cart['cart_id'] ?>" class="btn btn-danger btn-sm my-1" name="del"><i class="ti-trash"></i></a>
                    </td>
                    <td>
                      <div class="media">
                        <div class="d-flex">
                          <img class="cart-img" src="img/product/<?php echo $fetch_cart['cpro_img'] ?>" alt="" />
                        </div>
                        <div class="media-body">
                          <p><?php echo $fetch_cart['cpro_name'] ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <h5><?php echo number_format($fetch_cart['cpro_price']);  ?> Kyats</h5>
                    </td>
                    <td>
                      <div class="product_count">
                      <form method="POST">
                        <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                        <input class="input-number text-center" name="update_qty" type="number" value="<?php echo $fetch_cart['cpro_qty']; ?>" min="1" max="10"><br>
                        <input type="submit" value="update" name="update_btn" class="btn btn-info mt-2">
                      </form>
                      </div>
                    </td>

                    <td>
                      <h5><?php $sub_total = $fetch_cart['cpro_price'] * $fetch_cart['cpro_qty']; echo number_format($sub_total); ?> Kyats</h5>
                    </td>
                  </tr> 
              <?php
                $total += $sub_total;

                  };
                };
              ?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <h5><?php echo number_format($total); ?> Kyats</h5>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="all_product.php">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
  <!--================End Cart Area =================-->

<!-- footer section -->
<?php
  include("footer.php");
?>
<!-- end of footer section -->