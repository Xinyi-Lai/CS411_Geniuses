<?php 
    session_start();
    
    include_once "db_functions.php";

    //get the q parameter from URL
    $search_item=$_GET["search_item"];
    $choosedb=$_GET["choosedb"];
    $user_id=$_GET["user_id"];
    $tag=$_GET["tag"];
    $id_excluded=$_GET["id_excluded"];
    
    //connect db
    if (strlen($choosedb) > 0) {

        $sql = "";
        
        if (strlen($search_item) > 0 || strlen($user_id) > 0 || strlen($tag) > 0) {

            if (strlen($tag) > 0) {
                if (strlen($id_excluded) > 0) {
                    if ($choosedb == "Sales") {
                        $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE Tag = '$tag' AND IntendedBuyerId IS NULL".(($id_excluded) ? "AND SaleId <> $id_excluded":"")."ORDER BY DatePost DESC";
                    }
                    else {
                        $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE Tag = '$tag' AND SaleId IS NULL".(($id_excluded) ? "AND RequestId <> $id_excluded":"")."ORDER BY DatePost DESC";
                    }
                } else {
                    if ($choosedb == "Sales") {
                        $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE Tag = '$tag' AND IntendedBuyerId IS NULL ORDER BY DatePost DESC";
                    }
                    else {
                        $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE Tag = '$tag' AND SaleId IS NULL ORDER BY DatePost DESC";
                    }
                }
            } else if (strlen($search_item) > 0) {
                if ($choosedb == "Sales") {
                    $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE ProductName LIKE '%$search_item%' AND IntendedBuyerId IS NULL ORDER BY DatePost DESC";
                }
                else {
                    $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE ProductName LIKE '%$search_item%' AND SaleId IS NULL ORDER BY DatePost DESC";
                }
            }
            else {
                if ($choosedb == "Sales") {
                    $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE SellerId = '$user_id' AND IntendedBuyerId IS NULL ORDER BY DatePost DESC";
                }
                else {
                    $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE BuyerId = '$user_id' AND SaleId IS NULL ORDER BY DatePost DESC";
                }
            }
        }else {
            if ($choosedb == "Sales") {
                $sql = "SELECT SaleId, Image, ProductName, IntendedPrice FROM Sales WHERE IntendedBuyerId IS NULL ORDER BY DatePost DESC LIMIT 4";
            }
            else {
                $sql = "SELECT RequestId, Image, ProductName, IntendedPrice FROM Requests WHERE SaleId IS NULL ORDER BY DatePost DESC LIMIT 4";
            }
        }

        $conn = connectDB();

        $result = $conn->query($sql);

        $array=array();
        
        if ($result){
            while($row = mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
        }
    
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
                            <img src="'.$image.'" alt="" class="thumbnail"  height="320px">
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
