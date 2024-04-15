<?php
session_start();
$error = array();

        if(!$conn = mysqli_connect("localhost", "root", "juwon01", "forgot_db")){
            die("Couldn't connect to database");
        }

$mode = "enter_email";
if(isset($_GET["mode"])){
    $mode = $_GET["mode"];
}

if(count($_POST) > 0){
    switch($mode){
        case "enter_email":
            //code...
            $email = $_POST["email"];
            //validate email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error[] = "invalid email";
            }
            elseif(!valid_email($email)){
                $error[] = "That email was not found";
            }
            else{
                    $_SESSION["email"] = $email;
                    send_mail($email);
                    header("Location:forgot.php?mode=enter_code");
                    die();
            }
            break;

            case "enter_code":
                //code...
                $code = $_POST["code"];
                $result = is_code_correct($code);

                if($result == "the code is correct"){
               header("Location:forgot.php?mode=enter_password");
                die();
                }
                else{
                    $error[] = $result;
                }

                break;

                case "enter_password":
                    //code...
                    $password = $_POST["password"];
                    $password2 = $_POST["password2"];

                    if($password =! $password2){
                        $error[] = "passwords do not match";
                    }
                    else{
                        save_password($password);
                        header("Location:login.php");
                        die();
                    }
                    break;

                    default:
                    //code...
                    break;
    }
}
            function send_mail($email){
                global $conn;

                $expire = time() + (60 * 1);
                $code = rand(10000,99999);
                $email = addslashes($email);
                
                $query = "INSERT INTO codes (email,code,expire) VALUES ('$email', '$code', '$expire')";
                mysqli_query($conn, $query);

                //send email here
                // mail($email, 'website: reset password', "reset code is $code");
                return true;
            }
            function valid_email($email){
                global $conn;

                $email = addslashes($email);

                $query = "SELECT * FROM tabledata WHERE email = '$email' order by id DESC limit 1";
                $result = mysqli_query($conn, $query);

                if($result){
                    if(mysqli_num_rows($result) > 0){
                            return true;
                    }
                }

            }
            function save_password($password){
                global $conn;

                // $expire = time() + (60 * 1);
                // $code = rand(10000,99999);
                $password = password_hash($password, PASSWORD_DEFAULT);
                $email = addslashes($_SESSION['email']);
                
                $query = "UPDATE tabledata set password = '$password' WHERE email = '$email' limit 1";
                mysqli_query($conn, $query);

                return true;
            }
            function is_code_correct($code){
                global $conn;
                $code = addslashes($code);
                $expire = time();
                $email =addslashes($_SESSION['email']);

                $query = "SELECT * FROM codes WHERE code = '$code' && email = '$email' && expire > $expire  order by id DESC limit 1";
                $result = mysqli_query($conn, $query);

                if($result){
                    if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                        if($row['expire'] > $expire){
                        return "the code is correct";
                        }
                        else{
                            return "the code is expired";
                        }
                    }
                    else{
                        return "the code is incorrect";
                    }
                }

                return "the code is incorrect";

            }
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            font-family:fraktur,sans-serif;
        }
        form{
            width: 100%;
            max-width: 300px;
            margin: auto;
            border: solid  #ccc;
            padding: 10px;
        }
        input[type="text"],input[type="password"]{
            width: 180px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php
    switch($mode){

        case "enter_email":
            //code...
            ?>

            <form action="forgot.php?mode=enter_email" method="post">
            <h2>FORGOT PASSWORD</h2>
        <span style="font-size:12px;color:red;">
            <?php
                            foreach($error as $err){
                                echo $err . "<br>";
                            }
                    ?>
        </span>
            <input type="text" placeholder="Enter your email address" name="email">
    <br>
    <br>
            <input type="submit" value="next" name="login">
            <br><br>
            <a href="login.php">login?</a>
        </form>

        <?php
            break;

            case "enter_code":
                //code...
  ?>
            <form action="forgot.php?mode=enter_code" method="post">
            <h2>FORGOT PASSWORD</h2>
            <h3>Enter the code sent to your email address</h3>
            <span style="font-size:12px;color:red;">
            <?php
                            foreach($error as $err){
                                echo $err . "<br>";
                            }
                    ?>
        </span>
            <input type="text" placeholder="12345" name="code">
    <br><br>
    <a href="forgot.php">
            <input type="button" value="Start Over" style="float: left">
    </a>
    
            <input type="submit" value="next" name="login" style="float: right">
            <br>
            <br>
            <a href="login.php">login?</a>
        </form>
        
        <?php
                break;

                case "enter_password":
                    //code...
        ?>
                    <form action="forgot.php?mode=enter_password" method="post">
                    <h2>FORGOT PASSWORD</h2>
                    <h3>Enter your new password</h3>
                    <span style="font-size:12px;color:red;">
            <?php
                            foreach($error as $err){
                                echo $err . "<br>";
                            }
                    ?>
        </span>
                    <input type="text" placeholder="Password" name="password">
            <br><br>
                    <input type="text" placeholder="Retype password" name="password2">
            <br><br>
            <a href="forgot.php">
            <input type="button" value="Start Over" style="float: left">
    </a>
                    <input type="submit" value="next" name="login" style="float: right">
                    <br><br>
                    <a href="login.php">login?</a>
                </form>
                
                <?php
                    break;

                    default:
                    //code...
                    break;
    }
    ?>
</body>
</html>