<?php

function connectDB() {
    $servername = "database"; // 'database' for docker server, 127.0.0.1 for MAMP
    $username = "Geniuses";
    $password = "cs411";
    $dbname = "Beacon";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return null;
    } 
    return $conn;
}

// preprocess the input from form
function ppc($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>