<?php
    session_start();
    $curr_user = $_SESSION['curr_user'];
    $search_item = $_GET['search_item'];
    $choosedb = $_GET['choosedb'];
    $campus = $_GET['campus'];
?>

<!DOCTYPE HTML>

<html lang="en-US">
<script src="search.js"></script>
<head>

	<meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Beacon - Search</title>

	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Google Font -->

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:400,300,500,700,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" type="text/css">

    <!-- Theme Stylesheet -->

    <link rel="stylesheet" href="css/style-main.css">

    <link rel="stylesheet" href="css/style-search.css">

    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/responsive.css">

</head>

<body onload="load_page()">

    <div class="top-bar">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                <a class="brand" href="index.php"><span class="webname" href="index.php">BEACON</span></a>

                </div>

                <div class="col-md-6">

                    <div class="action pull-right">

                        <ul>

                            <?php
                                if ($curr_user) {
                                    echo '<li><a href="myprofile.php"><i class="fa fa-user"></i> '.$curr_user.'</a></li>';
                                }else{
                                    echo '<li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>';
                                }
                            ?>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="header">

        <div class="container">

            <div class="row">

                <div class="col-md-2 col-sm-4">

                </div>

                <div class="col-md-8 col-sm-5">

                    <div class="search-form">

                        <form class="navbar-form" role="search">

                            <select id="campus" class="form-control">

                                <option <?php echo $campus=="" ? 'selected':'' ?> value=""> Campus </option>

                                <option <?php echo $campus=="UIUC" ? 'selected':'' ?> value="UIUC">UIUC</option>

                                <option <?php echo $campus=="ZJUIntl" ? 'selected':'' ?> value="ZJUIntl">ZJUIntl</option>

                                <option <?php echo $campus=="ZJU" ? 'selected':'' ?> value="ZJU">ZJU</option>

                            </select>

                            <select id="choosedb" class="form-control">

                                <option value="Sales" <?php echo $choosedb=="Sales" ? 'selected':'' ?> >Product</option>

                                <option value="Requests" <?php echo $choosedb=="Requests" ? 'selected':'' ?> >Request</option>

                            </select>

                            <div class="form-group">

                                <input id="hiddenText" type="text" style="display:none" />

                                <input type="text"  onkeydown="entersearch()" id="search_box" class="form-control" placeholder="What do you need..." value="<?php echo $search_item; ?>"/>

                            </div>

                            <button id="search_btn" type="button" class="btn" onclick="ajax_load_related()"><i class="fa fa-search"></i></button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        <img src="images/background.png" height="200px">

    </div>

    <div class="navigation">

        <nav class="navbar navbar-theme">

          <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->

            <div class="navbar-header">

              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">

                <span class="sr-only">Menu</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

              </button>

            </div>

            <div class="shop-category nav navbar-nav navbar-left">

                <!-- Single button -->

                <div class="btn-group">

                  <button type="button" class="btn btn-shop-category dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    Shop By Category <span class="caret"></span>

                  </button>

                  <ul class="dropdown-menu" id="dropdown">
                  <input type="text" placeholder="  Search.." id="tagInput" onkeyup="filterFunction()" style="border-radius:3px;margin-left:20px;margin-top:10px;margin-bottom:5px">
                  <li><a onclick="jump_to_search('accessories')">accessories</a></li>
                    <li><a onclick="jump_to_search('clothing')">clothing</a></li>
                    <li><a onclick="jump_to_search('daily necessity')">daily necessity</a></li>
                    <li><a onclick="jump_to_search('electronics')">electronics</a></li>
                    <li><a onclick="jump_to_search('food')">food</a></li>
                    <li><a onclick="jump_to_search('furniture')">furniture</a></li>
                    <li><a onclick="jump_to_search('jewelry')">jewelry</a></li>
                    <li><a onclick="jump_to_search('makeup/personal care')">makeup/personal care</a></li>
                    <li><a onclick="jump_to_search('otherbooks')">otherbooks</a></li>
                    <li><a onclick="jump_to_search('other')">other</a></li>
                    <li><a onclick="jump_to_search('sports')">sports</a></li>
                    <li><a onclick="jump_to_search('stationery')">stationery</a></li>
                    <li><a onclick="jump_to_search('sublease')">sublease</a></li>
                    <li><a onclick="jump_to_search('textbook')">textbook</a></li>
                    <li><a onclick="jump_to_search('test prep')">test prep</a></li>
                    <li><a onclick="jump_to_search('toys/games')">toys/games</a></li>
                    <li><a onclick="jump_to_search('tools')">tools</a></li>
                  </ul>

                </div>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar">

              <ul class="nav navbar-nav navbar-right">

                <li><a href="index.php">Home</a></li>

                <li><a href="#bottom_info">About Us</a></li>

                <li><a href="#bottom_info">Contact Us</a></li>

              </ul>

            </div><!-- /.navbar-collapse -->

          </div><!-- /.container-fluid -->

        </nav>

    </div>

    <div class="container">

        <div class="row">

            <div class="related-items">

                <ul class="nav nav-tabs nav-single-product-tabs">

                    <li class="active"><a href="#related"><p id="search_info"></p></a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="related">

                        <!-- Related search result will be inserted here -->

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="footer">

        <div class="container">

            <div class="row">

                <div class="col-md-3 col-sm-3">

                    <div class="single-widget">

                        <h2 class="widget-title">About Us</h2>

                        <div class="widget-inner">

                            <p>CS411 2020 Summer Course Project </p>

                            <p>Team Geniuses</p>

                            <p>Xinyi Lai: xlai7@illinois.edu </p>

                            <p>Jiaqi Lou: jiaqil6@illinois.edu </p>

                            <p>Hanyin Shao: hanyins2@illinois.edu </p>

                            <p>Kerui Zhu: keruiz2@illinois.edu </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-3">

                    <div class="single-widget">

                        <h2 class="widget-title">Information</h2>

                        <div class="widget-inner">

                            <ul>

                                <li><a href="">Frequently Asked Question</a></li>

                                <li><a href="">Terms and Condition</a></li>

                                <li><a href="">Privacy Policy</a></li>

                                <li><a href="">Customer Service</a></li>

                                <li><a href="">Delivery Information</a></li>

                                <li><a href="">Manufacturers</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-3">

                    <div class="single-widget">

                        <h2 class="widget-title">Customer Care</h2>

                        <div class="widget-inner">

                            <ul>

                                <li><a href="">Contact Us</a></li>

                                <li><a href="">Sitemap</a></li>

                                <li><a href="">Live Chat 24x7</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

                <div class="col-md-3 col-sm-3">

                    <div class="single-widget">

                        <h2 class="widget-title">Our Services</h2>

                        <div class="widget-inner">

                            <ul>

                                <li><a href="">Secure Shopping</a></li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


	<!-- jQuery Library -->

	<script src="js/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!-- Script -->

	<script src="js/script.js"></script>

    <script>
    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("tagInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("dropdown");
        a = div.getElementsByTagName("a");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "";
            } else {
            a[i].style.display = "none";
            }
        }
    }
    </script>

</body>

</html>