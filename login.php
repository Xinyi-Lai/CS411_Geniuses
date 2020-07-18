<?php 
    session_start();
    include_once "db_functions.php";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $msg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($username)) {
			$msg = "Username cannot be empty!";
		}
		else {
			$conn = connectDB();
			$sql = "SELECT * FROM Users WHERE NetId='$username' AND Password='$password'";
			$result = $conn->query($sql);
			// if match
			if ($result && $result->num_rows > 0) {
				$msg = "Logged in successfully!";
				$_SESSION['curr_user'] = $username; 
				header("location:profile.html");
				exit;
			} else {
				$msg = "Username and Password does not match!";
			}
			$conn->close();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Beacon - Login</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="">
	<meta name="keyword" content="">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	
	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<!-- <link rel="shortcut icon" href="img/favicon.ico"> -->
	<!-- end: Favicon -->
		
</head>

<body>

	<!-- start: Header -->
		<div class="navbar">
			<div class="navbar-inner">
				<!-- <img src="images/beaconlogo.png" style="height:100px; width:80px;"> -->
				<div class="container-fluid">
					
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					
					<a class="brand" href="index.html"><span>BEACON</span></a>
									
				</div>
			</div>
		</div>
	<!-- End: Header -->

    <div class="span6 offset4">
		<style>
			body {
			  background-image: url('images/background.png');
			}
		</style>
	
    <form class="form-register" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
		<fieldset>
			<div>
				<img src="images/beaconlogo.png" style="height:100px; width:80px;">
				<span class="header" style="font-size:50px">Login</span>
			</div>
			<div class='blank'> </div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Username</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="username" value="<?php echo $username;?>">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Password</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="password" value="<?php echo $password;?>">
				</div>
			</div>

			<div class="span6">
				<input type="submit" class="btn btn-register" name="submit" value="Log in">		
			</div>
			
			<label class="span6" for="focusedInput"> 
				<?php echo($msg); ?> <br> <br> <br>
				Don't have an account? 
				<input type="button" onclick="window.location.href='register.php'" value="Register"> 
			</label> 


		</fieldset>
	  </form>
	</div>
                

	
	<div class="clearfix"></div>
	
	<footer>
		<p>
			<span style="text-align:left;float:left">Copyright &copy; 2020. Company name All rights reserved.</span>
		</p>
	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
		<script src="js/jquery.flot.js"></script>
		<script src="js/jquery.flot.pie.js"></script>
		<script src="js/jquery.flot.stack.js"></script>
		<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
