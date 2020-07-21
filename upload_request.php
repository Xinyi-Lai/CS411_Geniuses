<?php

    session_start();
    include_once "db_functions.php";

    $buyer_id = $_SESSION['curr_user'];
    $product_name = ppc($_POST["product_name"]);
    $tag = ppc($_POST["tag"]);
    $description = ppc($_POST["description"]);
    $intended_price = (double)ppc($_POST["intendedPrice"]);
    // $SaleId = (double)ppc($_POST["SaleId"]);

    if ($product_name != "" && 
        $intended_price > 0) {
                
            /* Get the database */
            $conn = connectDB();
            /* Set the decode */
            $sql = "INSERT INTO Requests(BuyerID, ProductName, Tag, Description, IntendedPrice) 
                    VALUES ('$buyer_id', '$product_name', '$tag', '$description', $intended_price)";
            $success = $conn->query($sql);
            if ($success){
                echo 'Insert success!';
            }else{
                echo 'Insert fail'.$conn->error;
            }

            $conn->close();

    }else{
        echo 'Wrong information';
    }

?>