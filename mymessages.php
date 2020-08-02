<?php
	include_once "db_functions.php";	
	session_start(); 
	$curr_user = $_SESSION['curr_user'];
	$msg = "";
	if (empty($curr_user)) {
		$msg = "curr_user is empty";
	}
	else {
		$conn = connectDB();
		
		$sql = "SELECT * FROM Sales WHERE IntendedBuyerId = '$curr_user'";
		$result = $conn->query($sql);
		if ($result) {
			$array = array();
			while($row = mysqli_fetch_assoc($result)){
				$array[]=$row;
			}
		} else {
			$msg = "No record" . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
	// echo "<script>console.log('$msg');</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title></title>
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
				<a class="brand" href="index.php"><span>BEACON</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						
						
						<!-- start: User Dropdown -->
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<span><span><i class="icon-user"> </i><?php echo $curr_user; ?></span></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span><?php echo $curr_user; ?></span>
								</li>
								<li><a href="myprofile.php"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
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
				<li><a href="myprofile.php"><i class="icon-user"></i><span class="hidden-tablet"> Personal Information</span></a></li>
				<li><a href="myproducts.php"><i class="icon-inbox"></i><span class="hidden-tablet"> My Products</span></a></li>
				<li><a href="myrequests.php"><i class="icon-flag"></i><span class="hidden-tablet"> My Requests</span></a></li>
				<li><a href="myorders.php"><i class="icon-list"></i><span class="hidden-tablet"> Orders</span></a></li>	
				<li><a href="mytransactions.php"><i class="icon-money"></i><span class="hidden-tablet"> Transactions</span></a></li>
				<li><a href="mymessages.php"><i class="icon-envelope"></i><span class="hidden-tablet"> Messages</span></a></li>
				<li><a href="dashboard.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>
				
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
			

			<div class="row-fluid">
				
				<div class="span7">
					<h1>Inbox</h1>
					
					<ul class="messagesList">
						
						<li>
							<span class="from"><span class="glyphicons star"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title"><span class="label label-warning">problem</span> Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons star"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title"><span class="label label-success">task</span> Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title"><span class="label label-info">information</span> Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons star"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons star"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons star"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons star"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span>  <span class="glyphicons paperclip"><i></i></span></span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						<li>
							<span class="from"><span class="glyphicons dislikes"><i></i></span> </span><span class="title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</span><span class="date">Today, <b>3:47 PM</b></span>
						</li>
						
					</ul>
					<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-content">
							<ul class="list-inline item-details">
								<li><a href="http://www.freemoban.com">Admin templates</a></li>
								<li><a href="http://www.freemoban.com">Bootstrap themes</a></li>
							</ul>
						</div>
					</div>	
				</div>
				<div class="span5 noMarginLeft">
					
					<div class="message dark">
						
						<div class="header">
							<h1>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.."</h1>
							<div class="from"><i class="halflings-icon user"></i> <b></b> / jiguofei@msn.com</div>
							<div class="date"><i class="halflings-icon time"></i> Today, <b>3:47 PM</b></div>
							
							<div class="menu"></div>
							
						</div>
						
						<div class="content">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<blockquote>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</blockquote>
							<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>	
						</div>
						
						<div class="attachments">
							<ul>
								<li>
									<span class="label label-important">zip</span> <b>bootstrap.zip</b> <i>(2,5MB)</i>
									<span class="quickMenu">
										<a href="#" class="glyphicons search"><i></i></a>
										<a href="#" class="glyphicons share"><i></i></a>
										<a href="#" class="glyphicons cloud-download"><i></i></a>
									</span>
								</li>
								<li>
									<span class="label label-info">txt</span> <b>readme.txt</b> <i>(7KB)</i>
									<span class="quickMenu">
										<a href="#" class="glyphicons search"><i></i></a>
										<a href="#" class="glyphicons share"><i></i></a>
										<a href="#" class="glyphicons cloud-download"><i></i></a>
									</span>
								</li>
								<li>
									<span class="label label-success">xls</span> <b>spreadsheet.xls</b> <i>(984KB)</i>
									<span class="quickMenu">
										<a href="#" class="glyphicons search"><i></i></a>
										<a href="#" class="glyphicons share"><i></i></a>
										<a href="#" class="glyphicons cloud-download"><i></i></a>
									</span>
								</li>
							</ul>		
						</div>
						
						<form class="replyForm"method="post" action="">

							<fieldset>
								<textarea tabindex="3" class="input-xlarge span12" id="message" name="body" rows="12" placeholder="Click here to reply"></textarea>

								<div class="actions">
									
									<button tabindex="3" type="submit" class="btn btn-success">Send message</button>
									
								</div>

							</fieldset>

						</form>	
						
					</div>	
					
				</div>
						
			</div>
			
       

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
