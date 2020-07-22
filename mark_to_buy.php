<?php
    session_start();
    include_once "db_functions.php";

    $curr_user = $_SESSION['curr_user'];
    $item_id=$_GET["Id"];
    $conn = connectDB();
    $sql = "UPDATE Sales SET IntendedBuyerId = '$curr_user' WHERE SaleId = $item_id";
    if ($conn->query($sql)){
        $conn->close();
        header("location:myorders.php");
        exit;
    }else{
        $conn->close();
        echo 'alert("Attempt Fail")';
    }
?>