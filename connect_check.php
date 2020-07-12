<?php
$host = 'database'; // Service name from the docker-compose.yml
$user = 'Geniuses';
$password = 'cs411';
$db = 'Beacon';

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error){
    echo 'Connection failed' . $conn->connect_error;
}else{
    echo 'Connection success!';
}
?>