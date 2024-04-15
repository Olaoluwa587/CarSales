<?php

include_once '../includes/header.php';

require_once '../includes/dbconn.php';

$err = "";

if(isset($_POST["submit"])){
    require '../Functions/validation.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = "asdfghjkfdgxgvxcfgdfg";
$username = "asdfghjkfdgxgvxcfgdfg";
$number = $_POST['number'];
$subject = $_POST['subject'];
$matter = $_POST['matter'];

if(formValidation($name,$email, $password, $username, $number) === true){

$sql = "INSERT INTO contact (name,email,phoneNumber,subject,matter) VALUES('$name','$email','$number','$subject','$matter')";
$query = mysqli_query($connection, $sql);

if(!$query){
    die("Could not");
    }
else{
        echo "connected";
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
    <title>contact page</title>
    <script src="https://kit.fontawesome.com/b32f1a67cb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../stylesheet/contact.css">
</head>
<body>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">

            <h2>CONTACT-US FORM</h2>
            <h3 class="text"> please register your complaints !!!!</h3>

            <label for="" id="head">Name:</label>
            <input type="text" id="name" name="name">
<br><br>
            <label for="">Email:</label>
            <input type="text" id="email" name="email">
<br><br>
<label for="">PhoneNumber:</label>
<input type="text" id="phone" minlength="11" maxlength="11" name="number">

<!-- <div class="wrapper"> -->
<!-- <select name="country" id="country">
    <option value="US">US</option>
    <option value="NGN">NGN</option>
    <option value="CAD">CAD</option>
    <option value="SG">SG</option>
</select> -->
<!-- </div> -->

<br><br>
            <label for=""class="comment">Subject:</label>
            <input type="text" id="comment" class="comment" name="subject">
<br><br>
            <label for="" class="comment">Subject matter:</label><br>
            <textarea name="matter" id="matter" class="comment" cols="90" rows="7" placeholder="How can we Help you  please?"></textarea>
<br><br>
            <button type="submit" class="btn btn-secondary" id="submit" name="submit">SUBMIT</button>
            
            <!-- <h3 class="info">other ways to contact somtom automobile limited are below</h3><br> -->
<marquee behavior="scroll" direction="left" scrollamount="20" class="text">
            other ways to contact somtom automobile limited are below!!!!
            other ways to contact somtom automobile limited are below!!!! 
            other ways to contact somtom automobile limited are below!!!! 
            other ways to contact somtom automobile limited are below!!!! 
</marquee>
<br><br> 
           <div class="container">
                <i class="fa fa-facebook-square" style="font-size:34px" id="facebook" onclick="window.open('https:www.facebook.com')">Facebook</i>
                <i class="fa fa-instagram" style="font-size:34px" onclick="window.open('https:www.instagram.com')">Instagram</i>
                <i class="fa fa-twitter-square" style="font-size:34px" onclick="window.open('https:www.twitter.com')">Twitter</i>
                <i class="fa fa-whatsapp" style="font-size:34px"onclick="window.open('https:www.whatsapp.com')">Whatsapp</i>
                <br>
            </div>
<br><br>
            <div class="details"> <b> <span><b class="email">&phone; Tel:</b></span> 012354578901 or 98745632109</b>  <b class="email">Email Address:</b> <span class="mail" onclick="gmail()">ooluwa587@gmail.com</span> </div>
            </form>
<!-- <button onclick="window.open('/SOTOM/php/car.php','homepage','')">CLOSE</button> -->
            <script>
function gmail() {
    var gmail = confirm("proceeding to the next page");
    if(gmail === true){
    window.location = "https://mail.google.com/mail/u/0/#inbox?compose=new";
    }
    else{}
}
            </script>

</body>
</html>