<?php

    session_start();
    include_once "db_functions.php";

    $seller_id = $_SESSION['curr_user'];
    $product_name = ppc($_POST["product_name"]);
    $tag = ppc($_POST["tag"]);
    $description = ppc($_POST["description"]);
    $intended_price = (double)ppc($_POST["intendedPrice"]);
    $original_price = (double)ppc($_POST["originalPrice"]);
    $depreciation = (int)$_POST["depreciation"];
    $id = 1;

    if ($product_name != "" && 
        $intended_price > 0 &&
        $original_price > 0 &&
        file_exists($_FILES['image']['tmp_name'])) 
    {
        $fp = fopen($_FILES["image"]["tmp_name"],"r");
        $buf = addslashes(fread($fp,$_FILES["image"]["size"]));
        $conn = connectDB();
        $sql = "INSERT INTO Sales(SellerId, ProductName, Tag, Description, Image, IntendedPrice, OriginalPrice, Depreciation) 
                VALUES ('$seller_id', '$product_name', '$tag', '$description', '$buf', $intended_price, $original_price, $depreciation)";
        $success = $conn->query($sql);
        if ($success){
            echo 'Insert success!';
        }else{
            echo 'Insert fail'.$conn->error;
        }

        $conn->close();

    }else{
        echo 'Wrong infomation';
    }

    // function get_image($conn, $id){
    //     $result=$conn->query("SELECT * FROM Images WHERE PicNum=1") or die("Cant Perform Query"); 
    //     $row = $result->fetch_object();
    //     header("Content-Type:image/jpeg");
    //     echo $row->Image;
    // }

?>