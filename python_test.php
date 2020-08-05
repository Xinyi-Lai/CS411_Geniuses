<?php

    include_once "db_functions.php";

    $conn = connectDB();

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

    $conn->close();

    //$result = system("python3 py/apriori.py");
    $result = exec("python3 py/apriori.py");

?>