<?php 
    session_start();
    
    include_once "db_functions.php";
    
    //get the q parameter from URL
    $q=$_GET["q"];

    //connect db
    if (strlen($q) > 0) {
        $conn = connectDB();
        $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE ProductName LIKE '%$q%'";
        $result = $conn->query($sql);
    }

    $array=array();
 
    while($row = mysqli_fetch_assoc($result)){
     
        $array[]=$row;
     
    }
 
    $conn->close();

    foreach($array as $val): 

        echo '
        <div class="col-md-3 col-sm-4">
            <div class="single-product">
                <div class="product-block">
                    <img src="'.$val['Image'].'" alt="" class="thumbnail">
                    <div class="related-product text-center">
                        <p class="title">'.$val['ProductName'].'</p>
                        <p class="price">$ '.$val['IntendedPrice'].'</p>
                    </div>
                    <div class="product-hover">
                        <ul>
                            <li><a href="single-product.html?SaleId='.$val['SaleId'].'"><i class="fa fa-cart-arrow-down"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        ';

    endforeach;
?>
