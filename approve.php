<?php 

    //get the parameter from URL
    $id = $_GET["id"];
    $table=$_GET["table"];

    include_once "db_functions.php";
    
    //connect db
    if ($id && $table=="Sales") {

        $tablekey = 'SaleId';
        $conn = connectDB();

        // get info 
        $sql = "SELECT * FROM Sales WHERE SaleId=$id";
        $result = $conn->query($sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $sellerid = $row['SellerId'];
            $buyerid  = $row['IntendedBuyerId'];
            $product_name = $row['ProductName'];
            $tag = $row['Tag'];
            $description = $row['Description'];
            $price = $row['IntendedPrice'];
            $original_filepath = $row['Image'];
        } else {
            $msg = 'get info from sales fail';
            $conn->close();
            header("location:index.php");
        }

        // delete image for products in Sales
        if(is_file($original_filepath)) { 
            unlink($original_filepath);
        }

        // remove from Sales
        $sql = "DELETE FROM Sales WHERE SaleId=$id";
        $result = $conn->query($sql);
        if (!$result) {
            $msg = 'remove from sales fail';
            $conn->close();
            header("location:index.php");
            exit;
        }

        // insert into Transactions
        $sql = "INSERT INTO Transactions (SellerId, BuyerId, ProductName, Price, Tag, Description)
                VALUES ('$sellerid', '$buyerid', '$product_name', '$price', '$tag', '$description')";
        if ($conn->query($sql)) {
            $msg = 'insert into transactions fail';
            $conn->close();
            header("location:myproducts.php");
            exit;
        } else {
            $msg = 'Reject fail';
        }
        $conn->close();

        
    }

    //echo "<script>console.log('$msg')</script>";

?>
