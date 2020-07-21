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
        $intended_price > 0 &&
        file_exists($_FILES['image']['tmp_name'])) {
            /* Get the directory to store the image */
            $upload_dir="images/".$buyer_id."/";
            if(!is_dir($upload_dir))
                mkdir($upload_dir);
            /* Get the postfix of the image */
            $postfix = substr($_FILES['image']['name'],strrpos($_FILES['image']['name'],'.'));
            /* Set the file name */
            $filename = $upload_dir.date("YmdHis").$postfix;
            /* Store the image to the server */
            if(move_uploaded_file($_FILES['image']['tmp_name'], $filename)){
                /* Get the database */
                $conn = connectDB();
                /* Set the decode */
                $sql = "INSERT INTO Requests(BuyerID, ProductName, Tag, Description, Image, IntendedPrice) 
                    VALUES ('$buyer_id', '$product_name', '$tag', '$description', '$filename', $intended_price)";
                $success = $conn->query($sql);
                if ($success){
                    header("location:myproducts.php");
                    exit;
                }else{
                    echo 'Insert fail'.$conn->error;
                }

                $conn->close();
            }else{
                echo 'Store fail';
            }

    }else{
        echo 'Wrong information';
    }

?>