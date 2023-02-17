<?php
    error_reporting(1);
    include("connection.php"); 
    session_start();

    if(!isset($_SESSION['a_username'])) {
        header("location: index.php");
    }
?>

<!-- header sercion -->
<?php
    include("header.php");
?>
<!-- end of header section -->

<section class="breadcrumb sub_banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item text-center">
                            <h2 class="sub_banner_color">Welcome Admin</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->

