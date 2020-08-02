<?php 
    include_once "db_functions.php";

    //get the parameter from URL
    $id = $_GET["id"];
    $table=$_GET["table"];

    //connect db
    if ($id && ($table=="Sales" || $table=="Requests")) {

        $tablekey = $table=='Sales' ? 'SaleId':'RequestId';
        $conn = connectDB();

        // delete image for products in Sales
        if ($table=='Sales') {
            $sql = "SELECT * FROM Sales WHERE SaleId=$id";
            $result = $conn->query($sql);
            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $original_filepath = $row['Image'];
                if(is_file($original_filepath)) { 
                    unlink($original_filepath);
                }
            }
            else {
                $msg = "Error get path from sales: " . $sql . "<br>" . $conn->error;
            }
        }

        $sql = "DELETE FROM $table WHERE $tablekey = '$id'";
        if ($conn->query($sql)) {
            $msg = "Successfully deleted.";
        }
        else {
            $msg = "Error delete: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

    //echo "<script>console.log('$msg')</script>";

?>
