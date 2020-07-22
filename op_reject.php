<?php 
    include_once "db_functions.php";
    
    //get the parameter from URL
    $id = $_GET["id"];
   
    //connect db
    if ($id) {
        $conn = connectDB();

        // set intended buyer to null
        $sql = "UPDATE Sales SET IntendedBuyerId = NULL WHERE SaleId = '$id'";
        if (!$conn->query($sql)) {
            $msg = "Error reject sale: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    //echo "<script>console.log('$msg')</script>";

?>
