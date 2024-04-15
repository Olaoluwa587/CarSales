<?php

include_once '../includes/header.php';

require_once '../includes/dbconn.php';
$succ = $err = $user1 = $email1 = "";

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $user = strtoupper($username);

    $email = $_POST['email'];

    if(empty($username)){
        $user1 = "username is empty";
    }
    elseif(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            $user1 = "username can only contain letters, numbers.";
        }
    elseif(empty($email)){
        $email1 = "email is empty";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email1 = "invalid email address";
        }
    // if(!empty($username) && !empty($email)){
        else{
        $sql = "SELECT* FROM newsletter WHERE username = '$username' AND email = '$email' ";
        $query = mysqli_query($connection, $sql);

        if($query){

            $result = mysqli_num_rows($query);
        if($result > 0){
            $err = "You are already subscribed to our newsletter";
        }
        else{
            $sql2 = "INSERT INTO newsletter (username, email) VALUES ('$username', '$email')";
            $query2 = mysqli_query($connection, $sql2);

            if(require 'mail.php'){
                $mail->Subject = "SUCCESSFUL SUBSCRIPTION TO OUR NEWSLETTER";
                $mail->Body = "Dear $user, you have successfully subscribed to our newsletter
                , you will now be updated about all possible offers and deals\r\n
                                                        THANK YOU $user FOR YOUR PATRONAGE.";
                $mail->addAddress($email);

                if($mail->send() ){
                        $succ = strtoupper("congratulations you have successfully subscribed to our newsletter.");
                    }
                    else{
                        $err = strtoupper("failed subscription try again");
                    }
            }            
            // $err = "";
            }
        }
    }
}

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off" >
<span class="error"><?php echo "<strong class='alert-danger'>".$err."</strong>"."<strong class='alert-success text-dark'>".$succ."</strong>" ?></span>

<h2 class="log">SUBSCRIBE TO OUR NEWSLETTER</h2>
<br>
<h3 id="logtext">Please subscribe to our newsletter to be notified about our new and exciting deals
you are not going to recieve any spam mails, we are only asking you to subscribe to our newsletters
so that you will alerted of any discount or exciting deals <br><b id="sal">Sotom automobile limited</b></h3>

<br>

<span class="error"><?php echo $user1 ?></span><br>
            <label for="">Username</label>
<br>
            <input type="text" name="username" placeholder="Username">
<br>
<span class="error"><?php echo $email1 ?></span><br>
            <label for="">Email</label>
<br>
            <input type="text" name="email" placeholder="Email Address">
<br><br>
            <h3 class="check"><input type="checkbox">Daily Newsletter</h3>
<br>
            <input type="submit"  name="submit" value="Subscribe">
</form>