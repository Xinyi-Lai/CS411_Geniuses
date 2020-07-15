<?php 
    session_start(); 
    $curr_user = $_SESSION['curr_user'];
?>

<!DOCTYPE html>
<html lang="en">
    <body>

        <?php
            include_once "db_functions.php";
            $conn = connectDB();

            $sql = "SELECT * FROM Users WHERE NetId='$curr_user' ";
            $result = $conn->query($sql);
            if ($result && $result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $username = $row["NetId"];
                $name = $row["Name"];
                $email = $row["Email"];
                switch($row['School']) {
                    case 1: $school = "UIUC"; break;
                    case 2: $school = "ZJU"; break;
                    case 3: $school = "ZJUI"; break;
                    case 4: $school = "ZJE"; break;
                    default: $school = ""; break;
                }
                switch($row['Major']) {
                    case 1: $major = "CEE"; break;
                    case 2: $major = "CompE"; break;
                    case 3: $major = "EE"; break;
                    case 4: $major = "ME"; break;
                    default: $major = ""; break;
                }
                switch($row['Year']) {
                    case 1: $year = "Freshman"; break;
                    case 2: $year = "Sophomore"; break;
                    case 3: $year = "Junior"; break;
                    case 4: $year = "Senior"; break;
                    default: $year = ""; break;
                }
            } else {
                $errmsg = "Error!";
            }
            $conn->close();

        ?>

        <h2>Hello, <?php echo $curr_user; ?> </h2>
        <h3>My Profile</h3>

        <?php
            echo "Username: $username <br>";
            echo "Name: $name <br>";
            echo "Email: $email <br>";
            echo "School: $school <br>";
            echo "Major: $major <br>";
            echo "Year: $year <br>";
        ?>
        <br>
        <input type="button" onclick="window.location.href='buyer_page.php'" value="I wanna buy ...">
        <input type="button" onclick="window.location.href='seller_page.php'" value="I wanna sell ..."> <br>
        <input type="button" onclick="window.location.href='index.php'" value="Home"> <br>
    </body>

</html>

