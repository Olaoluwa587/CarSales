<?php
session_start();
// $conn = mysqli_connect("localhost","root","juwon01","sotom");
// if(!$conn){
//     echo "Error connecting to database</br></br>.".mysqli_connect_error();
// }

include '../includes/dbconn.php';

$msg = "";
if(isset($_POST['submit'])){


    $username = $_POST['username'];
    $_SESSION['username'] = $username;

    $password = $_POST['password'];
    if(isset($_POST['check'])){

        setcookie("user", $username, time()+3600);
        setcookie("pass", $password, time()+3600);

    }
    else{
        setcookie("user", $username, time()-3600);
        setcookie("pass", $password, time()-3600);
    }

        if(empty($username) && empty($password)){
        $msg = "<div class='alert alert-danger'><strong>Error: Please enter your username and password</strong> </div>";
        }
        elseif(empty($username) || empty($password)){
        $msg = "<div class='alert alert-danger'><strong>Error: Please enter your username or password</strong> </div>";
        }
        else{
            $loginTime = time();
            $_SESSION['login_time'] = $loginTime;
            $stmt = "INSERT INTO userAdmin(username,password,loginTime) VALUES ('$username', '$password', '$loginTime')";
            $stmtQuery = mysqli_query($connection, $stmt);

                if($stmtQuery){

        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($connection,$sql);

        if($query){
            $result = mysqli_num_rows($query);

        if($result > 0){
            header("Location:cms.php");
        }
        else{
            $msg = "<div class='alert alert-danger'> <strong>Error: UserName or Password is Incorrect</strong> </div>";
              }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheet/admin1.css">
    <script src="https://kit.fontawesome.com/b32f1a67cb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/password.js"></script>
</head>
<body>

    <form action="" method="post" id="form" autocomplete="off"><br>
    <div class="logo">
        <h1>sotom <b class="bold">automobile's</b> limited</h1>
        <hr>
    </div>
    <br>
        <h2>ADMIN PAGE</h2>
        <i class='fas fa-user-circle' style='font-size:200px;color:green;margin-left:37.5%'></i>
        <span class="error"><?php echo $msg; ?></span>
<br>
        <label for="">User-Name:</label>
        <input type="text" name="username" placeholder="Please enter your username" value="<?php if(isset($_COOKIE["user"])) { echo $_COOKIE["user"];} ?>">
<br>
<br>
        <label for="">Password:</label>
        <input type="password" name="password" id="pwdchange" placeholder="Please enter your password" value="<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"];} ?>">
        <button type="button" onclick="changeview()">Show/Hide</button>
            <br>
<br>
        <span class="check"><input type="checkbox" name="check" checked>Remember Me </span>
<br>
        <input type="submit" value="Login" name="submit">
    </form>

</body>
</html>