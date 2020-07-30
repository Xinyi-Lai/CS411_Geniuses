<?php

    include_once "db_functions.php";

    $myfile = fopen("py/tagset.txt", "w") or die("Unable to open file!");

    $conn = connectDB();
    $sql = "SELECT BuyerId, GROUP_CONCAT(DISTINCT Tag) AS Tagset FROM Transactions GROUP BY BuyerId";
    $result = $conn->query($sql);
    if ($result) {
        while ( $row = mysqli_fetch_assoc($result) ) {
            $text = $row['Tagset'] . "\n";
            fwrite($myfile, $text);
        }
    } else {
        $msg = "Error grouping Users by Campus" . $sql . "<br>" . $conn->error;
    }

    fclose($myfile);
    $conn->close();

    //$result = system("python3 py/apriori.py");
    //$result = exec("python3 py/apriori.py");


?>