<?php

// include '../includes/dbconn.php';

$error = "";

if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];
    $password = $_POST["password"];

    // setcookie("name",$_POST["name"], time()+60);
    // setcookie("email",$_POST["email"], time()+60);
    // setcookie("uname",$_POST["uname"], time()+60);
    // setcookie("password",$_POST["password"], time()+60);

    if(empty($name) || empty($email) || empty($uname) || empty($password)){
        $error = "<div class='alert alert-danger'><strong>ERROR: INPUT FIELDS ARE EMPTY </strong></div>" ;
        setcookie("name",$_POST["name"], time()-60);
        setcookie("email",$_POST["email"], time()-60);
        setcookie("uname",$_POST["uname"], time()-60);
        setcookie("password",$_POST["password"], time()-60);
    }
    elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
        $error = "<div class='alert alert-danger'><strong>ERROR: NAME FORMAT IS WRONG </strong></div>" ;
        // echo $_COOKIE['name'];
        // echo $_COOKIE['email'];
        // echo $_COOKIE['uname'];
        // echo $_COOKIE['password'];

        setcookie("name",$_POST["name"], time()-60);
        setcookie("email",$_POST["email"], time()+60);
        setcookie("uname",$_POST["uname"], time()+60);
        setcookie("password",$_POST["password"], time()+60);
    }
    elseif(!preg_match("/^[a-zA-Z0-9@. ]*$/",$email)){
        $error = " <div class='alert alert-danger'><strong>ERROR: EMAIL FORMAT IS WRONG </strong></div> ";
        // echo $_COOKIE['name'];
        // // echo $_COOKIE['email'];
        // echo $_COOKIE['uname'];
        // echo $_COOKIE['password'];

        setcookie("name",$_POST["name"], time()+60);
        setcookie("email",$_POST["email"], time()-60);
        setcookie("uname",$_POST["uname"], time()+60);
        setcookie("password",$_POST["password"], time()+60);
    }
    elseif(!preg_match("/^[a-zA-Z0-9. ]*$/",$uname)){
        $error = " <div class='alert alert-danger'><strong>ERROR: USERNAME FORMAT IS WRONG </strong></div> " ;
        // echo $_COOKIE['name'];
        // echo $_COOKIE['email'];
        // // echo $_COOKIE['uname'];
        // echo $_COOKIE['password'];

        setcookie("name",$_POST["name"], time()+60);
        setcookie("email",$_POST["email"], time()+60);
        setcookie("uname",$_POST["uname"], time()-60);
        setcookie("password",$_POST["password"], time()+60);
    }
    elseif(strlen($password) <= 8){
        $error = " <div class='alert alert-danger'><strong>ERROR: PASSWORD IS WEAK </strong></div> " ;
        // echo $_COOKIE['name'];
        // echo $_COOKIE['email'];
        // echo $_COOKIE['uname'];
        // // echo $_COOKIE['password'];

        setcookie("name",$_POST["name"], time()+60);
        setcookie("email",$_POST["email"], time()+60);
        setcookie("uname",$_POST["uname"], time()+60);
        setcookie("password",$_POST["password"], time()-60);
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link rel="stylesheet" href="../stylesheet/job.css">
    <script src="https://kit.fontawesome.com/b32f1a67cb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/password.js"></script>
</head>

<body style="background-image: linear-gradient( to bottom, #006677, green);">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post"><br>
        <div class="logo">
            <h1>sotom <b class="bold">automobile's</b> limited</h1>
            <hr>
        </div>
        <br>
        <h2>REGISTER FOR A JOB</h2>
        <i class='fas fa-user-circle' style='font-size:200px;color:green;margin-left:37.5%'></i>
        <!-- <span class="error"></span> -->
        <br>
        <span><?php echo $error ?></span>
        <br>
        <label for="">Full-Name:</label>
        <input type="text" name="name" placeholder="Please Your  Full-Name" value="<?php if(isset($_COOKIE['name'])) { echo $_COOKIE['name']; } ?>">
        <br>
        <br>
        <label for="">Email:</label>
        <input type="email" name="email" id="" placeholder="Please enter your Email Address" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
        <br>
        <br>
        <label for="">Date Of Birth</label>:</label>
        <input type="date" max="2000-12-01" name="date" id="" placeholder="Please enter your Date of Birth">
        <br>
        <br>
        <label for="">Gender:</label>
        <select name="gender" id="gender">
            <option value="male" name="male">Male</option>
            <option value="female" name="female">Female</option>
            <option value="" selected>Select Gender</option>
        </select>
        <br>
        <label for="">Position:</label>
        <!-- <input type="text" name="position" id="" placeholder="Please enter the Position you are "> -->
        <select name="position" id="position">
        <option value="manager" name="manager">Manager</option>
            <option value="Supervisor" name="supervisor">Supervisor</option>
            <option value="Supervisor" name="supervisor">Attendant</option>
            <option value="Supervisor" name="accountant">Accountant</option>
            <option value="Supervisor" name="counter">Counter</option>
            <option value="Supervisor" name="security">Security</option>
            <option value="Supervisor" name="washer">Car-Washer</option>
            <option value="Supervisor" name="cleaner">Cleaner</option>
            <option value="Supervisor" name="supervisor">Errand-Worker</option>
            <option value="" selected>Select Position you are vying for</option>
        </select>
        <br>
        <br>
        <label for="">UserName:</label>
        <input type="text" name="uname" id="" placeholder="Please enter your UserName" value="<?php if(isset($_COOKIE['uname'])) { echo $_COOKIE['uname']; } ?>">
        <br>
        <br>
        <label for="">Password:</label>
        <input type="password" name="password" id="pwdchange" placeholder="Please enter your password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
        <button type="button" onclick="changeview()">Show/Hide</button>
        <br>
        <!-- <span class="check"><input type="checkbox" name="check" checked>Remember Me </span> -->
        <br>
        <input type="submit" name="submit" value="REGISTER">
    </form>

</body>

</html>