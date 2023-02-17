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
        $del_query = mysqli_query($con, "DELETE FROM `feedback` WHERE fb_id=$del_id");
        $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                            Successfully deleted!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ';
    }
?>
<section class="admin_vh">
    <!-- product menu -->

    <section class="cat_product_area section_padding pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div><?php echo $er; ?></div>
                        <div class="row">
                            <div class="col-lg-12 section_tittle text-center mb-2 cat_link pb-2">
                                <a href="#">Feedback Table</a>
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
                        <th scope="col">Feedback ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sel=mysqli_query($con, "SELECT * FROM `feedback`");
                            while($arr=mysqli_fetch_array($sel)) {
                                echo'
                                    <tr>
                                        <td>
                                            <h5>'.$arr['fb_id'].'</h5>
                                        </td>
                                        <td>
                                            <h5>'.$arr['username'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.$arr['email'].'</h5>
                                        </td>
                                        <td>
                                        <h5>'.$arr['message'].'</h5>
                                        </td>
                                        <td>
                                        <a href="feedback.php?del='.$arr['fb_id'].'" class="btn btn-danger btn-sm my-1" name="del"><i class="ti-trash"></i></a>
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

