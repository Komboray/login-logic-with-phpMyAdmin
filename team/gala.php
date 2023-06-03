<!-- //used to import from the database connected pages -->

<?php 
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"  method="post">
    Username:<input type="text" name="username">
    Password: <input type="password" name="password">
    <input type="submit" name="submit">
    </form>
</body>
</html>
<?php
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($username)){
        echo"The username cannot be empty, PLease fill it";
    }
    elseif(empty($password)){
        echo"The password cannot be empty, PLease fill it";
    }
    else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO credentials (name, password) VALUES('$username', '$hash')";
        mysqli_query($conn, $sql);
        echo "Your information has been submitted";
    }
}
mysqli_close($conn);
?>


