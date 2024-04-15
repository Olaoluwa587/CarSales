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
            max-width: 200px;
            margin: auto;
            border: solid  #ccc;
            padding: 10px;
        }
        input[type="text"],input[type="password"],input[type="submit"]{
            width: 180px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <h1>LOGIN PAGE</h1>
        <input type="text" placeholder="Enter your email address" name="email">
        <br>
        <br>
        <input type="password" placeholder="Enter your password" name="password">
<br>
<br>
        <input type="submit" value="login" name="login">
        <br><br>
        <a href="forgot.php">forgot password?</a>

    </form>
</body>
</html>
