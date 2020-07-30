<?php 
    include_once "db_functions.php";
    
    //get the parameter from URL
    $id = $_GET["id"];

    //connect db
    if ($id) {
        $conn = connectDB();

        // get info 
        $sql = "SELECT * FROM Sales WHERE SaleId=$id";
        $result = $conn->query($sql);
        if (!$result) {
            $msg = "Error search in sale: " . $sql . "<br>" . $conn->error;
            $conn->close();
            exit;
        }
        $row = mysqli_fetch_assoc($result);
        $sellerid = $row['SellerId'];
        $buyerid  = $row['IntendedBuyerId'];
        $product_name = $row['ProductName'];
        $tag = $row['Tag'];
        $description = $row['Description'];
        $price = $row['IntendedPrice'];

        // delete image for products in Sales
        $original_filepath = $row['Image'];
        if(is_file($original_filepath)) { 
            unlink($original_filepath);
        }

        // remove from Sales
        $sql = "DELETE FROM Sales WHERE SaleId=$id";
        if (!$conn->query($sql)) {
            $msg = "Error remove from sale: " . $sql . "<br>" . $conn->error;
            $conn->close();
            exit;
        }

        // insert into Transactions
        $sql = "INSERT INTO Transactions (SellerId, BuyerId, ProductName, Price, Tag, Description)
                VALUES ('$sellerid', '$buyerid', '$product_name', '$price', '$tag', '$description')";
        if (!$conn->query($sql)) {
            $msg = "Error insert into transaction: " . $sql . "<br>" . $conn->error;
        }



        // refresh recommendation system
    
        $myfile = fopen("py/tagset.txt", "w") or die("Unable to open file!");
        $sql = "SELECT BuyerId, GROUP_CONCAT(DISTINCT Tag) AS Tagset FROM Transactions GROUP BY BuyerId";
        $result = $conn->query($sql);
        if ($result) {
            while ( $row = mysqli_fetch_assoc($result) ) {
                fwrite($myfile, $row['Tagset'] . "\n" );
            }
        } else {
            $msg = "Error grouping Transactions by BuyerId" . $sql . "<br>" . $conn->error;
        }
        fclose($myfile);
    
        $myfile = fopen("py/recommend.txt", "w") or die("Unable to open file!");
        fwrite($myfile, "top: ");
        $sql = "SELECT Tag, COUNT(*) AS cntTag FROM Transactions GROUP BY Tag ORDER BY cntTag DESC LIMIT 3";
        $result = $conn->query($sql);
        if ($result) {
            while ( $row = mysqli_fetch_assoc($result) ) {
                fwrite($myfile, $row['Tag'] . ", " );
            }
        } else {
            $msg = "Error sorting cnt(Tag) in Transactions" . $sql . "<br>" . $conn->error;
        }
        fwrite($myfile, "\n");
        fclose($myfile);
    
        //$result = system("python3 py/apriori.py");
        $result = exec("python3 py/apriori.py");


        $conn->close();
    }

    //echo "<script>console.log('$msg')</script>";

?>
