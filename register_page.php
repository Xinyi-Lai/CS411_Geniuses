<?php 
    include_once "db_functions.php";
    
    $username = ppc($_POST["username"]);
    $password = ppc($_POST["password"]);
    $name = ppc($_POST["name"]);
    $email = ppc($_POST["email"]);
    switch($_POST['school']) {
        case "UIUC": $school = 1; break;
        case "ZJU":  $school = 2; break;
        case "ZJUI": $school = 3; break;
        case "ZJE":  $school = 4; break;
        default:     $school = 0; break;
    }
    switch($_POST['major']) {
        case "CEE":  $major = 1; break;
        case "CompE":$major = 2; break;
        case "EE":   $major = 3; break;
        case "ME":   $major = 4; break;
        default:     $major = 0; break;
    }
    switch($_POST['year']) {
        case "Freshman": $year = 1; break;
        case "Sophomore":$year = 2; break;
        case "Junior":   $year = 3; break;
        case "Senior":   $year = 4; break;
        default:         $year = 0; break;
    }

    $errmsg = "";

    if (empty($username) || empty($password) || empty($name) || empty($email)) {
        //$errmsg = "All fields are required!";
    }
    else {
        $conn = connectDB();

        $sql = "SELECT * FROM Users WHERE NetId='$username'";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $errmsg = "User already exists!";
        } else {
            $sql = "INSERT INTO Users (NetId, Password, Name, School, Email, Major, Year)
                    VALUES ('$username', '$password', '$name', '$school', '$email', '$major', '$year')";
            if ($conn->query($sql)) {
                $errmsg = "Successfully registered!";
                header("location:login_page.php");
                exit;
            } else {
                $errmsg = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <body>

        <h1>Register Page</h1>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            Username: <input type="text" name="username" value="<?php echo $username;?>">   <br>
            Password: <input type="text" name="password" value="<?php echo $password;?>">   <br>
            Name:   <input type="text" name="name"  value="<?php echo $name;?>">    <br>
            Email:  <input type="text" name="email" value="<?php echo $email;?>">   <br>
            School: 
            <select name="school">
                <option value="">Your school:</option>
                <option value="UIUC">UIUC</option> <option value="ZJU">ZJU</option>
                <option value="ZJUI">ZJUI</option> <option value="ZJE">ZJE</option>
            </select> <br>
            Major:  
            <select name="major">
                <option value="">Your major:</option>
                <option value="CEE">CEE</option>    <option value="CompE">CompE</option>
                <option value="EE">EE</option>      <option value="ME">ME</option>
                
            </select> <br>
            Year:   
            <select name="year">
                <option value="">Your year:</option>
                <option value="Freshman">Freshman</option>  <option value="Sophomore">Sophomore</option>
                <option value="Junior">Junior</option>      <option value="Senior">Senior</option>
            </select> <br>
            <input type="submit" name="submit" value="Submit">
        </form>

        <input type="button" onclick="window.location.href='index.php'" value="Home"> <br>

    </body>
</html>

<?php 
    echo $errmsg;
?>
