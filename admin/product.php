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
        $del_query = mysqli_query($con, "DELETE FROM product WHERE pro_id=$del_id");
        $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                    Successfully deleted!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
    }
?>


<!-- product menu -->

<section class="cat_product_area section_padding pb-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div><?php echo $er; ?></div>
                    <div class="row">
                        <div class="col-lg-12 section_tittle text-center mb-2 cat_link pb-2">
                            <a href="coffee.php">Coffee</a>
                            <a href="cold_drink.php">Cold Drink</a>
                            <a href="cake.php">Cake</a>
                            <a href="bread.php">Bread</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- end of product menu -->




<!-- all product section -->
<section class="cart_area padding_top pt-2 pb-5">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sel=mysqli_query($con, "SELECT * FROM product");
                        while($arr=mysqli_fetch_array($sel)) {
                            echo'
                                <tr>
                                    <td>
                                        <h5>'.$arr['pro_id'].'</h5>
                                    </td>
                                    <td>
                                    <div class="media">
                                        <div class="d-flex">
                                        <img class="cart-img" src="img/product/'.$arr['pro_img'].'" alt="" />
                                        </div>
                                        <div class="media-body">
                                        <h5>'.$arr['pro_name'].'</h5>
                                        </div>
                                    </div>
                                    </td>
                                    <td>
                                    <h5>'.$arr['pro_cat'].'</h5>
                                    </td>
                                    <td>
                                    <h5>'.$arr['pro_price'].' Kyats</h5>
                                    </td>
                                    <td>
                                        <a href="edit_product.php?edit='.$arr['pro_id'].'" class="btn btn-info btn-sm my-1" name="edit"><i class="ti-pencil"></i></a>
                                        <a href="product.php?del='.$arr['pro_id'].'" class="btn btn-danger btn-sm my-1" name="del"><i class="ti-trash"></i></a>
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
<!-- end of all product section -->


<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->