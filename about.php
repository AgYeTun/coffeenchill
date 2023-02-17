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

   <!--================Home Banner Area =================-->
   <!-- breadcrumb start-->
   <section class="breadcrumb about_bg">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-8">
               <div class="breadcrumb_iner text-center">
                  <div class="breadcrumb_iner_item">
                     <h2 class="about">About Us</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- breadcrumb start-->
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area padding_top">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 posts-list">
               <div class="single-post">
                  
                  <div class="blog_details">
                     <h2>Overpowering Coffee in a hurry
                     </h2>
                     <p class="excert">
                     Our main goal since we began has remained basic: acquaint our clients with the domains we specifically purchase our extraordinary tasting coffee from, broil the beans with consideration, and make astounding coffee increasingly available through our bistros and our site. The coffee we cook is the coffee we like to drink, and we trust you like it as well.
                     </p>
                     <p>
                        At Coffee & Chill Roasters, we pursue a straightforward arrangement of convictions.
                     </p>
                     <div class="feature-img text-center py-2">
                        <img class="img-fluid" src="img/about_1.jpg" alt="">
                     </div>
                     <div class="quote-wrapper">
                        <div class="quotes">
                        With more than 8,000 Coffee & Chill self-serve coffee bars situated over the UK and Internationally, wherever you are going you can get the extraordinary taste of Coffee & Chill in a hurry.
                        </div>
                     </div>

                     <h2>Straightforwardness is significantly more than exactly where we get our beans from.</h2>
                     <p>
                     The primary thing we did when we began our organization was to feature our honor winning ranches.
                     </p>
                     <p>
                     This thought of straightforwardness naturally advanced to the manner in which we worked in different territories as well our baristas are constantly present to talk about blending tips, our client benefit group are there to walk you through your coffee questions, and our broiling group to demonstrate to you how they function.
                     </p>
                     
                     <h2>A culture of consistent learning is the way to continually driving coffee forward.</h2>
                     <p>We are reliably inquiring about, testing and executing best practices all through our business to increase present expectations. Making refractometers fundamental for our bistro blending.</p>
                     <p>Holding progressed tangible learnings for junior roasters, and exploring different avenues regarding handling at the ranch level are only a portion of the manners in which that our profoundly gifted group is continually developing the manner in which Indian coffee is dealt with, experienced or imparted about.</p>

                     <div class="feature-img text-center py-2">
                        <img class="img-fluid" src="img/about_2.jpg" alt="">
                     </div>

                     <h2 class="pt-3">Sourcing the best coffee beans does not ensure great coffee.</h2>
                     <p>In spite of the fact that we have a committed sourcing group for green beans and have put resources into building up quality broiling parameters, we realize that significantly more advances still need to become alright to mix a decent container.</p>
                     <p>This is the reason we have worked intimately with our Director of Training and our Q Grade guaranteed Director of Coffee to make industry driving strategies, for example, furnishing baristas with evaluating and announcing devices for accuracy preparing, and measuring each and every bunch that is broiled to guarantee steady quality.</p>
                  </div>
               </div>
               <div class="navigation-top pb-5">
                  <div class="d-sm-flex justify-content-between text-center">
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                     </div>
                     <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================Blog Area end =================-->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->