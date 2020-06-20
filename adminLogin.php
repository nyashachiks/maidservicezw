<?php
session_start();
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

  <title>Admin Login</title>

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
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php">Preview</a></li>
          <li><a href="index.php">How to view CVs</a></li>
          <li><a href="index.php">Contact</a></li>
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
<br><br><br><br><br><br><br><br><br>
	<?php
	//validate the login
	if(isset($_POST['submitted'])&&($_POST['submitted']=='Yes'))
		{
		//initialize error array
		$errors= array();
		
		//validate username and password
		if(!empty($_POST['username']))
			{
			$username= $_POST['username'];
			}
		else
			{
			$errors[]= 'Username not entered';
			}
		if(!empty($_POST['password']))
			{
			$password= $_POST['password'];
			}
		else
			{
			$errors[]= 'Password not entered';
			}
		//if no errors occurred
		if(empty($errors))
			{
			$qlog= "SELECT * FROM users WHERE username= '$username' AND password=md5('$password')";
			$rlog= mysqli_query($dbhandle, $qlog);
			$numRows= mysqli_num_rows($rlog);
			echo $numRows;
			if($numRows)
				{
				//set the session variable
				$rwlog= mysqli_fetch_array($rlog, MYSQLI_ASSOC);
				$_SESSION['name']= $rwlog['name'];
				$_SESSION['loggedin']= md5($rwlog['name']);
				
				
				//redirect to dashboard
				header("Location: http://localhost/outface/chichi/home.php");
				//exit script
				exit();
				}
			}
		else
			{
			echo "<div align=\"center\">The following errors occurred<br>";
			foreach($errors as $msg)
				{
				echo "-".$msg."<br>";
				}
			echo "</div><br>";
			}
		}
	
	?>

	<div align="center">
		<h3>Administrator Login</h3>
		<form action="adminLogin.php" method="POST">
		<table>
			<tr>
				<td width="150"><h4>Username</h4></td>
				<td width="300"><h3><input type="text" name="username" size="40" maxlength="20"></h3></td>
				<td width="50"></td>
			</tr>
			<tr>
				<td><h4>Password</h4></td>
				<td><h3><input type="password" name="password" size="40" maxlength="20"></h3></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><div align="center"><h3><button type="submit" class="btn btn-primary">Login</button></h3>
											<input type="hidden" name="submitted" value="Yes"></div></td>
				<td></td>
			</tr>
		</table>
		</form>
	</div>

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
