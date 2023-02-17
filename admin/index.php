<?php
    error_reporting(1);
    include("connection.php");   
        
    session_start();

    if(isset($_POST['login'])){
        // $_SESSION['username'] = $_POST['username'];
        $username=$_POST['username'];
        // $_SESSION['password'] = $_POST['password'];
        $password=$_POST['password'];
        $query = mysqli_query($con, "SELECT * FROM admin WHERE admin_user='$username'");
        $arr = mysqli_fetch_array($query);

        if($arr['admin_user']==$username && $arr['admin_pass']==$password) {
            $_SESSION['a_username']=$arr['admin_user'];
            header('location:home.php');
        }
        else {
            $er = "Username or Password do not match. Try again";
        }
    }
?>

<!-- header sercion -->
<?php
    include("header.php");
?>
<!-- end of header section -->



    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="login_part_form m-auto">
                        <div class="login_part_form_iner">
                            <h3 class="text-center">Welcome Admin ! <br>
                                Please Sign in now</h3>
                            <form method="POST" class="row contact_form" action="#" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="name" name="username" value=""
                                        placeholder="Username">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <button type="submit" value="login" class="btn_2" name="login">log in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->