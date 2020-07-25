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
			$usernameErr = "* Username is required.";
		}
		if (empty($password)) {
			$passwordErr = "* Password is required.";
		}
		if (empty($confirm_password)) {
			$confirmpasswordErr = "* Please confirm your password.";
		} else if ($confirm_password != $password) {
			$confirmpasswordErr = "* Your passwords do not agree.";
		}
		if (empty($name)) {
			$nameErr = "* Name cannot be empty.";
		}
		if (empty($email)) {
			$emailErr = "* Email cannot be empty.";
		} else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
            $emailErr = "* Invalid email format."; 
        }
		if (empty($campus)) {
			$campusErr = "* Please select your campus.";
		}
		if (empty($major)) {
			$majorErr = "* Please select your major.";
		}
		if (empty($year)) {
			$yearErr = "* Please select your school year.";
		}

		if ($usernameErr || $passwordErr || $confirmpasswordErr || $nameErr || $emailErr || $campusErr || $majorErr || $yearErr) {
			$msg = "* Please check your input again";
		} else {
			$conn = connectDB();

			$sql = "SELECT * FROM Users WHERE NetId='$username'";
			$result = $conn->query($sql);
			if ($result && $result->num_rows > 0) {
				$usernameErr = "User already exists!";
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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BEACON - Register</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary clean-navbar" style="height: 60px; padding-top: 30px;">
        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><a class="navbar-brand text-white logo" href="index.php"><p style="font-size: larger;">BEACON</p></a>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto"></ul>
            </div>
        </div>
    </nav>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Welcome to Beacon - Registration</h2>
				</div>
				<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

					<!-- Username input -->
                    <div class="form-group">
						<label for="focusedInput">Username</label> <span class="warning"> <?php echo $usernameErr;?></span>
						<input class="form-control item" id="focusedInput" type="text" name="username" value="<?php echo $username;?>">
					</div>
					
					<!-- Password input -->
					<div class="form-group">
						<label for="focusedInput">Password</label> <span class="warning"> <?php echo $passwordErr;?></span>
						<input class="form-control item" id="focusedInput" type="password" name="password" value="<?php echo $password;?>">
					</div>

					<!-- Password confirm -->
                    <div class="form-group">
						<label for="focusedInput">Confirm Password</label> <span class="warning"> <?php echo $confirmpasswordErr;?></span>
						<input class="form-control item" id="focusedInput" type="password" name="confirm_password" value="<?php echo $confirm_password;?>">
					</div>

					<!-- Name input -->
                    <div class="form-group">
						<label for="focusedInput">Name</label> <span class="warning"> <?php echo $nameErr;?></span>
						<input class="form-control item" id="focusedInput" type="text" name="name" value="<?php echo $name;?>">
					</div>

					<!-- Email input -->
                    <div class="form-group">
						<label for="focusedInput">Email</label> <span class="warning"> <?php echo $emailErr;?></span>
						<input class="form-control item" id="focusedInput" type="text" name="email" value="<?php echo $email;?>">
					</div>

					<!-- Campus choose -->
                    <div class="form-group">
						<label for="selectError3">Campus</label> <span class="warning"> <?php echo $campusErr;?></span>
						<select class="form-control" id="selectError3" name="campus" value="<?php echo $campus;?>">
							<optgroup label="Campus">
								<option value="" selected disabled hidden>--</option>
								<option value="UIUC" <?php echo $campus=='UIUC' ? 'selected':'' ?> > UIUC </option>
								<option value="ZJUIntl" <?php echo $campus=='ZJUIntl' ? 'selected':'' ?> > ZJUIntl </option>
								<option value="ZJU" <?php echo $campus=='ZJU' ? 'selected':'' ?> > ZJU </option>
							</optgroup>
						</select>
					</div>

					<!-- Major choose -->
                    <div class="form-group">
						<label for="selectError3">Major</label> <span class="warning"> <?php echo $majorErr;?></span>
						<select class="form-control" id="selectError3" name="major">
							<optgroup label="Major">
								<option value="" selected disabled hidden>--</option>
								<option value="BMI" <?php echo $major=='BMI' ? 'selected':'' ?> >BMI</option>
								<option value="BMS" <?php echo $major=='BMS' ? 'selected':'' ?> >BMS</option>
								<option value="CS" <?php echo $major=='CS' ? 'selected':'' ?> >Computer Science</option>
								<option value="CompE" <?php echo $major=='CompE' ? 'selected':'' ?> >Computer Engineering</option>
								<option value="CEE" <?php echo $major=='CEE' ? 'selected':'' ?> >Civil and Environment Engineering</option>
								<option value="EE" <?php echo $major=='EE' ? 'selected':'' ?> >Electrical Engineering</option>
								<option value="ME" <?php echo $major=='ME' ? 'selected':'' ?> >Mechanical Engineering</option>
								<option value="other" <?php echo $major=='other' ? 'selected':'' ?> >Other</option>
							</optgroup>
						</select>
					</div>
					
					<!-- Year choose -->
                    <div class="form-group">
						<label for="selectError3">School Year</label> <span class="warning"> <?php echo $yearErr;?></span>
						<select class="form-control" id="selectError3" name="year">
							<optgroup label="School Year">
								<option value="" selected disabled hidden>--</option>
								<option value="Freshman" <?php echo $year=='Freshman' ? 'selected':'' ?> >Freshman</option>
								<option value="Sophomore" <?php echo $year=='Sophomore' ? 'selected':'' ?> >Sophomore</option>
								<option value="Junior" <?php echo $year=='Junior' ? 'selected':'' ?> >Junior</option>
								<option value="Senior" <?php echo $year=='Senior' ? 'selected':'' ?> >Senior</option>
								<option value="Graduate" <?php echo $year=='Graduate' ? 'selected':'' ?> >Graduate</option>
							</optgroup>
						</select>
					</div>

				<div class="form-group">
					<fieldset>
						<legend></legend>
					</fieldset>
				</div>

				<button class="btn btn-primary btn-block" type="submit">Sign Up</button>
				<span style="font-size:16px;"><a href="login.php">Already have an account?</a></span>
			</form>
			
            </div>
        </section>
    </main>
	
	<footer class="page-footer dark">
        <div class="container">
            <div class="row">

                <div class="col-sm-3">
                    <div class="single-widget">
                        <h5>ABOUT US</h5>
                        <ul>
                            <span class="white-font">CS411 2020 Summer Course Project</br></span>
                            <span class="white-font">Team Geniuses</br></span>
                            <span class="white-font">Xinyi Lai: xlai7@illinois.edu</br></span>
                            <span class="white-font">Jiaqi Lou: jiaqil6@illinois.edu</br></span>
                            <span class="white-font">Hanyin Shao: hanyins2@illinois.edu</br></span>
                            <span class="white-font"> Kerui Zhu: keruiz2@illinois.edu</span>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="single-widget">
                    	<h5>INFORMATION</h5>
                        <ul>
                            <span class="white-font"><a href="#">Frequently Asked Question</a></br></span>
                            <span class="white-font"><a href="#">Terms and Condition</a></br></span>
                            <span class="white-font"><a href="#">Privacy Policy</a></br></span>
                            <span class="white-font"><a href="#">Customer Service</a></br></span>
                            <span class="white-font"><a href="#">Delivery Information</a></br></span>
                            <span class="white-font"><a href="#">Manufacturers</a></br></span>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="single-widget">
                    	<h5>CUSTOMER CARE</h5>
                        <ul>
                            <span class="white-font"><a href="#">Contact Us</a></br></span>
                            <span class="white-font"><a href="#">Sitemap</a></br></span>
                            <span class="white-font"><a href="#">Live Chat 24x7</a></br></span>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-3">
                    <div class="single-widget-1">
                    <h5>OUR SERVICES</h5>
                        <ul>
                            <span class="white-font"><a href="#">Secure Shopping</a></br></span>
                        </ul>
                    </div>  
				</div>
				
            </div>
        </div>
	</footer>
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
	<script src="assets/js/theme.js"></script>
	
</body>

</html>