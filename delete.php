<?php 

    //get the parameter from URL
    $id = $_GET["id"];
    $table=$_GET["table"];

    include_once "db_functions.php";
    
    //connect db
    if ($id && ($table=="Sales" || $table=="Requests")) {

        $tablekey = $table=='Sales' ? 'SaleId':'RequestId';
        $conn = connectDB();

        $sql = "DELETE FROM $table WHERE $tablekey = '$id'";
        if ($conn->query($sql)) {
            $msg = "Product successfully deleted.";
        }
        else {
            $msg = "Error delete product: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    }

?>
