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
          <h1>Maid Service</h1>
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
		$qlist= "SELECT * FROM maids WHERE maid_id= '".$_GET['id']."'";
		$rlist= mysqli_query($dbhandle, $qlist);
		while($rwlist= mysqli_fetch_array($rlist, MYSQLI_ASSOC)){
		echo "	<table>
			<tr>
				<td width=\"150\"></td>
				<td width=\"1200\">
				<table>
					<tr>
						<td><img src=\"chichi/dist/img/".$rwlist['image'].".jpg\" height=\"300\" width=\"300\"></td>
						<td width=\"20\"></td>
						<td>
							<table>
								<tr bgcolor=\"#85c1e9\">
									<td width=\"20\"></td>
									<td width=\"250\"><b><font color=\"white\"><h4><b><i>Details</i></b></h4></font></b></td>
									<td width=\"450\"></td>
								</tr>
								<tr bgcolor=\"#f8f9f9\">
									<td></td>
									<td width=\"200\"><h5><b>Name:</b></h5></td>
									<td><h5>".$rwlist['name']." ".$rwlist['surname']."</h5></td>
								</tr>
								<tr bgcolor=\"#fdfefe\">
									<td></td>
									<td><h5><b>ID: </b></h5></td>
									<td><h5>".$rwlist['id_num']."</h5></td>
								</tr>
								<tr bgcolor=\"#f8f9f9\">
									<td></td>
									<td><h5><b>Address: </b></h5></td>
									<td><h5>".$rwlist['address']."</h5></td>
								</tr>
								<tr bgcolor=\"#fdfefe\">
									<td></td>
									<td><h5><b>City: </b></h5></td>
									<td><h5>".$rwlist['location']."</h5></td>
								</tr>
								<tr bgcolor=\"#f8f9f9\">
									<td></td>
									<td><h5><b>Email: </b></h5></td>
									<td><h5>".$rwlist['email']."</h5></td>
								</tr>
								<tr bgcolor=\"#fdfefe\">
									<td></td>
									<td><h5><b>Mobile: </b></h5></td>
									<td><h5>".$rwlist['mobile']."</h5></td>
								</tr>
							</table>
						</td>
					</tr>
			</table>";
			
			//bottom table
	echo "<table>
			<tr bgcolor=\"#85c1e9\">
				<td width=\"140\"><font color=\"white\"><h4>Summary</h4></font></td>
				<td width=\"250\"></td>
				<td width=\"120\"></td>
				<td width=\"530\"></td>
			</tr>
			<tr bgcolor=\"#f8f9f9\">
				<td><h5><b>Marital Status: </b></h5></td>
				<td><h5>".$rwlist['marital']."</h5></td>
				<td><h5><b>Age: </b></h5></td>
				<td><h5>".$rwlist['age']."</h5></td>
			</tr>
			<tr bgcolor=\"#fdfefe\">
				<td><h5><b>Time Basis: </b></h5></td>
				<td><h5>".$rwlist['time_basis']."</h5></td>
				<td><h5><b>Next Of Kin: </b></h5></td>
				<td><h5>".$rwlist['next_of_kin']."</h5></td>
			</tr>
			<tr bgcolor=\"#f8f9f9\">
				<td><h5><b>Religion: </b></h5></td>
				<td><h5>".$rwlist['religion']."</h5></td>
				<td><h5><b>Reference: </b></h5></td>
				<td><h5>".$rwlist['work_experience']."</h5></td>
			</tr>
		</table>
		</td>
		<td width=\"50\"></td>
	</tr>
</table><br>
		<br>";		
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
