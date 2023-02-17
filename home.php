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
        };
    };
?>
<!-- end add_to_cart -->

<!-- Slider banner part start-->
<section class="banner_part">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner_slider owl-carousel">
                    <div class="single_banner_slider"  style="background-image: url(img/banner1_bg.jpg); background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Start A Day<br>With Coffee</h1>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                            <a href="all_product.php" class="btn_2">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <!-- <img src="img/banner_img.png" alt=""> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single_banner_slider" style="background-image: url(img/banner2_bg.jpg); background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Every Bite<br>Is A Joy</h1>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                            <a href="all_product.php" class="btn_2">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <!-- <img src="img/banner_img.png" alt=""> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="single_banner_slider" style="background-image: url(img/banner3_bg.jpg); background-size: cover; background-position: center;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Drlicious Cake<br>For Everyone</h1>
                                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                                            <a href="all_product.php" class="btn_2">shop now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <!-- <img src="img/banner_img.png" alt=""> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </div>
</section>
<!-- Slider banner part end -->

<!-- category start-->
<section class="feature_part padding_top">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text" style="background-image: url(img/feature/coffee.jpg); background-size: cover;">
                    <!-- <p>Premium Quality</p> -->
                    <h3>Coffee</h3>
                    <a href="coffee.php" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <!-- <img src="img/feature/feature_1.jpg" alt=""> -->
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text" style="background-image: url(img/feature/cold_drink.png); background-size: cover;">
                    <!-- <p>Premium Quality</p> -->
                    <h3>Cold Drink</h3>
                    <a href="cold_drink.php" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <!-- <img src="img/feature/feature_2.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-5 col-sm-6">
                <div class="single_feature_post_text" style="background-image: url(img/feature/cake.jpg); background-size: cover;">
                    <!-- <p>Premium Quality</p> -->
                    <h3 style="color: #663008;">Cake</h3>
                    <a href="cake.php" class="feature_btn" style="color: #663008;">EXPLORE NOW <i class="fas fa-play" style="color: #663008;"></i></a>
                    <!-- <img src="img/feature/feature_3.png" alt=""> -->
                </div>
            </div>
            <div class="col-lg-7 col-sm-6">
                <div class="single_feature_post_text"  style="background-image: url(img/feature/bread.jpg); background-size: cover;">
                    <!-- <p>Premium Quality</p> -->
                    <h3>Bread</h3>
                    <a href="bread.php" class="feature_btn">EXPLORE NOW <i class="fas fa-play"></i></a>
                    <!-- <img src="img/feature/feature_4.png" alt=""> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- category end -->

<!-- featured_list start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Featured<span>items</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12"><?php echo $er; ?></div>
                    <?php
                        $sel=mysqli_query($con, "SELECT * FROM product ORDER BY rand()");
                        $n=0;
                        while($arr=mysqli_fetch_array($sel)) {
                            echo '
                                <div class="col-lg-3 col-sm-6">
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
                                </div>
                                ';
                            $n++;
                            if($n==8) {
                                break;
                            };
                        };   
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- featured_list part end-->

<!-- sub banner start-->
<section class="sub_banner section_padding">
</section>
<!-- sub banner end -->

<!-- blog section -->
<!-- <section class="blog-section section_padding pb-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_tittle text-center">
                    <h2>Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 my-2">
                <div class="blog-img">
                    <img src="img/blog/blog_1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 my-3 align-self-center">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>Kinds Of Grinding Coffee</h1>
                        <p>Here to bring your lifestyle to the next level.</p>
                        <a href="#" class="btn_2">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 blog-hr my-3"></div>
        <div class="row">
            <div class="col-lg-6 my-3 align-self-center">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>Kinds Of Grinding Coffee</h1>
                        <p>Here to bring your lifestyle to the next level.</p>
                        <a href="#" class="btn_2">READ MORE</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 my-2">
                <div class="blog-img">
                    <img src="img/blog/blog_1.jpg" alt="">
                </div>
            </div>
        </div>          
    </div>
</section> -->
<!-- end of blog section -->

<!-- best seller start-->
<section class="product_list section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Popular<span>items</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12"><?php echo $er; ?></div>
                    <?php
                        $sel=mysqli_query($con, "SELECT * FROM product ORDER BY rand()");
                        $n=0;
                        while($arr=mysqli_fetch_array($sel)) {
                            echo '
                                <div class="col-lg-3 col-sm-6">
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
                                </div>
                                ';
                            $n++;
                            if($n==4) {
                                break;
                            };
                        };   
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- fbest seller end-->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->

