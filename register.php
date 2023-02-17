<?php
    ob_start();
    error_reporting(1);
    include("connection.php");  
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Coffee&Chill</title>
    <link rel="icon" href="img/shop-sign.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

    
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="home.php"> <p class="logo">C&C</p> <!--<img src="img/logo.png" alt="logo">--> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Shop
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="coffee.php">Coffee</a>
                                        <a class="dropdown-item" href="cold_drink.php">Cold Drink</a>
                                        <a class="dropdown-item" href="cake.php">Cake</a>
                                        <a class="dropdown-item" href="bread.php">Bread</a>
                                    </div>
                                </li>
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="login.html"> login</a>
                                        <a class="dropdown-item" href="tracking.html">tracking</a>
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                        <a class="dropdown-item" href="elements.html">elements</a>
                                    </div>
                                </li> -->
                                <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li> -->
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">About</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Blog</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <!-- <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a> -->
                            <!-- <a href="index.php"><i class="ti-user"></i></a> -->
                            <!-- <a href="logout.php"><i class="ti-lock"></i></a> -->
                            <!-- <a href="cart.php"><i class="ti-shopping-cart-full"></i></a> -->
                            <!-- <div class="dropdown cart">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus"></i>
                                </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div>
                                
                            </div> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div> -->
    </header>
    <!-- Header part end-->

<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];

    if(isset($_POST['register'])){
        $query=mysqli_query($con, "SELECT * FROM `customer` WHERE username='$username';");
        $arr=mysqli_fetch_array($query);
        if($arr['username']!=$username){
            if(mysqli_query($con, "INSERT INTO `customer`(`username`, `email`, `password`, `phone_no`) VALUES('$username', '$email', '$password', '$phone_no');")){
                header("location: index.php");
            }
        }
        else {
            $er = '<div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                        Username already exists! Please use another name.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        };
    };

?>

<section class="contact-section padding_top register-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="contact-title text-center">Register Here!</h2>
            </div>
            <div class="col-8 text-center m-auto">
                <form method="POST" class="form-contact contact_form" novalidate="novalidate">
                    <div class="row">
                        <div class="col-12 my-2">
                            <?php echo $er; ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="username" id="username" type="text" placeholder='Enter username' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="password" id="password" type="password" placeholder='Enter password' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="email" id="email" type="text" placeholder='example@gmail.com' required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="phone_no" id="phone_no" type="number" placeholder='959xxxxxxxxx' required>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" value="register" class="btn_2 button-contactForm reg-btn m-auto" name="register">Register</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <!-- <div class="col-lg-4">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-home"></i></span>
                <div class="media-body">
                <h3>Buttonwood, California.</h3>
                <p>Rosemead, CA 91770</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                <div class="media-body">
                <h3>00 (440) 9865 562</h3>
                <p>Mon to Fri 9am to 6pm</p>
                </div>
            </div>
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                <h3>support@colorlib.com</h3>
                <p>Send us your query anytime!</p>
                </div>
            </div>
            </div> -->
        </div>
    </div>
</section>

    <!--================login_part Area =================-->
<!--    <section class="login_part padding_top">
        <div class="container justify-content-center">
            <div class="row align-items-center">        -->
                <!-- <div class="col-lg-12 col-md-12">
                    <div class="login_part_text text-center m-auto">
                        <div class="login_part_text_iner">
                            <h2>Create an Account!</h2>
                            <form method="POST" action="" class="row contact_form">
                                <table>
                                    <tbody>
                                        <tr class="col-md-12 form-group p_star">
                                            <td>Username</td>
                                            <td>
                                                <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>
                                                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone No.</td>
                                            <td>
                                                <input type="number" class="form-control" id="phone_no" name="phone_no" value="" placeholder="Phone no.">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>
                                                <input type="text" class="form-control" id="address" name="address" value="" placeholder="Address">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <a href="register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div> -->
        <!--        <div class="col-lg-12 col-md-12">
                    <div class="login_part_form m-auto">
                        <div class="login_part_form_iner m-auto">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form justify-content-center"  method="POST" novalidate="novalidate">
                            <table>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"></td>
                                        </tr>
                                        <tr class="col-md-12 form-group">
                                            <td>Username</td>
                                            <td>
                                                <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>
                                                <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Password</td>
                                            <td>
                                                <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phone No.</td>
                                            <td>
                                                <input type="number" class="form-control" id="phone_no" name="phone_no" value="" placeholder="Phone no.">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>
                                                <input type="text" class="form-control" id="address" name="address" value="" placeholder="Address">
                                            </td>
                                        </tr>
                                        <tr colspan="2">
                                        <td>
                                            <button type="submit" value="register" class="btn_2" name="register">Register</button>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>      -->
    <!--================login_part end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4 class="footer_logo">Coffee&Chill</h4>
                        <ul class="list-unstyled">
                            <li><p>info@coffeeandchill.com</p></li>
                            <li><p><i class="fas fa-phone"></i> 09-979999999</p></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="home.php">Home</a></li>
                            <!-- <li><a href="">Log Out</a></li> -->
                            <li><a href="">Cart</a></li>
                            <li><a href="">Checkout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Category</h4>
                        <ul class="list-unstyled">
                            <li><a href="coffee.php">Coffee</a></li>
                            <li><a href="cold_drink.php">Cold Drink</a></li>
                            <li><a href="cake.php">Cake</a></li>
                            <li><a href="bread.php">Bread</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Information</h4>
                        <ul class="list-unstyled">
                            <li><a href="">About Us</a></li>
                            <li><a href="">Our Blog</a></li>
                            <li><p>Follow Us</p></li>
                            <li><a href=""><i class="ti-facebook"></i></a>
                                <a href=""><i class="ti-twitter-alt"></i></a>
                                <a href=""><i class="ti-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="js/slick.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
</body>

</html>