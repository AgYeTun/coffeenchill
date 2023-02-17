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
    if(isset($_POST['add_to_cart'])){
        $username = $_SESSION['username'];
        $cpro_name = $_POST['cpro_name'];
        $cpro_price = $_POST['cpro_price'];
        $cpro_img = $_POST['cpro_img'];
        $cpro_qty = 1;

        $insert_pro = mysqli_query($con, "INSERT INTO `cart` (`username`, `cpro_name`, `cpro_price`, `cpro_qty`, `cpro_img`) VALUES ('$username', '$cpro_name', '$cpro_price', '$cpro_qty', '$cpro_img');");
        if($insert_pro){
            header('location: cart.php');
        }
    }
?>
<!-- end add_to_cart -->

  <!--================Single Product Area =================-->
  <div class="product_image_area section_padding pb-0">
    <div class="container">
      <div class="row s_product_inner justify-content-between">
      <div class="col-12"><?php echo $er; ?></div>
        <?php
        if(isset($_GET['pro_id'])) {
          $pro_id = $_GET['pro_id'];
          $sel = mysqli_query($con, "SELECT * FROM product WHERE pro_id='$pro_id'");
          while($arr = mysqli_fetch_array($sel)) {
            echo '
            
              <div class="col-lg-7 col-xl-7">
                <div class="product_slider_img">
                  <div id="vertical">
                    <div data-thumb="img/product/'.$arr['pro_img'].'">
                      <img src="img/product/'.$arr['pro_img'].'" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5 col-xl-4 align-self-center">
                <div class="s_product_text">
                  <h3>'.$arr['pro_name'].'</h3>
                  <ul class="list">
                    <li>
                      <a class="active" href="'.$arr['pro_cat'].'.php'.'">
                        <span>Category</span> : '.$arr['pro_cat'].'</a>
                    </li>
                  </ul>
                  <h2>'.number_format($arr['pro_price']).' Kyats</h2>
                  <div class="card_area d-flex align-items-center">
                    <form method="POST">
                      <button class="btn_2 inline" name="add_to_cart">add to cart</button>
                      <input type="hidden" name="cpro_name" value="'.$arr['pro_name'].'">
                      <input type="hidden" name="cpro_price" value="'.$arr['pro_price'].'">
                      <input type="hidden" name="cpro_img" value="'.$arr['pro_img'].'">  
                    </form>
                  </div>
                </div>
              </div>
              
            ';
          }
        }

        
        ?>
        <div class="col-12 blog-hr my-5"></div>
      </div>
    </div>
  </div>
  <!--================End Single Product Area =================-->


  <!-- product_list part start-->
  <section class="product_list pb-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="section_tittle text-center">
            <h2>Related <span>products</span></h2>
          </div>
        </div>
      </div>
      <div class="row align-items-center justify-content-between">
            <?php
            if(isset($_GET['pro_cat'])) {
              $pro_cat = $_GET['pro_cat'];
              $rel = mysqli_query($con, "SELECT * FROM product WHERE pro_cat='$pro_cat' ORDER BY rand()");
              $n=0;
              while($rel_arr=mysqli_fetch_array($rel)){
                echo '
                <div class="col-lg-3 col-sm-6">
                    <div class="single_product_item">
                        <a href="single-product.php?pro_id='.$rel_arr['pro_id'].'&'.'pro_cat='.$rel_arr['pro_cat'].'"><img src="img/product/'.$rel_arr['pro_img'].'" alt=""></a>                                           
                        <div class="single_product_text">
                            <h4>'.$rel_arr['pro_name'].'</h4>
                            <h3>'.$rel_arr['pro_price'].' Kyats'.'</h3>
                            <a href="single-product.php" class="add_cart">+ add to cart<i class="ti-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>';
                $n++;
                if($n==4){
                  break;
                }
              }
            }
            ?>
      </div>
    </div>
  </section>
  <!-- product_list part end-->
  
  
<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->