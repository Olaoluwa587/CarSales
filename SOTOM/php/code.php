<?php
session_start();
require_once "../includes/header.php";

require_once "../includes/dbconn.php";

$fgpsw = "";
$email = $_SESSION['email'];
$code = $_SESSION['code'];
$expire = $_SESSION['expire'];

$expire2 = time();

if(isset($_POST['continue'])){
    
$code1 = $_POST['code1'];

            $sql = "SELECT * FROM verify WHERE email = '$email' AND code = '$code'";
            $query = mysqli_query($connection,$sql);
if($query){
            
    $result = mysqli_num_rows($query);

    if($result > 0 ){
                if($code1 == $code && $expire > $expire2){
                header("Location:reset.php");
                $fgpsw = "correct";
                }
                elseif($code1 != $code){
                    $fgpsw = "code is incorrect";
                    }
                else{
                    $fgpsw = "code is expired";
                }
            }
            else{
                $fgpsw = "code is incorrect";
            }
}

}

// $fgpsw = "";

// if(isset($_POST['submit'])){
//     $email = $_SESSION['email'];

// }


?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<h2 class="log">FORGOT PASSWORD</h2>
<h3>Enter the reset code sent to your email</h3>
<br>
<h3 id="logtext">Please enter your email address, and proceed to changing your password.</h3>
<span class="error"><?php echo $fgpsw; ?></span>
<br>

            <label for="">VERIFICATION CODE</label>
<br><br>
            <input type="text" name="code1" placeholder="12345">
<br><br>
            <input type="submit" name="continue" value="Continue">
</form>