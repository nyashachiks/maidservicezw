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
<html>
<?php
require('db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Maid Service | Upload Image</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/logo.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/logo.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['name']; ?> - Admin
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/outface/logout.php" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>        
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/logo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="home.php"><i class="fa fa-circle-o"></i>Home</a></li>
          </ul>
        </li>
		<?php
		//count the number of registrations and CVs
		$qm1= "SELECT * FROM maids";
		$rm1= mysqli_query($dbhandle, $qm1);
		$rwm1= mysqli_num_rows($rm1);
		
		$qo2= "SELECT * FROM orders";
		$ro2= mysqli_query($dbhandle, $qo2);
		$rwo2= mysqli_num_rows($ro2);
		?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>CVs</span>
            <span class="pull-right-container">
			<span class="label label-primary pull-right"><?php echo $rwm1; ?></span>
            </span>
          </a>
		  <ul class="treeview-menu">
			<li><a href="createCV.php"><i class="fa fa-circle-o"></i>Create CV</a></li>
            <li><a href="viewNewCVs.php"><i class="fa fa-circle-o"></i>Manage New CVs</a></li>
            <li><a href="viewPublishedCVs.php"><i class="fa fa-circle-o"></i>Manage Published CVs</a></li>
			<li><a href="viewClosedCVs.php"><i class="fa fa-circle-o"></i>Manage Closed CVs</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $rwo2; ?></span>
            </span>
          </a>
		  <ul class="treeview-menu">
            <li><a href="processOrder.php"><i class="fa fa-circle-o"></i>Process New Order</a></li>
            <li><a href="viewOrders.php"><i class="fa fa-circle-o"></i>View All Orders</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create CV
        <small>Create new CV here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create CV</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	<?php
	 if(isset($_POST['saved'])&&($_POST['saved']=='Yes'))
		{
		//initialize error array
		$errors= array();
		//validate name
		if(isset($_POST['name'])&&(!empty($_POST['name'])))
			{
			$nameTemp= $_POST['name'];
			$nameArray= explode(' ', $nameTemp);
			$name= $nameArray[0];
			$surname= $nameArray[1];	
			}
		else
			{
			$errors[]= 'Name not populated';	
			}
		//validate id num
		if(isset($_POST['idNum'])&&(!empty($_POST['idNum'])))
			{
			$idNum= $_POST['idNum'];	
			}
		else
			{
			$errors[]= 'I.D number not populated';	
			}
		//validate address
		if(isset($_POST['address'])&&(!empty($_POST['address'])))
			{
			$address= $_POST['address'];	
			}
		else
			{
			$errors[]= 'Address not populated';	
			}
		//validate location
		if(isset($_POST['location']))
			{
			$location= $_POST['location'];	
			}
		else
			{
			$errors[]= 'Location not selected';	
			}
		//validate marital status
		if(isset($_POST['marital'])&&(!empty($_POST['marital'])))
			{
			$marital= $_POST['marital'];	
			}
		else
			{
			$errors[]= 'Marital status not selected';	
			}
		//validate age
		if(isset($_POST['age']))
			{
			$age= $_POST['age'];	
			}
		else
			{
			$errors[]= 'Age not selected';	
			}
		//validate email
		if(isset($_POST['email']))
			{
			$email= $_POST['email'];	
			}
		else
			{
			$email= 'N/A';	
			}
		//validate mobile
		if(isset($_POST['mobile'])&&(!empty($_POST['mobile'])))
			{
			$mobile= $_POST['mobile'];	
			}
		else
			{
			$errors[]= 'Mobile not populated';
			}
		//validate next of kin
		if(isset($_POST['nextOfKin'])&&(!empty($_POST['nextOfKin'])))
			{
			$nextOfKin= $_POST['nextOfKin'];	
			}
		else
			{
			$errors[]= 'Next of kin not populated';	
			}
		//validate time basis
		if(isset($_POST['timeBasis'])&&(!empty($_POST['timeBasis'])))
			{
			if($_POST['timeBasis']=='pt')
				{
				$timeBasis= 'Part Time';	
				}
			if($_POST['timeBasis']=='ft')
				{
				$timeBasis= 'Full Time';	
				}
			}
		else
			{
			$errors[]= 'Time basis not selected';	
			}
		//validate religion
		if(isset($_POST['religion']))
			{
			$religion= $_POST['religion'];	
			}
		else
			{
			$errors[]= 'Religion not selected';	
			}
		//validate work experience
		if(isset($_POST['workExperience'])&&(!empty($_POST['workExperience'])))
			{
			$workExperience= $_POST['workExperience'];	
			}
		else
			{
			$errors[]= 'Work experience not populated';	
			}
		//if errors array is empty
		if(empty($errors))
			{
			//execute an insert query
			$qins= "INSERT INTO maids (name, surname, id_num, email, mobile, cv, status, image, age, address, location, marital, next_of_kin, time_basis, religion, work_experience) 
			VALUES ('$name', '$surname', '$idNum', '$email', '$mobile', 'test', 'NEW', 'blank', '$age', '$address', '$location', '$marital', '$nextOfKin', '$timeBasis', '$religion', '$workExperience')";
			$rins= mysqli_query($dbhandle, $qins);
			echo "Insert successful";
			$qlist= "SELECT * FROM maids WHERE id_num= '$idNum'";
			$rlist= mysqli_query($dbhandle, $qlist);
			while($rwlist= mysqli_fetch_array($rlist, MYSQLI_ASSOC)){
			echo "<table>
					<tr>
						<td><img src=\"dist/img/".$rwlist['image'].".jpg\" height=\"300\" width=\"300\"></td>
						<td width=\"20\"></td>
						<td>
							<table>
							<tr bgcolor=\"#212f3c\">
								<td width=\"20\"></td>
								<td width=\"200\"><b><font color=\"white\"><h3><b><i>Details</i></b></h3></font></b></td>
								<td width=\"400\"></td>
							</tr>
							<tr bgcolor=\"#f8f9f9\">
								<td></td>
								<td width=\"200\"><h4><b>Name:</b></h4></td>
								<td><h4>".$rwlist['name']." ".$rwlist['surname']."</td>
							</tr>
							<tr bgcolor=\"#fdfefe\">
								<td></td>
								<td><h4><b>ID: </b></h4></td>
								<td><h4>".$rwlist['id_num']."</h4></td>
							</tr>
							<tr bgcolor=\"#f8f9f9\">
								<td></td>
								<td><h4><b>Address: </b></h4></td>
								<td><h4>".$rwlist['address']."</h4></td>
							</tr>
							<tr bgcolor=\"#fdfefe\">
								<td></td>
								<td><h4><b>City: </b></h4></td>
								<td><h4>".$rwlist['location']."</h4></td>
							</tr>
							<tr bgcolor=\"#f8f9f9\">
								<td></td>
								<td><h4><b>Email: </b></h4></td>
								<td><h4>".$rwlist['email']."</h4></td>
							</tr>
							<tr bgcolor=\"#fdfefe\">
								<td></td>
								<td><h4><b>Mobile: </b></h4></td>
								<td><h4>".$rwlist['mobile']."</h4></td>
							</tr>
						</table>
						</td>
					</tr>
					<tr>
						<td>
						<form enctype=\"multipart/form-data\" action=\"uploadImage.php\" method=\"POST\">
								<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"5242880\">
								Upload Image
								<h6>Click \"Browse\"</h6>: <input type=\"file\" name=\"upload\">
								<div align=\"center\">
								<button type=\"submit\" class=\"btn btn-primary\">Submit</button>
								<input type=\"hidden\" name=\"idNum\" value=\"".$rwlist['id_num']."\">
								<input type=\"hidden\" name=\"photoSubmitted\" value=\"TRUE\">
								</div>
						</td>
						<td>
						</td>
					</tr>
				</table><br>";
				echo "<table>
						<tr bgcolor=\"#212f3c\">
							<td width=\"140\"><font color=\"white\"><h3>Summary</h3></font></td>
							<td width=\"200\"></td>
							<td width=\"120\"></td>
							<td width=\"480\"></td>
						</tr>
						<tr bgcolor=\"#f8f9f9\">
							<td><h4><b>Marital Status: </b></h4></td>
							<td><h4>".$rwlist['marital']."</h4></td>
							<td><h4><b>Age: </b></h4></td>
							<td><h4>".$rwlist['age']."</h4></td>
						</tr>
						<tr bgcolor=\"#fdfefe\">
							<td><h4><b>Time Basis: </b></h4></td>
							<td><h4>".$rwlist['time_basis']."</h4></td>
							<td><h4><b>Next Of Kin: </b></h4></td>
							<td><h4>".$rwlist['next_of_kin']."</h4></td>
						</tr>
						<tr bgcolor=\"#f8f9f9\">
							<td><h4><b>Religion: </b></h4></td>
							<td><h4>".$rwlist['religion']."</h4></td>
							<td><h4><b>Reference: </b></h4></td>
							<td><h4>".$rwlist['work_experience']."</h4></td>
						</tr>
					</table>";
				}
			}
		else
			{
			echo "The following errors occurred<br>";
			foreach($errors as $msg)
				{
				echo "-".$msg."<br>";
				}
			}
		}


//check if image-upload form has been submitted
if(isset($_POST['photoSubmitted']))
	{
	//check for an uploaded file
	if(isset($_FILES['upload']))
		{
		//validate the type. should be JPG or PNG
		$allowed= array('image/jpeg', 'image/pjpeg', 'image/jpg', 'image/JPG', 'image/PNG', 'image/png', 'image/X-PNG', 'image/x-png');
		
		if(in_array($_FILES['upload']['type'], $allowed))
			{
			//update the name
			$test= 'Testing123';
			$newNameArray= explode(".", $_FILES['upload']['name']);
			$newName= $_POST['idNum'].".".$newNameArray[1];
			
			//move the file over
			if(move_uploaded_file($_FILES['upload']['tmp_name'], "dist/img/".$newName))
				{
				echo "File has been successfully uploaded";
				}
			else
				{
				echo "Please upload a JPG or PNG file";	
				}
			}
		}
	if(file_exists($_FILES['upload']['tmp_name'])&&(is_file($_FILES['upload']['tmp_name'])))
		{
		unlink($_FILES['upload']['tmp_name']);	
		}
		
	//insert image name into table
	$qim= "UPDATE maids SET image='".$_POST['idNum']."' WHERE id_num='".$_POST['idNum']."'";
	$rim= mysqli_query($dbhandle, $qim);
	
	//retrieve the record
	$qlist= "SELECT * FROM maids WHERE id_num= '".$_POST['idNum']."'";
			$rlist= mysqli_query($dbhandle, $qlist);
			while($rwlist= mysqli_fetch_array($rlist, MYSQLI_ASSOC)){
			echo "<table>
					<tr>
						<td><img src=\"dist/img/".$rwlist['image'].".jpg\" height=\"300\" width=\"300\"></td>
						<td width=\"20\"></td>
						<td>
							<table>
							<tr bgcolor=\"#212f3c\">
								<td width=\"20\"></td>
								<td width=\"200\"><b><font color=\"white\"><h3><b><i>Details</i></b></h3></font></b></td>
								<td width=\"400\"></td>
							</tr>
							<tr bgcolor=\"#f8f9f9\">
								<td></td>
								<td width=\"200\"><h4><b>Name:</b></h4></td>
								<td><h4>".$rwlist['name']." ".$rwlist['surname']."</td>
							</tr>
							<tr bgcolor=\"#fdfefe\">
								<td></td>
								<td><h4><b>ID: </b></h4></td>
								<td><h4>".$rwlist['id_num']."</h4></td>
							</tr>
							<tr bgcolor=\"#f8f9f9\">
								<td></td>
								<td><h4><b>Address: </b></h4></td>
								<td><h4>".$rwlist['address']."</h4></td>
							</tr>
							<tr bgcolor=\"#fdfefe\">
								<td></td>
								<td><h4><b>City: </b></h4></td>
								<td><h4>".$rwlist['location']."</h4></td>
							</tr>
							<tr bgcolor=\"#f8f9f9\">
								<td></td>
								<td><h4><b>Email: </b></h4></td>
								<td><h4>".$rwlist['email']."</h4></td>
							</tr>
							<tr bgcolor=\"#fdfefe\">
								<td></td>
								<td><h4><b>Mobile: </b></h4></td>
								<td><h4>".$rwlist['mobile']."</h4></td>
							</tr>
						</table>
						</td>
					</tr>
				</table><br>";
				//bottom table
				echo "<table>
						<tr bgcolor=\"#212f3c\">
							<td width=\"140\"><font color=\"white\"><h3>Summary</h3></font></td>
							<td width=\"200\"></td>
							<td width=\"120\"></td>
							<td width=\"480\"></td>
						</tr>
						<tr bgcolor=\"#f8f9f9\">
							<td><h4><b>Marital Status: </b></h4></td>
							<td><h4>".$rwlist['marital']."</h4></td>
							<td><h4><b>Age: </b></h4></td>
							<td><h4>".$rwlist['age']."</h4></td>
						</tr>
						<tr bgcolor=\"#fdfefe\">
							<td><h4><b>Time Basis: </b></h4></td>
							<td><h4>".$rwlist['time_basis']."</h4></td>
							<td><h4><b>Next Of Kin: </b></h4></td>
							<td><h4>".$rwlist['next_of_kin']."</h4></td>
						</tr>
						<tr bgcolor=\"#f8f9f9\">
							<td><h4><b>Religion: </b></h4></td>
							<td><h4>".$rwlist['religion']."</h4></td>
							<td><h4><b>Reference: </b></h4></td>
							<td><h4>".$rwlist['work_experience']."</h4></td>
						</tr>
					</table>";
			}
	}
	
	?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Eccensys Technologies.</strong>
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
