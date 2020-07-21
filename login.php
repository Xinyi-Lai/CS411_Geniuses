<?php 
    session_start();
    include_once "db_functions.php";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $msg = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($username)) {
			$msg = " * Username cannot be empty!";
		}
		else {
			$conn = connectDB();
			$sql = "SELECT * FROM Users WHERE NetId='$username' AND Password='$password'";
			$result = $conn->query($sql);
			// if match
			if ($result && $result->num_rows > 0) {
				$msg = "Logged in successfully!";
				$_SESSION['curr_user'] = $username; 
				header("location:index.php");
				exit;
			} else {
				$msg = "Username and Password do not match!";
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
    <title>BEACON - Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
    
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary clean-navbar" style="height: 60px; padding-top: 30px;">
        <div class="container">
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-white logo" href="index.php">
                <p style="font-size: larger;">BEACON</p>
            </a>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto"></ul>
            </div>
        </div>
    </nav>

    <main class="page login-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Welcome to Beacon - Login</h2>
                </div>
                
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="form-group">
                        <label>Username &nbsp; <span class='warning'><?php echo($msg); ?></span> </label>
                        <input class="form-control item" type="text" name="username" value="<?php echo $username;?>">
                    </div>
					
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" value="<?php echo $password;?>">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkbox">
                            <label class="form-check-label" for="checkbox">Remember me</label>
                        </div>
                    </div>

					<input type="submit" class="btn btn-primary btn-block" name="submit" value="Log In">
					<span style="font-size:16px;"><a href="register.php">Don't have an account?</a></span>

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
                            <span class="white-font">Kerui Zhu: keruiz2@illinois.edu</span>
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
