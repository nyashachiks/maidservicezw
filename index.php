<!DOCTYPE html>
<html lang="en">
<?php
require('db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Squadfree - Free bootstrap 3 one page template</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Squadfree
    Theme URL: https://bootstrapmade.com/squadfree-free-bootstrap-template-creative/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>

  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
        <a class="navbar-brand" href="index.html">
          <h1>Maid Service</h1>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#intro">Home</a></li>
          <li><a href="#about">Preview</a></li>
          <li><a href="#service">How to view CVs</a></li>
          <li><a href="#contact">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="login.php">Login</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Section: intro -->
  <section id="intro" class="intro">

    <div class="slogan">
      <h2>WELCOME TO <span class="text_color">MAID SERVICE</span> </h2>
      <h4>WE HAVE A VAST DATABASE OF MAIDS IN ZIMBABWE FOR YOU TO PICK FROM</h4>
    </div>
    <div class="page-scroll">
      <a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
    </div>
  </section>
  <!-- /Section: intro -->

  <!-- Section: about -->
  <section id="about" class="home-section text-center">
    <div class="heading-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow bounceInDown" data-wow-delay="0.4s">
              <div class="section-heading">
                <h2>Maids Preview</h2>
                <i class="fa fa-2x fa-angle-down"></i>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
	  <?php
		$qlist= "SELECT * FROM maids ORDER BY RAND() LIMIT 4";
		$rlist= mysqli_query($dbhandle, $qlist);
		while($rwlist= mysqli_fetch_array($rlist, MYSQLI_ASSOC))
			{
			echo "<div class=\"row\">
				<div class=\"col-md-3\">
				  <div class=\"wow bounceInUp\" data-wow-delay=\"0.2s\">
					<div class=\"team boxed-grey\">
					  <div class=\"inner\">
						<h5>".$rwlist['name']." ".$rwlist['surname']."</h5>
						<p class=\"subtitle\">".$rwlist['location']."</p>
						<div class=\"avatar\"><h3><img src=\"chichi/dist/img/".$rwlist['image'].".jpg\" alt=\"\" class=\" img-circle\"/></h3></div>
						<p class=\"subtitle\">Basis: <i>".$rwlist['time_basis']."</i></p>
					  </div>
					</div>
				  </div>
				</div>";
			}
		?>
      </div>
    </div>
  </section>
  <!-- /Section: about -->


  <!-- Section: services -->
  <section id="service" class="home-section text-center bg-gray">

    <div class="heading-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow bounceInDown" data-wow-delay="0.4s">
              <div class="section-heading">
                <h2>How to view fully detailed CVs</h2>
                <i class="fa fa-2x fa-angle-down"></i>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="wow fadeInLeft" data-wow-delay="0.2s">
            <div class="service-box">
              <div class="service-icon">
                <b>1</b>
              </div>
              <div class="service-desc">
                <h5>Make Payment</h5>
                <p>Do a "Send Money" Ecocash transfer of US$20 to 0771131970. Copy the confirmation message and SMS it to the same number. Admin will then process your request and give you access</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <div class="service-box">
              <div class="service-icon">
                <b>2</b>
              </div>
              <div class="service-desc">
                <h5>Login</h5>
                <p>Navigate to the "My Account" tab on the top right. Use your mobile number as the user-name and the last 5 digits of your Ecocash approval code as the password to login.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wow fadeInUp" data-wow-delay="0.2s">
            <div class="service-box">
              <div class="service-icon">
                <b>3</b>
              </div>
              <div class="service-desc">
                <h5>View Detailed CVs</h5>
                <p>Once logged in you can view all the details of the CVs availed to you. Your payment will cater for 4 CVs. If you are not happy with them, you will be awarded an additional 4 CVs to view</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wow fadeInRight" data-wow-delay="0.2s">
            <div class="service-box">
              <div class="service-icon">
                <b>4</b>
              </div>
              <div class="service-desc">
                <h5>Shortlisting</h5>
                <p>You are able to contact shortlisted maids via mobile or email for interviews. All the best!</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: services -->




  <!-- Section: contact -->
  <section id="contact" class="home-section text-center">
    <div class="heading-contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow bounceInDown" data-wow-delay="0.4s">
              <div class="section-heading">
                <h2>Get in touch</h2>
                <i class="fa fa-2x fa-angle-down"></i>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
      <div class="row">
        

        <div class="col-lg-4">
          <div class="widget-contact">
            <h5>Main Office</h5>

            <address>
				  <strong>Maid Service</strong><br>
				  Avondale<br>
				  Harare<br>
				  <abbr title="Phone">P:</abbr> +263 77 113 1970
				  <br><a href="adminLogin.php">.</a>
				</address>

            <address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">admin@maidservicezw.com</a>
				</address>
            <address>
				  <strong>We're on social networks</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
				</address>

          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- /Section: contact -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="wow shake" data-wow-delay="0.4s">
            <div class="page-scroll marginbot-30">
              <a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
            </div>
          </div>
          <p>&copy;SquadFREE. All rights reserved.</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact. 
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
            -->
            <a href="https://bootstrapmade.com/bootstrap-one-page-templates/">Bootstrap One Page Templates</a> by BootstrapMade
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
