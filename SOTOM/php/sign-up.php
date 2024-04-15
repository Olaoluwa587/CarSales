<?php
session_start();
      require_once "../includes/header.php";

      require_once "../includes/dbconn.php";

      // require 'PHPMAILER/Exception.php';
      // require 'PHPMAILER/PHPMailer.php';
      // require 'PHPMAILER/SMTP.php';


      // $mail = new PHPMailer;

      // $mail->isSMTP();
      // $mail->Host = 'smtp.gmail.com';
      // $mail->SMTPAuth = true;
      // $mail->Username = 'programmingpage1@gmail.com';
      // $mail->Password = 'GODISGREATEST@1.';
      // $mail->SMTPSecure = 'tis';
      // $mail->Port = 587;






      $msg= $nameErr = $emailErr = $passErr = $pass2Err ="";
      if(isset($_POST['submit'])){
$outcome = false;

            $username = $_POST['username'];
            $_SESSION['username'] = $username;

            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if(empty($username)){
                  $nameErr = "<div class='alert alert-danger alert-dismissible fade show'>
                  <button type='button' class='close' data-dismiss='alert'></button>
                  <strong>ERROR: USERNAME IS REQUIRED</strong> </div>";
                  // $outcome;
            }
            elseif(!preg_match("/^[a-zA-Z0-9 ]*$/", $username)){
                        // $nameErr = "";
                        $nameErr = "<div class='alert alert-danger alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'></button>
                        <strong>ERROR: username can only contain alphanumeric characters and numbers.</strong> </div>";
                        // $outcome;
            }
            elseif(empty($email)){
                  $emailErr = "<div class='alert alert-danger alert-dismissible fade show'>
                  <button type='button' class='close' data-dismiss='alert'></button>
                  <strong>ERROR:    Email Address is required.</strong> </div>";
            }
            elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        // $emailErr = "";
                        $emailErr =  "<div class='alert alert-danger alert-dismissible fade show'>
                        <button type='button' class='close' data-dismiss='alert'></button>
                        <strong>ERROR:    Email Address Is not vaild</strong> </div>";
                        // $outcome;
            }
            elseif(empty($password)){
                  $passErr = "<div class='alert alert-danger alert-dismissible fade show'>
                  <button type='button' class='close' data-dismiss='alert'></button>
                  <strong>ERROR:   Password is required.</strong> </div>";
            }
            elseif(empty($password2)){
                  $pass2Err = "<div class='alert alert-danger alert-dismissible fade show'>
                  <button type='button' class='close' data-dismiss='alert'></button>
                  <strong>ERROR:    Password Confirmation is required.</strong> </div>";
                  // return false;
                  // $outcome;
            }
            elseif(strlen($password)< 8){

                  $passErr = "<div class='alert alert-danger alert-dismissible fade show'>
                  <button type='button' class='close' data-dismiss='alert'></button>
      <strong>ERROR: Password is not strong,password should be at least 8 characters long with symbols.</strong> </div>";
            }
            elseif($password != $password2){

                  $passErr = "<div class='alert alert-danger alert-dismissible fade show'>
                  <button type='button' class='close' data-dismiss='alert'></button>
                  <strong>ERROR:    Passwords do not match</strong> </div>";

                  // $pass2Err = "<div class='alert alert-danger alert-dismissible fade show'>
                  // <button type='button' class='close' data-dismiss='alert'></button>
                  // <strong>ERROR:    Passwords do not match</strong> </div>";
            }
            else{
            $sql = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
            $query = mysqli_query($connection,$sql);

            $result = mysqli_num_rows($query);

                  if($result > 0){
                        $msg = "
                        <strong class='text-danger'>ERROR: Username or Password Already Esist, please proceed to login
                        <a href='login.php'>login</a>.</strong>";
                  }
            
            else{
                  // if((!empty($username && $email && $password && $password2)) && $password === $password2){
                        // $passworD = password_hash($password, PASSWORD_DEFAULT);
                        // $passworD2 = password_hash($password2, PASSWORD_DEFAULT);
$username2 = strtolower($username);
                  $stmt = $connection->prepare("INSERT INTO signup (email, username, password, password2) VALUES (?, ?, ?, ?)");
                  $stmt->bind_param("ssss",$email,$username2,$password,$password2);
                  $query = $stmt->execute();
                  // $query = mysqli_query($connection,$sql);

                  if(!$query){
                        echo "update failed.".mysqli_error($connection);
                  }else{
                        $msg = "update successful";

                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        //mailing

                        if(require 'mail.php'){
                              $mail->Subject = 'SOTOM AUTOMOBILE LIMITED';
                              $mail->addCustomHeader('Content-type: text/html; charset=iso-8859-1');
                              $mail->Body = "
                              <html>
                        <head>
                                <title>CONGRATULATIONS!!!</title>
                        </head>
                  <body>
                              <p>
                              Congrats you have successfully created your account with us,your account has now been 
                              successfully created with us, and you now have access to all of our services and cars but
                              since my account is not fully functional, you can use <a href='http://www.toyota.com'>CARS</a>
                               your account details are below 
                               </p>
                               <h2>
                               <b style'text-align:center;>YOUR ACCOUNT DETAILS ARE BELOW </b>
                               <h3> USERNAME: <strong style'text-transform:uppercase;'> $username </strong> </h3>
                               <h3> PASSWORD: <strong style'text-transform:uppercase;'> $password </strong> </h3>
                  </body>
                              </html>
                              ";
                              $mail->addAddress("$email");
            if($mail->send()){
                        header("Location:login.php");
            }
            else{
                  echo "mailing failed";
                  return false;
            }
                              }
                        }
                    }
                }
            }

?>
<style>
      form{
            padding:10px;
      }
</style>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<h2 class="log">SIGN-UP PAGE</h2>
<br>
<!-- <span class="error"></span> -->
<h3 id="logtext">Please proceed to signing up with <b>Sotom automobile limited</b>
we are the leading car industry in the world, sign up and see our cars</h3>
<br>
      <span>
               <!-- <div class="alert alert-danger alert-dismissible fade show">
                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                   <strong>ERROR:</strong> -->
               <!-- </div> -->
   <?php 
      echo $msg;
      echo $nameErr ;
      echo $emailErr;
      echo $passErr;
      echo $pass2Err;
               ?>
      </span>
<br>
            <label for="">UserName</label>
<br>
            <input type="text" name="username" placeholder="Enter Username...">
<br>
<!-- <span class="error"></span> -->
<br>
            <label for="">Email Address</label>
<br>
            <input type="text" name="email" placeholder="Email-Address">
<br>
<!-- <span class="error"></span> -->
<br>

            <label for="">Password</label>
<br>
            <input type="password" name="password" placeholder="Password">
<br>
<!-- <span class="error"></span> -->
<br>

            <label for="">Re-Type Password</label>
<br>
            <input type="password" name="password2" placeholder="RE-Enter Password">
<br>
                  <span class="pswforget">
                        <a href="login.php">Already have an Account? <b>Login</b></a>
                   </span>
<br>
            <input type="submit"  name="submit" value="Sign-Up">
</form>