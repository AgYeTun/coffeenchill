<?php
    error_reporting(1);
    ob_start();
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

<?php
  if(isset($_POST['send_fb'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $fb_query = mysqli_query($con, "INSERT INTO `feedback`(`username`, `email`, `message`) VALUES('$name', '$email', '$message');");
    if($fb_query) {
      $er = '<div class="alert alert-warning alert-dismissible fade show text-center mt-4" role="alert">
              Thank you for sending. We value your feedbacks! 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
        ';
    }
  }
?>

  <!-- ================ feedback section start ================= -->
  <section class="contact-section padding_top">
    <div class="container">
      <!-- <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 480px;"></div>
        <script>
          function initMap() {
            var uluru = {
              lat: -25.363,
              lng: 131.044
            };
            var grayStyles = [{
                featureType: "all",
                stylers: [{
                    saturation: -90
                  },
                  {
                    lightness: 50
                  }
                ]
              },
              {
                elementType: 'labels.text.fill',
                stylers: [{
                  color: '#ccdee9'
                }]
              }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
              center: {
                lat: -31.197,
                lng: 150.744
              },
              zoom: 9,
              styles: grayStyles,
              scrollwheel: false
            });
          }
        </script>
        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
        </script>

      </div> -->

      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Thanks for visiting our shop!</h2>
        </div>
        <div class="col-lg-8">
          <p class="py-2">Your feedback means a lot to us. It helps us provide you with the best food and service experience you deserve. Please take a few minutes to give us your suggestions.</p>
          <div><?php echo $er; ?></div>
          <?php 
            $username = $_SESSION['username'];
            $sel = mysqli_query($con, "SELECT * FROM `customer` WHERE username='$username'");
            $arr = mysqli_fetch_array($sel);
          ?>
          <form class="form-contact contact_form" method="post"
            enctype="multipart/form-data">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                    placeholder='Enter Message'></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" value="<?php echo $arr['username']; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" value="<?php echo $arr['email']; ?>">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <button class="btn_2 button-contactForm reg-btn" name="send_fb">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3>Yangon, Myanmar.</h3>
              <p>ThinGanGyun, 136/1</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3>+959 979999999</h3>
              <p>Mon to Fri 9am to 6pm</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3>info@coffeeandchill.com</h3>
              <p>Send us your query anytime!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

<!-- footer section -->
<?php
    include("footer.php");
?>
<!-- end of footer section -->