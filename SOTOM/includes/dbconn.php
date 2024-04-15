<?php

$DB_SERVER = "localhost";
$DB_HOST= "root";
$DB_PASS = "Juwon01";
$DB_NAME = "sotom";

$connection = mysqli_connect($DB_SERVER,$DB_HOST,$DB_PASS,$DB_NAME);
if (!$connection){
    die("<script> console.log('Error connecting to SOTOM').</script>".mysqli_connect_error());
}
else{
    echo "<script> console.log('SOTOM connection successful') </script> <br><br>";
}