<?php
	include_once "db_functions.php";
	$conn = connectDB();
	
	session_start(); 
    $curr_user = $_SESSION['curr_user'];
	$sql = "SELECT * FROM Users WHERE NetId='$curr_user' ";
	$result = $conn->query($sql);

	if ($result && $result->num_rows == 1) {
		$row = $result->fetch_assoc();
		$username = $row["NetId"];
		$name = $row["Name"];
		$email = $row["Email"];
		$campus = $row["Campus"];
		$year = $row["Year"];
		$major = $row["Major"];
	} else {
		$msg = "Error!";
	}
	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Beacon - User Profile</title>
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
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
		
</head>

<body>
	<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"><span>BEACON</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<!-- start: Message Dropdown -->
						<li class="dropdown hidden-phone">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="icon-envelope"></i>
								<span class="badge red">
								4 </span>
							</a>
							<ul class="dropdown-menu messages">
								<li class="dropdown-menu-title">
 									<span>You have 9 messages</span>
									<a href="#refresh"><i class="icon-repeat"></i></a>
								</li>	
                            	<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	
										     </span>
											<span class="time">
										    	6 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	
										     </span>
											<span class="time">
										    	56 min
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	
										     </span>
											<span class="time">
										    	3 hours
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                                    <a href="#">
										<span class="avatar"><img src="img/avatar.jpg" alt="Avatar"></span>
										<span class="header">
											<span class="from">
										    	
										     </span>
											<span class="time">
										    	yesterday
										    </span>
										</span>
                                        <span class="message">
                                            Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                        </span>  
                                    </a>
                                </li>
								<li>
                            		<a class="dropdown-menu-sub-footer">View all messages</a>
								</li>	
							</ul>
						</li>
						<!-- end: Message Dropdown -->
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<span>Username</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Username</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="login.html"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->

					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- end: Header -->
	
	<div class="container-fluid-full">
	<div class="row-fluid">
			
	<!-- start: Main Menu -->
	<div id="sidebar-left" class="span2">
		<div class="nav-collapse sidebar-nav">
			<ul class="nav nav-tabs nav-stacked main-menu">
				<!-- <i class="icon-user"></i> icon-user -->
				<li><a href="profile.html"><i class="icon-user"></i><span class="hidden-tablet"> Personal Information</span></a></li>
				<li><a href="orders.html"><i class="icon-list"></i><span class="hidden-tablet"> Orders</span></a></li>	
				<li><a href="myproducts.html"><i class="icon-inbox"></i><span class="hidden-tablet"> My Products</span></a></li>	
				<li><a href="messages.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>
				<li><a href="dashboard.html"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
				
			</ul>
		</div>
	</div>
	<!-- end: Main Menu -->
			
	<noscript>
		<div class="alert alert-block span10">
			<h4 class="alert-heading">Warning!</h4>
			<p>You need to have <a href="" target="_blank">JavaScript</a> enabled to use this site.</p>
		</div>
	</noscript>
			
	<!-- start: Content -->
	<div id="content" class="span10">

		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white edit"></i><span class="break"></span>Personal Information</h2>
					<div class="box-icon">
						<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
						<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
					</div>
				</div>

				<div class="box-content">
					<form class="form-horizontal">
						<fieldset>

							<div class="control-group">
								<label class="control-label">Username</label>
								<div class="controls">
									<span class="input-xlarge uneditable-input">* <?php echo $username; ?> *</span>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="focusedInput">Name</label>
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $name; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="focusedInput">Email</label>
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $email; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Campus</label>
								<div class="controls">
								<select id="selectError3">
									<option <?php echo $campus=='UIUC' ? 'selected':'' ?>>UIUC</option>
									<option <?php echo $campus=='ZJUIntl' ? 'selected':'' ?>>ZJUIntl</option>
								</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">School Year</label>
								<div class="controls">
								<select id="selectError3">
									<option <?php echo $year=='Freshman' ? 'selected':'' ?>>Freshman</option>
									<option <?php echo $year=='Sophomore' ? 'selected':'' ?>>Sophomore</option>
									<option <?php echo $year=='Junior' ? 'selected':'' ?>>Junior</option>
									<option <?php echo $year=='Senior' ? 'selected':'' ?>>Senior</option>
									<option <?php echo $year=='Graduate' ? 'selected':'' ?>>Graduate</option>
								</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="selectError3">Major</label>
								<div class="controls">
								<select id="selectError3">
									<option <?php echo $major=='BME' ? 'selected':'' ?>>BME</option>
									<option <?php echo $major=='BMS' ? 'selected':'' ?>>BMS</option>
									<option <?php echo $major=='ECE' ? 'selected':'' ?>>Computer Engineering</option>
									<option <?php echo $major=='CS' ? 'selected':'' ?>>Computer Science</option>
									<option <?php echo $major=='CEE' ? 'selected':'' ?>>Civil and Environment Engineering</option>
									<option <?php echo $major=='EE' ? 'selected':'' ?>>Electrical Engineering</option>
									<option <?php echo $major=='ME' ? 'selected':'' ?>>Mechanical Engineering</option>
									<option <?php echo $major=='Other' ? 'selected':'' ?>>Other</option>
									
								</select>
								</div>
							</div>
							


							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Save changes</button>
								<button class="btn">Cancel</button>
							</div>
						</fieldset>
						</form>
				
				</div>
			</div><!--/span-->
		
		</div><!--/row-->	




</div><!--/.fluid-container-->

	<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://www.freemoban.com">Admin templates</a></li>
				<li><a href="http://www.freemoban.com">Bootstrap themes</a></li>
			</ul>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">Copyright &copy; 2016.Company name All rights reserved.</span>
			
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
