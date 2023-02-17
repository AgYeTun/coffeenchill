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

<?php
    if(isset($_GET['del'])){
        $del_id = $_GET['del'];
        $del_query = mysqli_query($con, "DELETE FROM `order` WHERE order_id=$del_id");
    }
?>
<section class="admin_vh">
<!-- product menu -->

    <section class="cat_product_area section_padding pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12 section_tittle text-center mb-2 cat_link pb-2">
                                <a href="#">Order Table</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- end of product menu -->

    <section class="cart_area padding_top pt-2 pb-5">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Phone no</th>
                        <th scope="col">Address</th>
                        <th scope="col">Method</th>
                        <th scope="col">Products</th>
                        <th scope="col">Total</th>
                        <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sel=mysqli_query($con, "SELECT * FROM `order`");
                            while($arr=mysqli_fetch_array($sel)) {
                                echo'
                                    <tr>
                                        <td>
                                            <h5>'.$arr['order_id'].'</h5>
                                        </td>
                                        <td>
                                            <h5>'.$arr['username'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.$arr['phone_no'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.$arr['address'].', '.$arr['street'].', '.$arr['township'].', '.$arr['city'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.$arr['method'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.$arr['total_products'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.number_format($arr['total_price']).' Kyats'.'</h5>
                                        </td>
                                        <td>
                                        <a href="order.php?del='.$arr['order_id'].'" class="btn btn-danger btn-sm my-1" name="del"><i class="ti-trash"></i></a>
                                        </td>
                                    </tr>';
                            };
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->

