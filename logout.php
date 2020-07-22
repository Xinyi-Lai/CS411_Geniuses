<?php 
    session_start();
    $_SESSION['curr_user'] = ''; 
    header("location:index.php");
	exit;
?>