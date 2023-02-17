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
    if(isset($_POST['add'])){
        $pro_name = $_POST['pro_name'];
        $pro_cat = $_POST['pro_cat'];
        $pro_price = $_POST['pro_price'];
        $pro_img = $_FILES['pro_img']['name'];
        $pro_img_tmp_name = $_FILES['pro_img']['tmp_name'];
        // $img_folder = 'img/product/'.$pro_img;

        $select_query = mysqli_query($con, "SELECT pro_name FROM product");
        $arr_select = mysqli_fetch_array($select_query);

        if($_POST['pro_name']==$arr_select['pro_name']){
            $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                    Product name already exist!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
        else{
            $insert_query = mysqli_query($con, "INSERT INTO product(pro_cat, pro_name, pro_img, pro_price) VALUES('$pro_cat', '$pro_name', '$pro_img', '$pro_price')");
            if($insert_query) {
                mkdir("img/product/$i");
                move_uploaded_file($pro_img_tmp_name, "img/product/$i".$pro_img);
                $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                    Successfully added!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            }
            else {
                $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
                    Could not add the product!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            }
        }
        
    }
?>

<!-- add product section -->
<section class="contact-section padding_top register-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <h2 class="contact-title text-center">Add New Product</h2>
            </div>
            <div class="col-6 text-center m-auto">
                <form method="POST" class="form-contact contact_form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-12 my-3">
                            <?php echo "<p style='color: red;'>$er</p>"; ?>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <input class="form-control reg-text" name="pro_name" id="pro_name" type="text" placeholder='Enter product name'>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <input class="form-control reg-text" name="pro_cat" id="pro_cat" type="text" placeholder='Enter product category'>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <input class="form-control reg-text" name="pro_price" id="pro_price" type="number" placeholder='Enter product price'>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="file" class="form-control reg-text img_input" name="pro_img">
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <button type="submit" value="add" class="btn_2 button-contactForm reg-btn m-auto" name="add">Add</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>

<!-- end of add product section -->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->