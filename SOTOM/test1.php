
<!-- /**
 * Sending an email test
 */
// $to      = 'ooluwa587@gmail.com';
// $subject = 'header';
// $message = 'hello people';
// $headers = 'From: webmaster@example.com' . "\r\n" .
//     'Reply-To: webmaster@example.com' . "\r\n" .
//     'X-Mailer: PHP/' . phpversion();

// $result = mail($to, $subject, $message);
// if($result) {
//    echo 'Success';
// }else{
//    echo 'Fail';
// }
//  -->
<!-- $message = "Congrats you have successfully created your account with us,your account has now been 
successfully created with us, and you now have access to all of our services and cars but
since my account is not fully functional, you can use http://www.toyota.com \n
\n your account details are below \r\n
 USERNAME: $username \n
 PASSWORD  $password"; -->

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <div class="wrapper">
         <input type="text">
            <select id="country">
                <option value="US">US</option>
                <option value="NGN">NGN</option>
                <option value="CAD">CAD</option>
                <option value="SG">SG</option>
            </select>
     </div>


<form action="" method="post">
    <input type="text" name="inpu" value="name">
</form>


 </body>
 </html>

 <?php
$name = $_POST["inpu"];
?>