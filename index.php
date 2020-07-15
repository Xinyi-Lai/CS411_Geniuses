<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Beacon</title>
</head>

<body>

    <input type="button" onclick="window.location.href='buyer_page.php'" value="I wanna buy ...">
    <input type="button" onclick="window.location.href='seller_page.php'" value="I wanna sell ...">
    <input type="button" onclick="window.location.href='login_page.php'" value="Login">
    <br><br><br>

</body>

<?php

    include_once "db_functions.php";

    $conn = connectDB();
    
    $sql = "SELECT * FROM Users";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output
        while($row = $result->fetch_assoc()) {
            echo "NetID: " . $row["NetId"]. " - Name: " . $row["Name"]. " - Major: " . $row["Major"]. "<br>";
        }
    } else {
        echo "0 结果";
    }
    $conn->close();

?>

</html>