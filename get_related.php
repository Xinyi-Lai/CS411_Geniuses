<?php 
    session_start();
    
    include_once "db_functions.php";

    //get the q parameter from URL
    $search_item=$_GET["search_item"];
    $choosedb=$_GET["choosedb"];
    $user_id=$_GET["user_id"];
    
    //connect db
    if ((strlen($search_item) > 0 || strlen($user_id) > 0) && strlen($choosedb) > 0) {

        $conn = connectDB();

        if (strlen($search_item) > 0) {
            if ($choosedb == "Sales") {
                $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE ProductName LIKE '%$search_item%' AND IntendedBuyerId IS NULL";
            }
            else {
                $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE ProductName LIKE '%$search_item%' AND SaleId IS NULL";
            }
        }else {
            if ($choosedb == "Sales") {
                $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE SellerId = '$user_id' AND IntendedBuyerId IS NULL";
            }
            else {
                $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE BuyerId = '$user_id' AND SaleId IS NULL";
            }
        }

        $result = $conn->query($sql);

        // echo $result->num_rows==null;
        $array=array();
     
        // if ($result->num_rows > 0){
            while($row = mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
        // }
     
        $conn->close();
        
        foreach($array as $val):
            $image = ($val['Image']) ? $val['Image'] : 'images/beaconlogo.png';
            $id = "";
            if ($choosedb == "Sales"){
                $id = $val['SaleId'];
            }else{
                $id = $val['RequestId'];
            }
            echo '
                <div class="col-md-3 col-sm-4">
                    <div class="single-product">
                        <div class="product-block">
                            <img src="'.$image.'" alt="" class="thumbnail">
                            <div class="related-product text-center">
                                <p class="title">'.$val['ProductName'].'</p>
                                <p class="price">$ '.$val['IntendedPrice'].'</p>
                            </div>
                            <div class="product-hover">
                                <ul>
                                    <li><a href="single-product.php?Id='.$id.'&choosedb='.$choosedb.'"><i class="fa fa-cart-arrow-down"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        endforeach;
    }

?>
