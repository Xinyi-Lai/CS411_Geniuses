<?php 
    session_start();
    
    include_once "db_functions.php";
    include_once "upload.php";
    
    //get the q parameter from URL
    $q=$_GET["q"];

    //connect db
    if (strlen($q) > 0) {
        $conn = connectDB();
        $sql = "SELECT ProductName, IntendedPrice FROM Sales WHERE ProductName LIKE '%$q%'";
        $result = $conn->query($sql);
        $count = "1";
    }
    else {
        $count = "0";
    }

    if ($count == "0") {
        $response="No Result";
    }
    else {
        $response=" ";
    }

    $array=array();
 
    while($row = mysqli_fetch_assoc($result)){
     
        $array[]=$row;
     
    }
 
    $conn->close();
    
    //output the response
    echo $response;

?>


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

    <link rel="stylesheet" href="css/responsive.css">

</head>

<body>

<?php foreach($array as $val):  ?>

    <div class="tab-content">

        <div class="tab-pane active" id="related">

            <div class="col-md-3 col-sm-4">

                <div class="single-product">

                    <div class="product-block">

                        <img src="images/post-1.jpg" alt="" class="thumbnail">

                        <div class="related-product text-center">

                            <p class="title"><?php echo $val['ProductName']; ?></p>

                            <p class="price">$ <?php echo $val['IntendedPrice']; ?></p>

                        </div>

                        <div class="product-hover">

                            <ul>

                                <li><a href="single-product.html"><i class="fa fa-cart-arrow-down"></i></a></li>

                            </ul>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

    </body>

</html>
