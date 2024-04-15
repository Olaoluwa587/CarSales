<?php
session_start();
require_once "../includes/header.php";

require_once "../includes/dbconn.php";

$fgpsw ="";

if(isset($_POST['continue'])){
    


    $email = $_POST['email'];
    $_SESSION['email'] = $email;


    $sql = "SELECT * FROM signup WHERE email = '$email'";
    $query = mysqli_query($connection,$sql);

    $result = mysqli_num_rows($query);
    if($result > 0){
                        
        $code = rand(10000,99999);
        $_SESSION['code'] = $code;
    
        $email = addslashes($email);

        $expire = time() + (60 * 5);
        $_SESSION['expire'] = $expire;

    
        $sql = "INSERT INTO verify (email, code, expire) VALUES ('$email', '$code', '$expire')";
        $query = mysqli_query($connection, $sql);

            if(!$query){
                $fgpsw = "failed";
            }
            else{
                    if(require 'mail.php'){
                        $mail->Subject = "Password Recovery";
                        $mail->Body = "Your password reset code is $code \n please do not share this code with anyone, to prevent access to your account.";
                        $mail->addAddress("$email");

    if( $mail->Send() ){
            header("Location:code.php");
}
    else{
            return false;
}
$mail->smtpClose();
                    }

                    $sent = "code.php";
                    $_SESSION['sent'] = $sent;
                    $failed = "fgpsw.php";
            }
    }
    else{
        $fgpsw = "Sorry this email is not recognised";
            // return false;
        // return true;
        }
        if(isset($_POST['continue'])){
                return false;
        }
    }
    mysqli_close($connection);



?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<h2 class="log">RESET YOUR PASSWORD</h2>
<br>
<h3 id="logtext">Please enter your email address, and proceed to changing your password.</h3>
<span class="error"><?php echo $fgpsw; ?></span>
<br>

            <label for="">Email Address</label>
<br><br>
            <input type="text" name="email" placeholder="Email Address...">
<br><br>
            <input type="submit" name="continue" value="Continue">
</form>