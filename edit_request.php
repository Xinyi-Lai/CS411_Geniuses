<?php 
    include_once "db_functions.php";
    session_start();
    $requestid = (int)$_GET['id'];

    if ($requestid) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $seller_id = $_SESSION['curr_user'];
            $product_name = ppc($_POST["product_name"]);
            $tag = ppc($_POST["tag"]);
            $description = ppc($_POST["description"]);
            $intended_price = (double)ppc($_POST["intendedPrice"]);

            if ($product_name != "" && $intended_price > 0 && file_exists($_FILES['image']['tmp_name'])) {
                
                // make directory if not exists
                $upload_dir="images/".$seller_id."/";
                if(!is_dir($upload_dir)) { mkdir($upload_dir); }
                // filename
                $postfix = substr($_FILES['image']['name'],strrpos($_FILES['image']['name'],'.'));
                $filename = $upload_dir.date("YmdHis").$postfix;
                
                // upload file to the server
                if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
                    $conn = connectDB();
                    
                    // delete the old image
                    $sql = "SELECT * FROM Requests WHERE RequestId=$requestid";
                    $result = $conn->query($sql);
                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $original_filepath = $row['Image'];
                        if(is_file($original_filepath)) { 
                            unlink($original_filepath);
                        }
                    }
                    else {
                        $msg = "Delete old image Error: " . $sql . "<br>" . $conn->error;
                        header("location:index.php");
                        exit;
                    }

                    // update record
                    $sql = "UPDATE Requests 
						    SET ProductName = '$product_name', Tag = '$tag', Description = '$description', Image = '$filename', IntendedPrice = '$intended_price'
                            WHERE RequestId = '$requestid'";
                    if ($conn->query($sql)) {
                        header("location:myrequests.php");
                        exit;
                    } else {
                        $msg = 'Update fail';
                    }
                

                    $conn->close();
                } else {
                    $msg = 'Store fail';
                }
            } else if ($product_name != "" && $intended_price > 0){
                    $conn = connectDB();
                    
                    // update record
                    $sql = "UPDATE Requests 
						    SET ProductName = '$product_name', Tag = '$tag', Description = '$description', IntendedPrice = '$intended_price'
                            WHERE RequestId = '$requestid'";
                    if ($conn->query($sql)) {
                        header("location:myrequests.php");
                        exit;
                    } else {
                        $msg = 'Update fail';
                    }
                    $conn->close();
                
            }
            else
            {
                $msg = 'Wrong information';
            }
        }

        else {
            $conn = connectDB();
            $sql = "SELECT * FROM Requests WHERE RequestId=$requestid";
            $result = $conn->query($sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
            
                $product_name = $row['ProductName'];
                $tag = $row['Tag'];
                $description = $row['Description'];
                $intended_price = $row['IntendedPrice'];
            }
            else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }

    }

    //echo "<script>console.log('$msg')</script>";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>BEACON - Edit_Request</title>
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
    <main class="page post-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Edit Your Request</h2>
				</div>
				<form action="" method="post" enctype="multipart/form-data">

					<!-- productName input -->
                    <div class="form-group">
						<label for="focusedInput">Product Name</label>
						<input class="form-control item" type="text" name="product_name" value="<?php echo $product_name;?>"/>
					</div>
					
					<!-- tag input -->
                    <div class="form-group">
						<label for="focusedInput">Tag</label><span class="warning"> <?php echo $tag_err;?></span>
                        <select class="form-control" id="tag" name="tag">
							<optgroup label="tag">
								<option value="textbook" <?php echo $tag=="textbook" ? 'selected':'' ?> >textbook</option>
                                <option value="test prep" <?php echo $tag=="test prep" ? 'selected':'' ?> >test prep</option>
                                <option value="otherbooks" <?php echo $tag=="otherbooks" ? 'selected':'' ?> >otherbooks</option>
                                <option value="electronics"<?php echo $tag=="electronics" ? 'selected':'' ?> >electronics</option>
                                <option value="accessories" <?php echo $tag=="accessories" ? 'selected':'' ?> >accessories</option>
                                <option value="toys/games" <?php echo $tag=="toys/games" ? 'selected':'' ?> >toys/games</option>
                                <option value="makeup/personal care" <?php echo $tag=="makeup/personal care" ? 'selected':'' ?> >makeup/personal care</option>
                                <option value="clothing" <?php echo $tag=="clothing" ? 'selected':'' ?> >clothing</option>
                                <option value="daily necessity" <?php echo $tag=="daily necessity" ? 'selected':'' ?> >daily necessity</option>
                                <option value="sports" <?php echo $tag=="sports" ? 'selected':'' ?> >sports</option>
                                <option value="jewelry" <?php echo $tag=="jewelry" ? 'selected':'' ?> >jewelry</option>
                                <option value="furniture" <?php echo $tag=="furniture" ? 'selected':'' ?> >furniture</option>
                                <option value="stationery" <?php echo $tag=="stationery" ? 'selected':'' ?> >stationery</option>
                                <option value="food" <?php echo $tag=="food" ? 'selected':'' ?> >food</option>
                                <option value="tools" <?php echo $tag=="tools" ? 'selected':'' ?> >tools</option>
                                <option value="sublease" <?php echo $tag=="sublease" ? 'selected':'' ?> >sublease</option>
                                <option value="other" <?php echo $tag=="other" ? 'selected':'' ?> >other</option>
							</optgroup>
						</select>
					</div>

					<!-- description confirm -->
                    <div class="form-group">
						<label for="focusedInput">Description</label> 
						<input class="form-control item" type="text" name="description" value="<?php echo $description;?>"/>
					</div>

					<!-- intendedPrice input -->
                    <div class="form-group">
						<label for="focusedInput">Intended Price</label>
						<input class="form-control item" type="text" name="intendedPrice" value="<?php echo $intended_price;?>"/>
					</div>

                    <!-- Image upload -->
                    <div class="form-group">
						<label for="focusedInput">Image</label><br/>
						<input type="file" name="image"/><br/>
					</div>

                    <div class="form-group">
					<fieldset>
						<legend></legend>
					</fieldset>
				    </div>

				<button class="btn btn-primary btn-block" type="submit" name="submit">Post</button>
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
