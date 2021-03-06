<?php
	include_once "db_functions.php";
	session_start(); 
	$curr_user = $_SESSION['curr_user'];
	$msg = "";

	$conn = connectDB();
		
	$sql = "SELECT COUNT(*) AS totUsers FROM Users";
	$result = $conn->query($sql);
	if ($result) {
		$tot_users = mysqli_fetch_assoc($result)['totUsers'];
	} else {
		$msg = "Error counting total users" . $sql . "<br>" . $conn->error;
	}

	$sql = "SELECT COUNT(*) AS totSales FROM Sales";
	$result = $conn->query($sql);
	if ($result) {
		$tot_sales = mysqli_fetch_assoc($result)['totSales'];
	} else {
		$msg = "Error counting total sales" . $sql . "<br>" . $conn->error;
	}
	
	$sql = "SELECT COUNT(*) AS totRequests FROM Requests";
	$result = $conn->query($sql);
	if ($result) {
		$tot_requests = mysqli_fetch_assoc($result)['totRequests'];
	} else {
		$msg = "Error counting total requests" . $sql . "<br>" . $conn->error;
	}

	$sql = "SELECT COUNT(*) AS totTransactions FROM Transactions";
	$result = $conn->query($sql);
	if ($result) {
		$tot_transactions = mysqli_fetch_assoc($result)['totTransactions'];
	} else {
		$msg = "Error counting total transactions" . $sql . "<br>" . $conn->error;
	}

	$sql = "SELECT SUM(Price) AS totPrice FROM Transactions";
	$result = $conn->query($sql);
	if ($result) {
		$tot_prices = mysqli_fetch_assoc($result)['totPrice'];
	} else {
		$msg = "Error counting total price" . $sql . "<br>" . $conn->error;
	}


?>

<!DOCTYPE html>
<html lang="en">

<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-173456413-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-173456413-1');
	</script>

	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Beacon - Dashboard</title>
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
								<span><i class="icon-user"> </i><?php echo $curr_user; ?></span>
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
			
			<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
				<div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
				<div class="number">2020<i class="icon-arrow-up"></i></div>
				<div class="title">"Hello World!"</div>
				<div class="footer">
					<a href="#"> Start since</a>
				</div>	
			</div>
			<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
				<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
				<div class="number">4<i class="icon-arrow-up"></i></div>
				<div class="title"> Geniuses</div>
				<div class="footer">
					<a href="#"> Developed by </a>
				</div>
			</div>
			<div class="span3 statbox red noMargin" onTablet="span6" onDesktop="span3">
				<div class="boxchart">0,1,2,2,2,3,4,4,3,2,2,2,1,0</div>
				<div class="number">3<i class="icon-arrow-up"></i></div>
				<div class="title">Campuses</div>
				<div class="footer">
					<a href="#"> Used in </a>
				</div>
			</div>
			<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
				<div class="boxchart">7,2,5,4,6,5,1,4,2,8,5,7,0,7</div>
				<div class="number">12<i class="icon-arrow-up"></i></div>
				<div class="title">Functions</div>
				<div class="footer">
					<a href="#"> There are</a>
				</div>
			</div>	
			
		</div>		

		<!-- <div class="row-fluid hideInIE8 circleStats">
			
			<div class="span2" onTablet="span4" onDesktop="span2">
				<div class="circleStatsItemBox yellow">
					<div class="header">Disk Space Usage</div>
					<span class="percent">percent</span>
					<div class="circleStat">
						<input type="text" value="58" class="whiteCircle" />
					</div>		
					<div class="footer">
						<span class="count">
							<span class="number">20000</span>
							<span class="unit">MB</span>
						</span>
						<span class="sep"> / </span>
						<span class="value">
							<span class="number">50000</span>
							<span class="unit">MB</span>
						</span>	
					</div>
				</div>
			</div>

			<div class="span2" onTablet="span4" onDesktop="span2">
				<div class="circleStatsItemBox green">
					<div class="header">Bandwidth</div>
					<span class="percent">percent</span>
					<div class="circleStat">
						<input type="text" value="78" class="whiteCircle" />
					</div>
					<div class="footer">
						<span class="count">
							<span class="number">5000</span>
							<span class="unit">GB</span>
						</span>
						<span class="sep"> / </span>
						<span class="value">
							<span class="number">5000</span>
							<span class="unit">GB</span>
						</span>	
					</div>
				</div>
			</div>

			<div class="span2" onTablet="span4" onDesktop="span2">
				<div class="circleStatsItemBox red">
					<div class="header">Memory</div>
					<span class="percent">percent</span>
					<div class="circleStat">
						<input type="text" value="100" class="whiteCircle" />
					</div>
					<div class="footer">
						<span class="count">
							<span class="number">64</span>
							<span class="unit">GB</span>
						</span>
						<span class="sep"> / </span>
						<span class="value">
							<span class="number">64</span>
							<span class="unit">GB</span>
						</span>	
					</div>
				</div>
			</div>

			<div class="span2 noMargin" onTablet="span4" onDesktop="span2">
				<div class="circleStatsItemBox pink">
					<div class="header">CPU</div>
					<span class="percent">percent</span>
					<div class="circleStat">
						<input type="text" value="83" class="whiteCircle" />
					</div>
					<div class="footer">
						<span class="count">
							<span class="number">64</span>
							<span class="unit">GHz</span>
						</span>
						<span class="sep"> / </span>
						<span class="value">
							<span class="number">3.2</span>
							<span class="unit">GHz</span>
						</span>	
					</div>
				</div>
			</div>

			<div class="span2" onTablet="span4" onDesktop="span2">
				<div class="circleStatsItemBox blue">
					<div class="header">Memory</div>
					<span class="percent">percent</span>
					<div class="circleStat">
						<input type="text" value="100" class="whiteCircle" />
					</div>
					<div class="footer">
						<span class="count">
							<span class="number">64</span>
							<span class="unit">GB</span>
						</span>
						<span class="sep"> / </span>
						<span class="value">
							<span class="number">64</span>
							<span class="unit">GB</span>
						</span>	
					</div>
				</div>
			</div>

			<div class="span2" onTablet="span4" onDesktop="span2">
				<div class="circleStatsItemBox green">
					<div class="header">Memory</div>
					<span class="percent">percent</span>
					<div class="circleStat">
						<input type="text" value="100" class="whiteCircle" />
					</div>
					<div class="footer">
						<span class="count">
							<span class="number">64</span>
							<span class="unit">GB</span>
						</span>
						<span class="sep"> / </span>
						<span class="value">
							<span class="number">64</span>
							<span class="unit">GB</span>
						</span>	
					</div>
				</div>
			</div>
					
		</div>		 -->


		<!-- /////////////////////////////////////////////////////////////////////////////// -->
		<div class="row-fluid" style="margin-bottom:20px;">	

			<a class="quick-button metro yellow span2">
				<i class="icon-group"></i>
				<p>Users</p>
				<span class="badge"> <?php echo $tot_users ?> </span>
			</a>
			<a class="quick-button metro red span2">
				<i class="icon-inbox"></i>
				<p>Products</p>
				<span class="badge"> <?php echo $tot_sales ?> </span>
			</a>
			<a class="quick-button metro blue span2">
				<i class="icon-flag"></i>
				<p>Requests</p>
				<span class="badge"> <?php echo $tot_requests ?> </span>
			</a>
			<a class="quick-button metro green span2">
				<i class="icon-money"></i>
				<p>Transactions</p>
				<span class="badge"> <?php echo $tot_transactions ?> </span>
			</a>
			<a class="quick-button metro pink span2">
				<i class="icon-shopping-cart"></i>
				<p>Trading Volumes</p>
				<span class="badge"> <?php echo $tot_prices ?> </span>
			</a>
			<a class="quick-button metro black span2">
				<i class="icon-bar-chart"></i>
				<p>Visits</p>
				<span class="badge"> 101 </span>
			</a>
			
			<!-- <div class="clearfix"></div> -->
							
		</div><!--/row-->

		<div class="row-fluid sortable">
			<!-- <div class="box span12"> -->
			<div class="widget span12" onTablet="span12" onDesktop="span12">
				<h2><span class="glyphicons facebook"><i></i></span>Users</h2>
				<hr>
				<div class="row">
					<div class="span4">
							<div id="pie_user_campus" style="height:250px;margin-top:10px;margin-bottom:10px;"></div>
					</div>
					<div class="span4">
							<div id="pie_user_major" style="height:250px;margin-top:10px;margin-bottom:10px;"></div>
					</div>
					<div class="span4">
							<div id="pie_user_year" style="height:250px;margin-top:10px;margin-bottom:10px;"></div>
					</div>
				</div>
			</div>
		</div><!--/row-->


		<div class="row-fluid sortable">
			<!-- <div class="box"> -->
			<div class="widget span12" onTablet="span12" onDesktop="span12">
				<h2><span class="glyphicons facebook"><i></i></span>Items on Beacon</h2>
				<hr>
					<div class="box-content">
						 <div id="stack_item" class="center" style="height:300px;"></div>
					</div>
				</div>
		</div><!--/row-->


		<!-- <div class="row-fluid sortable">
			
			<div class="widget span12" onTablet="span12" onDesktop="span12">
				<h2><span class="glyphicons facebook"><i></i></span>Price</h2>
				<hr>
			
			<div class="box-content">
					<div id="price_chart" class="center" style="height:300px;"></div>
			</div>
				
			</div>
		</div> -->

		<!-- <div class="row-fluid">
				
			<div class="widget span12" onTablet="span12" onDesktop="span12">
				<h2><span class="glyphicons twitter"><i></i></span>Time</h2>
				<hr>
				<div class="content">
					<div id="twitterChart" style="height:300px" ></div>
				</div>
			</div>
		
		</div> -->

	

		
			
		<!-- /////////////////////////////////////////////////////////////////////////////// -->

		


			
	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

	
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
