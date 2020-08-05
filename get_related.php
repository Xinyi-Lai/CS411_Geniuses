<?php 
    session_start();
    
    include_once "db_functions.php";

    //get the q parameter from URL
    $search_item=$_GET["search_item"];
    $choosedb=$_GET["choosedb"];
    $user_id=$_GET["user_id"];
    $tag=$_GET["tag"];
    $campus=$_GET["campus"];
    $id_excluded=$_GET["id_excluded"];
    
    //connect db
    if (strlen($choosedb) > 0) {

        $sql = "";
        if ($choosedb == "Sales"){
            $host_id_type = "SellerId";
            $item_id_type = "SaleId";
            $intended_id_type = "IntendedBuyerId";
        }else{
            $host_id_type = "BuyerId";
            $item_id_type = "RequestId";
            $intended_id_type = "SaleId";
        }
        $relation = ($campus != "") ? "(SELECT NetId FROM Users WHERE Campus='$campus') AS Temp JOIN $choosedb ON NetId=$host_id_type" : $choosedb;
        
        if (strlen($search_item) > 0 || strlen($user_id) > 0 || strlen($tag) > 0) {

            if (strlen($tag) > 0) {
                $sql = "SELECT $item_id_type, Image, ProductName, IntendedPrice FROM $relation WHERE Tag = '$tag' AND $intended_id_type IS NULL".(($id_excluded) ? "AND $item_id_type <> $id_excluded":"")." ORDER BY DatePost DESC";
            } else if (strlen($search_item) > 0) {
                $sql = "SELECT $item_id_type, Image, ProductName, IntendedPrice FROM $relation WHERE ProductName LIKE '%$search_item%' AND $intended_id_type IS NULL ORDER BY DatePost DESC";
            }else {
                $sql = "SELECT $item_id_type, Image, ProductName, IntendedPrice FROM $relation WHERE $host_id_type = '$user_id' AND $intended_id_type IS NULL ORDER BY DatePost DESC";
            }
        }else {
            $sql = "SELECT $item_id_type, Image, ProductName, IntendedPrice FROM $relation WHERE $intended_id_type IS NULL ORDER BY DatePost DESC LIMIT 4";
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
