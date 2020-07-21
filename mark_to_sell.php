<?php
    include_once "db_functions.php";

    $req_id = $_GET["RequestId"];
    $sale_id = $_GET["SaleId"];
    $conn = connectDB();
    $sql = "UPDATE Requests SET SaleId = $sale_id WHERE RequestId = $req_id";
    if ($conn->query($sql)){
        $conn->close();
        header("location:myproducts.php");
        exit;
    }else{
        $conn->close();
        echo 'alert("Attempt Fail")';
    }

?>