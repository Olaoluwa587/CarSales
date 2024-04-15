<?php
// session_start();
      require_once "../includes/header.php";

      require_once "../includes/dbconn.php";

      $namepswErr="";
      
      if(isset($_POST['submit'])){

            if(isset($_POST['rmbm'])){
                  setcookie("uname", $_POST["username"], time()+3600);
                  setcookie("pass", $_POST["password"], time()+3600);
            }
            else{
                  setcookie("uname", $_POST["username"], time()-3600);
                  setcookie("pass", $_POST["password"], time()-3600);
            }

            // $send = $_POST['submit'];
            $username = $_POST['username'];
            $uusername2 = strtolower($username);
            $password = $_POST['password'];

            if(empty($username) || empty($password)){
                  $namepswErr = "Input fields should be completely filled";
                  // return false;
            }
            else{

      $sql = "SELECT * FROM signup WHERE username= '$uusername2' or email= '$username' AND password= '$password'";
      $query = mysqli_query($connection, $sql);

      $result = mysqli_num_rows($query);
      if($result > 0){
            // echo "welcome $username your password is $password";
            header("Location:car2.php");
            
      }else{
            // header("Location:sign-up.php");
            $namepswErr = "Username or password incorrect";
            // echo "you do not have an account with us please click the link below to be redirected to the sign up page<br>
            // <a href='car.php'>Sign-Up</a>";
      }
            }
      }
else{
      // return false;
      // $nameErr = "";
      // $passwordErr = "";
}

function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
}
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<h2 class="log">LOGIN PAGE</h2>
<br>
<h3 id="logtext">Please login to continue to <b>Sotom automobile limited</b></h3>
<span class="error"><?php echo $namepswErr ?></span>
<br>

            <label for="">Username</label>
<br>
            <input type="text" name="username" placeholder="Username/Email Address..." value="<?php if(isset($_COOKIE['uname'])) {echo $_COOKIE['uname'];}?>">
<br>
<br>
            <label for="">Password</label>
<br>
            <input type="password" name="password" placeholder="Password" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>">
<br>
<br>
            <span class="rmbm1"><input type="checkbox" name="rmbm" checked="checked">Remember me</span>
                  <span class="pswforget">
                        <a href="fgpsw.php">Forgot Password?</a>
                        <a href="sign-up.php">Dont have an account, <b>Sign-Up</b></a>
                  </span>
<br>
            <input type="submit"  name="submit" value="Login">
</form>