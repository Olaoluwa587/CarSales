<?php
session_start();
require_once "../includes/header.php";

require_once "../includes/dbconn.php";
$passErr = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
// $username = $_SESSION['username'];
    
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if($password != $password2){
                $passErr = "PASSWORDS DO NOT MATCH";
        }
        elseif(empty($password) || empty($password2)){
            $passErr = "Password field must not be empty";
        }
        else{
            $email = $_SESSION['email'];

            // $password = password_hash($password, PASSWORD_DEFAULT);
            // $password2 = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE signup SET password='$password', password2 = '$password2' WHERE email = '$email'";
        $query = mysqli_query($connection, $sql);

        if(!$query){
            echo "update failed.".mysqli_error($connection);
        }else{
            if (require_once 'mail.php'){
                $mail->Subject = "PASSWORD CHANGED SUCCESSFULLY";
                $mail->addCustomHeader('content-type: text/html; charset=utf-8');
                $mail->Body =  "<html>
                <head>
                        <title>CHANGE OF PASSWORD!!!</title>
                </head>
          <body>
                      <p>
                      Congrats you have successfully changed your account password with us,your account's password has now been 
                      successfully changed.
                       your account details are below 
                       </p>
                       <h2>
                       <b style'text-align:center;>YOUR ACCOUNT DETAILS ARE BELOW </b>
                       <h3> USERNAME: <strong style'text-transform:uppercase;'> $email </strong> </h3>
                       <h3> PASSWORD: <strong style'text-transform:uppercase;'> $password </strong> </h3>
          </body>
                      </html>
                ";
                $mail->addAddress("$email");
    if( $mail->Send() ){
            header("Location:login.php?Password changed successfully");
}
    else{
            return false;
}
$mail->smtpClose();
            }
        }
    }
}
mysqli_close($connection);
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<h2 class="log">ENTER YOUR NEW PASSWORD</h2>
<br>
<h3 id="logtext">Please enter your email address, and proceed to changing your password.</h3>
<span class="error"><?php echo $passErr ?></span>
<br>

            <label for="">New Password</label>
<br><br>
            <input type="password" name="password" placeholder="Password...">
<br><br>

<br>

            <label for="">Re-Type Password</label>
<br><br>
            <input type="password" name="password2" placeholder="Re Enter Password...">
<br><br>
            <input type="submit" name="continue" value="Continue">
</form>