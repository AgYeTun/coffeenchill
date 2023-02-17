<?php
    error_reporting(1);
    ob_start();
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
    if(isset($_POST['edit_pro'])) {
        $pro_id = $_GET['edit'];
        $new_name = $_POST['edit_name'];
        $new_cat = $_POST['edit_cat'];
        $new_price = $_POST['edit_price'];
        $new_img = $_FILES['edit_img']['name'];
        $new_img_tmp_name = $_FILES['edit_img']['tmp_name'];

        $select_query = mysqli_query($con, "SELECT pro_name FROM product");
        $arr_select = mysqli_fetch_array($select_query);

        if($_POST['edit_name']==$arr_select['pro_name']){
            $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                        Product name already exist!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
        }
        else{
            $edit_query = mysqli_query($con, "UPDATE product SET pro_name='$new_name', pro_cat='$new_cat', pro_price='$new_price', pro_img='$new_img' WHERE pro_id='$pro_id'");
            if($edit_query) {
                mkdir("img/product/$i");
                move_uploaded_file($new_img_tmp_name, "img/product/$i".$new_img);
                $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                            Successfully edited!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ';
            }
            else {
                $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                            Edit failed!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    ';
            }
        }
    }
?>

<!-- fetch product -->
<?php
    if(isset($_GET['edit'])) {
        $pro_id = $_GET['edit'];
        $query = mysqli_query($con, "SELECT * FROM product WHERE pro_id=$pro_id");
        $arr = mysqli_fetch_array($query);
    }
?>
<!-- fetch product -->


<!-- add product section -->
<section class="contact-section padding_top register-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="contact-title text-center">Edit Product</h2>
            </div>
            <div class="col-lg-6 col-sm-12 text-center m-auto">
                <form method="POST" class="form-contact contact_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 my-2">
                        <div><?php echo $er; ?></div>
                            <br>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="pro_name" id="pro_name" type="text" value='<?php echo $arr['pro_name'] ?>' readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="edit_name" id="edit_name" type="text" placeholder='Enter new name'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="pro_cat" id="pro_cat" type="text" value='<?php echo $arr['pro_cat'] ?>' readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="edit_cat" id="edit_cat" type="text" placeholder='Enter new category'>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="price" id="price" type="text" value='<?php echo $arr['pro_price'] ?>' readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <input class="form-control reg-text" name="edit_price" id="edit_price" type="number" placeholder='Enter new price'>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="file" class="form-control reg-text img_input" name="edit_img" placeholder='Choose product image'>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" value="edit" class="btn_2 button-contactForm reg-btn m-auto" name="edit_pro">Confirm</button>
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

<!-- end of add product section -->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->