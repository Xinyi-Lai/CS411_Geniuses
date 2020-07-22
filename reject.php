<?php 

    //get the parameter from URL
    $id = $_GET["id"];
    $table=$_GET["table"];

    include_once "db_functions.php";
    
    //connect db
    if ($id && $table=="Sales") {

        $tablekey = 'SaleId';
        $conn = connectDB();

        // set intended buyer to null
        
        

        $sql = "UPDATE Sales 
                SET IntendedBuyerId = NULL
                WHERE SaleId = '$id'";
        if ($conn->query($sql)) {
            header("location:myproducts.php");
            exit;
        } else {
            $msg = 'Reject fail';
        }
        $conn->close();

        
    }

    //echo "<script>console.log('$msg')</script>";

?>
