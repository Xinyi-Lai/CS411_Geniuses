<?php 
    include_once "db_functions.php";
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    $errmsg = "";

    if (empty($username)) {
        //$errmsg = "Username cannot be empty!";
    }
    else {
        $conn = connectDB();
        $sql = "SELECT * FROM Users WHERE NetId='$username' AND Password='$password'";
        $result = $conn->query($sql);
        
        // if match
        if ($result && $result->num_rows > 0) {
            $errmsg = "Logged in successfully!";
            header("location:user_page.php");
            exit;
        } else {
            $errmsg = "Username and Password does not match!";
        }
        $conn->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
    <body>

        <h1>Login Page</h1>
        
        <form action="" method="POST">
            Username: <input type="text" name="username" value="<?php echo $username;?>"> <br>
            Password: <input type="text" name="password" value="<?php echo $password;?>"> <br>
            <input type="submit" name="submit" value="Log in">
        </form>

        <input type="button" onclick="window.location.href='register_page.php'" value="Register"> <br>
        <input type="button" onclick="window.location.href='index.php'" value="Home"> <br>

    </body>
</html>

<?php 
// echo "Your username: $username <br>";
// echo "Your password: $password <br>";
echo $errmsg;
?>



<?php
    // header("location: role_select_page.php");
    // exit;
?>