<?php


function formValidation($name,$email, $password, $username, $number){

        if(empty($name) || empty($email) || empty($password) || empty($username || empty($number))){
            $err = "input fields should be completely filled";
            echo "<div class='alert alert-danger'><strong>".strtoupper($err)."</strong></div>";
            // return $err;
        }
        elseif(!preg_match("/^[a-zA-Z ]+$/",$name)){
            $err = "name format is wrong";
            echo "<div class='alert alert-danger'><strong>".strtoupper($err)."</strong></div>";
            // return $err;
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $err = "email format is wrong";
            echo "<div class='alert alert-danger'><strong>".strtoupper($err)."</strong></div>";
            // return $err;
        }
        elseif(strlen($password) <= 8){
            $err = "password length is too short";
            echo "<div class='alert alert-danger'><strong>".strtoupper($err)."</strong></div>";
            // return $err;
        }
        else{
            // $err = "all correct";
            // echo "<div class='alert alert-success'><strong>".strtoupper($err)."</strong></div>";
            return true;
        }
}

?>