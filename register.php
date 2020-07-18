<?php 
    include_once "db_functions.php";
    
    $username = ppc($_POST["username"]);
	$password = ppc($_POST["password"]);
	$confirm_password = ppc($_POST["confirm_password"]);
    $name = ppc($_POST["name"]);
	$email = ppc($_POST["email"]);
	$campus = $_POST['campus'];
	$major = $_POST['major'];
	$year = $_POST['year'];

	$msg = "";
	$usernameErr = $passwordErr = $confirmpasswordErr = $nameErr = $emailErr = $campusErr = $majorErr = $yearErr = "";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($username)) {
			$usernameErr = "Username is required.";
		}
		if (empty($password)) {
			$passwordErr = "Password is required.";
		}
		if (empty($confirm_password)) {
			$confirmpasswordErr = "Please confirm your password.";
		} else if ($confirm_password != $password) {
			$confirmpasswordErr = "Your passwords do not agree.";
		}
		if (empty($name)) {
			$nameErr = "Name cannot be empty.";
		}
		if (empty($email)) {
			$emailErr = "Email cannot be empty.";
		} else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "Invalid email format."; 
        }
		if (empty($campus)) {
			$campusErr = "Please select your campus.";
		}
		if (empty($major)) {
			$majorErr = "Please select your major.";
		}
		if (empty($year)) {
			$yearErr = "Please select your school year.";
		}

		if ($usernameErr || $passwordErr || $confirmpasswordErr || $nameErr || $emailErr || $campusErr || $majorErr || $yearErr) {
			$msg = "Please check your input again";
		} else {
			$conn = connectDB();

			$sql = "SELECT * FROM Users WHERE NetId='$username'";
			$result = $conn->query($sql);
			if ($result && $result->num_rows > 0) {
				$msg = "User already exists!";
			} else {
				$sql = "INSERT INTO Users (NetId, Password, Name, Campus, Email, Major, Year)
						VALUES ('$username', '$password', '$name', '$campus', '$email', '$major', '$year')";
				if ($conn->query($sql)) {
					$msg = "Successfully registered!";
					header("location:login.php");
					exit;
				} else {
					$msg = "Error: " . $sql . "<br>" . $conn->error;
				}
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
	<title>Beacon - Register</title>
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
	<!-- start: Header -->
	
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
					<span class="header" style="font-size:50px">Welcome to Beacon</span>
			</div>
			<div class='blank'></div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Username</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="username" value="<?php echo $username;?>">
				<span>* <?php echo $usernameErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Password</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="password" value="<?php echo $password;?>">
				<span>* <?php echo $passwordErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Confirm Password</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="confirm_password" value="<?php echo $confirm_password;?>">
				<span>* <?php echo $confirmpasswordErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Name</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="name" value="<?php echo $name;?>">
				<span>* <?php echo $nameErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="focusedInput">Email</label>
				<div class="controls">
				<input class="input-xlarge focused" id="focusedInput" type="text" name="email" value="<?php echo $email;?>">
				<span>* <?php echo $emailErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="selectError3">Campus</label>
				<div class="controls">
				<select id="selectError3" name="campus" value="<?php echo $campus;?>">
					<option value="" selected disabled hidden>--</option>
					<option value="UIUC" <?php echo $campus=='UIUC' ? 'selected':'' ?> > UIUC </option>
					<option value="ZJUIntl" <?php echo $campus=='ZJUIntl' ? 'selected':'' ?> > ZJUIntl </option>
				</select>
				<span>* <?php echo $campusErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="selectError3">Major</label>
				<div class="controls">
				<select id="selectError3" name="major">
					<option value="" selected disabled hidden>--</option>
					<option value="BMI" <?php echo $major=='BMI' ? 'selected':'' ?> >BMI</option>
					<option value="BMS" <?php echo $major=='BMS' ? 'selected':'' ?> >BMS</option>
					<option value="CS" <?php echo $major=='CS' ? 'selected':'' ?> >Computer Science</option>
					<option value="CompE" <?php echo $major=='CompE' ? 'selected':'' ?> >Computer Engineering</option>
					<option value="CEE" <?php echo $major=='CEE' ? 'selected':'' ?> >Civil and Environment Engineering</option>
					<option value="EE" <?php echo $major=='EE' ? 'selected':'' ?> >Electrical Engineering</option>
					<option value="ME" <?php echo $major=='ME' ? 'selected':'' ?> >Mechanical Engineering</option>
					<option value="other" <?php echo $major=='other' ? 'selected':'' ?> >Other</option>
				</select>
				<span>* <?php echo $majorErr;?></span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="selectError3">School Year</label>
				<div class="controls">
				<select id="selectError3" name="year">
					<option value="" selected disabled hidden>--</option>
					<option value="freshman" <?php echo $year=='freshman' ? 'selected':'' ?> >Freshman</option>
					<option value="sophomore" <?php echo $year=='sophomore' ? 'selected':'' ?> >Sophomore</option>
					<option value="junior" <?php echo $year=='junior' ? 'selected':'' ?> >Junior</option>
					<option value="senior" <?php echo $year=='senior' ? 'selected':'' ?> >Senior</option>
					<option value="graduate" <?php echo $year=='graduate' ? 'selected':'' ?> >Graduate</option>
				</select>
				<span>* <?php echo $yearErr;?></span>
				</div>
			</div>
			
			<div class="span6">
				<button type="submit" class="btn btn-register">Register</button>
				<?php echo($msg); ?> <br>
				Already have an account? 
				<input type="button" onclick="window.location.href='login.php'" value="Log in"> 
			</div>

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
