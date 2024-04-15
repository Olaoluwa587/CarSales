<?php

include '../includes/dbconn.php';
include '../includes/staff.php';
error_reporting(0);

$deleteid = $_GET['deleteid'];
$query = "DELETE FROM newEY WHERE id = '$deleteid' ";

$data = mysqli_query($connection, $query);

if($data){
    header("Location:staff.php");
     ?>

    <?php
}else{
    echo "failed to delete record";
}

?>
<style>
    body{
        width: max-content;
    }
    #deleted{
        font-size:50px;
        margin-left: 35%;
        /* margin-top: auto; */
    }
    form{
        background-image: linear-gradient(red, yellow, blue);
        margin-top:10em;
        background-color: #ccc;
        color: royalblue;
        text-transform: uppercase;
        padding: 40px;
    }
    .content{
        padding: 20px;
    }
</style>