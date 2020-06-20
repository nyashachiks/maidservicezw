<?php
session_start();

//if session is not set, redirect to loggedout page
if(!isset($_SESSION['loggedin'])||($_SESSION['loggedin']!=md5($_SESSION['name'])))
	{
	session_destroy();
	header("Location: http://localhost/outface/loggedout.php");
	exit();
	}
?>
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
          <h1></h1>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home.php">Home</a></li>
          <li><a href="profileList.php">Profile List</a></li>
          <li><a href="#">How to view CVs</a></li>
          <li><a href="#">Contact</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['name']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>
<br><br><br><br>
<?php

	

echo "	<table>
			<tr>
				<td width=\"150\"></td>
				<td width=\"1200\">
					<table>
						<tr bgcolor=\"#85c1e9\">
							<td width=\"1040\"><h4><font color=\"white\">Profiles that match your search</font></h4></td>
							<td width=\"20\"></td>
						</tr>";
						
						
				echo "</table>
				</td>
				<td width=\"50\"></td>
			</tr>
		</table>";

?>
<div class="container">
      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
	  <?php
		if(isset($_SESSION['orderID']))
			{
			$orderID= $_SESSION['orderID'];	
			}
		else
			{
			$qcl= "SELECT * FROM orders WHERE app_code= '".$_SESSION['appCode']."'";
			$rcl= mysqli_query($dbhandle, $qcl);
			$rwcl= mysqli_fetch_array($rcl, MYSQLI_ASSOC);
			$orderID= $rwcl['order_id'];
			}
		$qlist= "SELECT * FROM view_count WHERE order_id='$orderID'";
		$rlist= mysqli_query($dbhandle, $qlist);
		while($rwlist= mysqli_fetch_array($rlist, MYSQLI_ASSOC))
			{
			$maidID= $rwlist['maid_id'];
			//list maid
			$qli= "SELECT * FROM maids WHERE maid_id='$maidID'";
			$rli= mysqli_query($dbhandle, $qli);
			$rwli= mysqli_fetch_array($rli, MYSQLI_ASSOC);
			echo "<div class=\"row\">
				<div class=\"col-md-3\">
				  <div class=\"wow bounceInUp\" data-wow-delay=\"0.2s\">
					<div class=\"team boxed-grey\">
					  <div class=\"inner\" align=\"center\">
						<h5>".$rwli['name']." ".$rwli['surname']."</h5>
						<p class=\"subtitle\">".$rwli['location']."</p>
						<div class=\"avatar\"><h3><img src=\"chichi/dist/img/".$rwli['image'].".jpg\" alt=\"\" class=\" img-circle\"/></h3></div>
						<p class=\"subtitle\">Basis: <i>".$rwli['time_basis']."</i><br><a href=\"viewCV.php?id=".$rwli['maid_id']."\" class=\"btn btn-primary btn-lg active\" role=\"button\" aria-pressed=\"true\">View CV</a></p>
					  </div>
					</div>
				  </div>
				</div>";
			}
		?>
      </div>
    </div>
<br><br>
<?php
echo "<table>
		<tr>
			<td width=\"150\"></td>
			<td width=\"1200\">
				<table>
					<tr bgcolor=\"#85c1e9\">
						<td width=\"860\"><h5><font color=\"white\"><i>Other profiles</i></font></h5></td>
						<td width=\"20\"></td>
					</tr>";
					
					
			echo "</table>
			</td>
			<td width=\"50\"></td>
		</tr>
</table>";
?>
<br><br>
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
					  <div class=\"inner\" align=\"center\">
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

<br><br><br><br>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="wow shake" data-wow-delay="0.4s">
            <div class="page-scroll marginbot-30">
              <a href="#" id="totop" class="btn btn-circle">
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
