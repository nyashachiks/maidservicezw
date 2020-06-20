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
$appCode= $_SESSION['appCode'];
//run search criteria
if(isset($_POST['submitted'])&&($_POST['submitted']=='Yes'))
	{
	//map order id to approval code
	$qoid= "SELECT * FROM orders WHERE app_code='$appCode'";
	$roid= mysqli_query($dbhandle, $qoid);
	$rwoid= mysqli_fetch_array($roid);
	$orderID= $rwoid['order_id'];
	//create session variable to pass to next page
	$_SESSION['orderID']= $orderID;
	
	//run the query
	$qsea= "SELECT * FROM maids WHERE status= 'PUBLISHED' ";
	
	if(!empty($_POST['location']))
		{
		$location= $_POST['location'];
		$qsea.= "AND location= '$location' ";
		}
	if(!empty($_POST['timeBasis']))
		{
		$timeBasis= $_POST['timeBasis'];
		$qsea.= "AND time_basis= '$timeBasis' ";
		}
	if(!empty($_POST['religion']))
		{
		$religion= $_POST['religion'];
		$qsea.= "AND religion= '$religion'";
		}
	$rsea= mysqli_query($dbhandle, $qsea);
		
	while($rwsea= mysqli_fetch_array($rsea, MYSQLI_ASSOC))
		{
		$maidID= $rwsea['maid_id'];
		//run insert of maid records into view_count
		$qinsm= "INSERT INTO view_count (order_id, maid_id, status, sess) VALUES ('$orderID', '$maidID', 0, '$orderID')";
		$rinsm= mysqli_query($dbhandle, $qinsm);
		echo $maidID." ";
		}
	header("Location: http://localhost/outface/profileList.php");
	}
	
	$qch= "SELECT * FROM orders WHERE app_code='$appCode'";
	$rch= mysqli_query($dbhandle, $qch);
	$rwch= mysqli_fetch_array($rch);
	$orderID= $rwch['order_id'];
	
	
	
	$qch2= "SELECT * FROM view_count WHERE order_id='$orderID'";
	$rch2= mysqli_query($dbhandle, $qch2);
	$numRowsCh2= mysqli_num_rows($rch2);
	
	if(!$numRowsCh2)
		{
		echo "<table>
			<tr>
				<td width=\"150\"></td>
				<td width=\"1200\">
					<form action=\"home.php\" method= \"POST\">
					<table>
						<tr bgcolor=\"#85c1e9\">
							<td width=\"20\"></td>
							<td width=\"100\"><font color=\"white\"><h4>Search</h4></font></td>
							<td width=\"200\"></td>
							<td width=\"120\"></td>
							<td width=\"300\"></td>
							<td width=\"100\"></td>
							<td width=\"200\"></td>
						</tr>
						<tr>
							<td></td>
							<td><font color=\"white\">.</font></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr bgcolor=\"#fdfefe\">
							<td></td>
							<td><h5>City</h5></td>
							<td><h5><select name=\"location\">";
							$location= array('Harare', 'Bulawayo', 'Gweru', 'Mutare', 'Kwekwe', 'Masvingo', 'Chegutu', 'Kadoma', 'Chinhoyi', 'Victoria Falls', 'Hwange');
								foreach($location as $value)
									{
									echo "<option value=\"".$value."\">".$value."</option>";	
									}			
							echo "</select></h5></td>
							<td><h5>Time Basis</h5></td>
							<td><h6><input type=\"radio\" name=\"timeBasis\" value=\"Part Time\"> Part Time <input type=\"radio\" name=\"timeBasis\" value=\"Full Time\"> Full Time</h6></td>
							<td><h5>Religion</h5></td>
							<td><h5><select name=\"religion\">";
											$religion= array('Christian', 'Muslim', 'Hindu', 'Traditional', 'Atheist');
												foreach($religion as $value)
													{
													echo "<option value=\"".$value."\">".$value."</option>";	
													}			
											echo "</select></h5></td>
						</tr>
					</table>
					<h4><button type=\"submit\" class=\"btn btn-primary\">Search</button></h4>
						<input type=\"hidden\" name=\"submitted\" value=\"Yes\">
					</form>
				</td>
				<td width=\"50\"></td>
			</tr>
		</table>";	
		}

?>
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
