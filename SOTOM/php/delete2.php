<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script lang="javascript" type="text/javascript">
    function validation() {
        var check = confirm('do you want it');

    if(check == true){
// alert('Do you really want to');
window.location = "staff.php";
            }
    else{
window.location = "staff.php";
        
    }
    }
    </script>

</body>
</html>
<?php

include '../includes/dbconn.php';
error_reporting(0);

    global $connection;

    $sql = "DELETE FROM newEY";
    $query = mysqli_query($connection, $sql);
    $msg = "no data to be returned";

    if($query){

        $result = mysqli_num_rows($query);
        if($result <= 0){
            echo "<script> validation() </script>";
        }
        else{
            header('Location:staff.php');
        }
    }

?>