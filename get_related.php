<?php 
    session_start();
    
    include_once "db_functions.php";
    
    //get the q parameter from URL
    $q=$_GET["q"];

    //connect db
    $conn = connectDB();
    $sql = "SELECT ProductName FROM Sales WHERE ProductName LIKE '%$q%'";
    $result = mysqli_fetch_assoc($conn->query($sql));
    $response = $result['ProductName'];
 
    //output the response
    echo $response;

?>
