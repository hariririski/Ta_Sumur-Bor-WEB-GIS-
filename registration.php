<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <?php include('share/header.php')?>

    <title>Acme | Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>


    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <?php include'share/logo.php';?>

    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Registration</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Bantu Kami</a></li>
                        <li class="active">Daftar</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->

    <!--container start-->
    <div class="registration-bg">
        <div class="container">

            <form class="form-signin wow fadeInUp" action="">
                <h2 class="form-signin-heading">Daftar Sekarang</h2>
                <div class="login-wrap">
                    <p>Masukkan Data Pribadi Anda</p>
                    <input type="text" class="form-control" placeholder="Full Name" autofocus="">
                    <input type="text" class="form-control" placeholder="Address" autofocus="">
                    <input type="text" class="form-control" placeholder="Email" autofocus="">
                    <input type="text" class="form-control" placeholder="City/Town" autofocus="">
                    <div class="radios">
                        <label class="label_radio col-lg-6 col-sm-6" for="radio">
                            <input name="radio" id="radio-01" value="1" type="radio" checked=""> Male
                        </label>
                        <label class="label_radio col-lg-6 col-sm-6" for="radio">
                            <input name="radio" id="radio-02" value="1" type="radio"> Female
                        </label>
                    </div>

                    
                    <input type="text" class="form-control" placeholder="User Name" autofocus="">
                    <input type="password" class="form-control" placeholder="Password">
                    <input type="password" class="form-control" placeholder="Re-type Password">
                    
                    <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

                    <div class="registration">
                        sudah Terdaftar ?
                        <a class="" href="login.html">
                            Masuk!
                        </a>
                    </div>
                </div>
            </form>

        </div>
     </div>
    <!--container end-->

    <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3 address wow fadeInUp" data-wow-duration="2s" data-wow-delay=".1s">
                     <h1>contact info</h1>
                     <address>
                         <p><i class="fa fa-home pr-10"></i>Address: No.XXXXXX street</p>
                         <p><i class="fa fa-globe pr-10"></i>Mars city, Country</p>
                         <p><i class="fa fa-mobile pr-10"></i>Mobile : (123) 456-7890</p>
                         <p><i class="fa fa-phone pr-10"></i>Phone : (123) 456-7890</p>
                         <p><i class="fa fa-envelope pr-10"></i>Email : <a href="javascript:;">support@example.com</a></p>
                     </address>
                </div>
                <div class="col-lg-3 col-sm-3 wow fadeInUp" data-wow-duration="2s" data-wow-delay=".3s">
                    <h1>latest tweet</h1>
                    <div id="owl-slide">
                    <div class="tweet-box">
                        <i class="fa fa-twitter"></i>
                        <em>Please follow <a href="javascript:;">@example</a> for all future updates of us! <a href="javascript:;">twitter.com/acme</a></em>
                    </div>
                    <div class="tweet-box">
                        <i class="fa fa-twitter"></i>
                        <em>Please follow <a href="javascript:;">@example</a> for all future updates of us! <a href="javascript:;">twitter.com/acme</a></em>
                    </div>
                    <div class="tweet-box">
                        <i class="fa fa-twitter"></i>
                        <em>Please follow <a href="javascript:;">@example</a> for all future updates of us! <a href="javascript:;">twitter.com/acme</a></em>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">
                    <div class="page-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s">
                        <h1>Our Company</h1>
                        <ul class="page-footer-list">
                            <li><i class="fa fa-angle-right"></i><a href="about.html">About Us</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="faq.html">Support</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="service.html">Service</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="career.html">We are Hiring</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="terms.html">Term & condition</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3">

                    <div class="text-footer wow fadeInUp" data-wow-duration="2s" data-wow-delay=".7s">
                    <h1>Text Widget</h1>
                        <p>
                            This is a text widget.Lorem ipsum dolor sit amet.
                            This is a text widget.Lorem ipsum dolor sit amet
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- footer end -->
    <!--small footer start -->
    <footer class="footer-small">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 pull-right">
                    <ul class="social-link-footer list-unstyled">
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".1s"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".2s"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".3s"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".4s"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".5s"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".6s"><a href="#"><i class="fa fa-skype"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".7s"><a href="#"><i class="fa fa-github"></i></a></li>
                        <li class="wow flipInX" data-wow-duration="2s" data-wow-delay=".8s"><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                  <div class="copyright">
                    <p>&copy; Copyright - Acme Theme by cosmic.</p>
                  </div>
                </div>
            </div>
        </div>
    </footer>
     <!--small footer end-->

  <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>


     <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        wow = new WOW(
          {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0          // default
          }
        )
        wow.init();
    </script>

  </body>
</html>
