<?php
    session_start();

    include_once "db_functions.php";

    $curr_user = $_SESSION['curr_user'];
    
    //get the q parameter from URL
    $item_id=$_GET["Id"];
    $choosedb = $_GET["choosedb"];

    //connect db
    if (strlen($item_id) > 0) {
        $conn = connectDB();
        if ($choosedb == "Sales"){
            $sql = "SELECT * FROM Sales WHERE SaleId = $item_id";
            $result = $conn->query($sql);
    
            if ($result && $result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $netId = $row["SellerId"];
                $product_name = $row["ProductName"];
                $tag = $row["Tag"];
                $description = $row["Description"];
                $image = $row["Image"];
                $intendedPrice = $row["IntendedPrice"];
                $originalPrice = $row["OriginalPrice"];
                $depreciation = $row["Depreciation"];
            } 
        }else{
            $sql = "SELECT * FROM Requests WHERE RequestId = $item_id";
            $result = $conn->query($sql);
    
            if ($result && $result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $netId = $row["BuyerId"];
                $product_name = $row["ProductName"];
                $tag = $row["Tag"];
                $description = $row["Description"];
                $image = $row["Image"];
                $intendedPrice = $row["IntendedPrice"];
            } 
        }
    
        $conn->close();
    }else{
        echo "Wrong Url Parameter";
        exit;
    }
?>

<!DOCTYPE HTML>

<html lang="en-US">

<head>

	<meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Beacon - Product</title>

	<!-- Latest compiled and minified CSS -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	<!-- Google Font -->

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:400,300,500,700,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" type="text/css">

    <!-- Theme Stylesheet -->

    <link rel="stylesheet" href="css/style-main.css">

    <link rel="stylesheet" href="css/responsive.css">

    <script src="search.js"></script>

</head>

<body>

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

                <div class="col-md-3 col-sm-4">

                </div>

                <div class="col-md-7 col-sm-5">

                    <div class="search-form">

                        <form class="navbar-form" role="search">

                            <select id="choosedb" class="form-control">

                                <option selected="selected" value="Sales">Product</option>

                                <option value="Requests">Request</option>

                            </select>

                            <div class="form-group">

                                <input id="hiddenText" type="text" style="display:none" />

                                <input type="text"  onkeydown="entersearch()" id="search_box" class="form-control" placeholder="What do you need..."/>

                            </div>

                            <button type="button" class="btn" onclick="jump_to_search()"><i class="fa fa-search"></i></button>

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

                  <ul class="dropdown-menu">

                    <li><a href="">Text Books</a></li>

                    <li><a href="">Electronics</a></li>

                    <li><a href="">Accesories</a></li>

                    <li role="separator" class="divider"></li>

                    <li><a href="">Brand New</a></li>

                    <li><a href="">Used</a></li>

                  </ul>

                </div>

            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->

            <div class="collapse navbar-collapse" id="navbar">

              <ul class="nav navbar-nav navbar-right">

                <li><a href="index.php">Home</a></li>

                <li><a href="#">Popular</a></li>

                <li><a href="#">Recent</a></li>

                <li><a href="#">Features</a></li>

                <li><a href="#">About Us</a></li>

                <li><a href="#">Contact Us</a></li>

              </ul>

            </div><!-- /.navbar-collapse -->

          </div><!-- /.container-fluid -->

        </nav>

    </div>

    <div class="breadcumbs">

        <div class="container">

            <div class="row">

                <span>Home > </span>

                <span herf=""><?php echo $tag; ?> > </span>

                <!-- <span>Eyewear > </span>

                <span>Blue Jacket</span> -->

            </div>

        </div>

    </div>  

    <div class="short-description">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="product-thumbnail">

                        <div class="col-md-1 col-sm-1 col-xs-1">

                        </div>

                        <div class="col-md-10 col-sm-10 col-xs-10">

                        <li class="active"><a href="<?php echo $image; ?>"><img src="<?php echo $image; ?>" alt=""></a></li>

                        </div>

                    </div>

                </div>

                <div class="col-md-6">

                    <h1 class="product-title"><?php echo $product_name; ?></h1>

                    <div class="product-info">
                    
                    <?php
                        if ($choosedb == "Sales"){
                            echo '<span class="product-identity"><span class="strong-text">Product ID:</span> '.$item_id.'</span>';
                            echo '<span class="product-identity"><span class="strong-text">Seller:</span> '.$netId.'</span></br></br>';
                        }else{
                            echo '<span class="product-identity"><span class="strong-text">Request ID:</span> '.$item_id.'</span>';
                            echo '<span class="product-identity"><span class="strong-text">Buyer:</span> '.$netId.'</span></br></br>';
                        }
                    ?>

                        

                        <span class="product-identity"><span class="strong-text">Description:</span> <?php echo $description; ?></span>

                    </div></br>

                    <div class="price">

                        <span>Intended Price: $<?php echo $intendedPrice; ?></span>

                    </div>

                    <p><button class="btn btn-theme" type="submit">Live chat with seller</button>

                        <button class="btn btn-theme" type="submit">I wanna buy</button>

                        <button class="btn btn-theme" type="submit" onclick="window.location.href='search.php?search_item=&choosedb=<?php $choosedb ?>&user_id=<?php echo $netId;?>'">See more from <?php echo $netId; ?></button>

                    </p>

                    <div class="product-info">

                        <!-- <span class="product-identity"><span class="strong-text">Categories:</span> Pants, T-Shirt, Jama</span></p> -->

                        <span class="product-identity" herf=""><span class="strong-text">Tags:</span> <?php echo $tag; ?></span>

                    </div>

                </div>

            </div>

        </div>

    </div> 


    <div class="container">

        <div class="row">

            <div class="related-items">

                <ul class="nav nav-tabs nav-single-product-tabs">

                    <li class="active"><a href="#related">Related Products</a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="related">

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="images/post-1.jpg" alt="" class="thumbnail">

                                    <div class="related-product text-center">

                                        <p class="title">iPad</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="images/post-2.jpg" alt="" class="thumbnail">

                                    <div class="related-product text-center">

                                        <p class="title">Flowers</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="images/post-3.jpg" alt="" class="thumbnail">

                                    <div class="related-product text-center">

                                        <p class="title">Shoes</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="images/post-3.jpg" alt="" class="thumbnail">

                                    <div class="related-product text-center">

                                        <p class="title">Shoes</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

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

</body>

</html>