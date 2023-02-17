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

<!-- add_to_cart -->
<?php
    if(isset($_POST['add_to_cart'])){
        $username = $_SESSION['username'];
        $cpro_name = $_POST['cpro_name'];
        $cpro_price = $_POST['cpro_price'];
        $cpro_img = $_POST['cpro_img'];
        $cpro_qty = 1;

        $insert_pro = mysqli_query($con, "INSERT INTO `cart` (`username`, `cpro_name`, `cpro_price`, `cpro_qty`, `cpro_img`) VALUES ('$username', '$cpro_name', '$cpro_price', '$cpro_qty', '$cpro_img');");
        if($insert_pro){
            $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                    <strong>'.$cpro_name.'</strong> is added to cart!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
    }
?>
<!-- end add_to_cart -->

    <!--================Home Banner Area =================-->
    <!-- breadcrumb start-->
    <section class="breadcrumb cake_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2>Cake Menu</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Category Product Area =================-->
    <section class="cat_product_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12 section_tittle text-center mb-2 cat_link">
                            <h2>All Categories</h2>
                            <a href="coffee.php">Coffee</a>
                            <a href="cold_drink.php">Cold Drink</a>
                            <a href="cake.php">Cake</a>
                            <a href="bread.php">Bread</a>
                        </div>
                    </div>
                    <div class="col-12"><?php echo $er; ?></div>
                    <div class="row align-items-center latest_product_inner">
                        <?php
                            $sel=mysqli_query($con, "SELECT * FROM product where pro_cat='cake'");
                            while($arr=mysqli_fetch_array($sel)) {
                                echo '<div class="col-lg-3 col-sm-6">
                                        <form method="POST">
                                            <div class="single_product_item">
                                                <a href="single-product.php?pro_id='.$arr['pro_id'].'&'.'pro_cat='.$arr['pro_cat'].'"><img src="img/product/'.$arr['pro_img'].'" alt=""></a>
                                                <div class="single_product_text">
                                                    <h4>'.$arr['pro_name'].'</h4>
                                                    <h3>'.$arr['pro_price'].' Kyats'.'</h3>
                                                    <button class="add_cart" name="add_to_cart">+ add to cart<i class="ti-shopping-cart"></i></button> 
                                                </div>
                                                <input type="hidden" name="cpro_name" value="'.$arr['pro_name'].'">
                                                <input type="hidden" name="cpro_price" value="'.$arr['pro_price'].'">
                                                <input type="hidden" name="cpro_img" value="'.$arr['pro_img'].'">  
                                            </div>
                                        </form>
                                    </div>';
                            };   
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Category Product Area =================-->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->