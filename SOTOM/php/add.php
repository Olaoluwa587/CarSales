<?php
session_start();
// include_once '../includes/staff.php';

require_once '../includes/dbconn.php';




$error = "";

$submit = isset($_POST['submit']);
$_SESSION['submit'] = $submit;

if($submit){
        $name = $_POST['name'];
        $_SESSION['name'] = $name;

        $address = $_POST['address'];
        $_SESSION['address'] = $address;

        $position = $_POST['position'];
        $_SESSION['position'] = $position;

        $telephone = $_POST['telephone'];
        $_SESSION['telephone'] = $telephone;

        $salary = $_POST['salary'];
        $_SESSION['salary'] = $salary;


        if(empty($name) || empty($address) || empty($position) || empty($telephone) || empty($salary)){
                $error = "<div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'></button>
                <strong>ERROR: INPUT FIELDS CANNOT BE EMPTY!!!</strong> </div>";
        }
        elseif(!preg_match("/^[a-zA-Z ]*$/" ,$name)){
                $error = "<div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'></button>
                <strong>ERROR: INVALID CHARACTERS USED IN NAME</strong> </div>";
        }
        elseif(strlen($telephone) < 11 || strlen($telephone) > 11 || !preg_match("/^[0-9]*$/", $telephone)){
                $error = "<div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'></button>
                <strong>ERROR: INVALID PHONE NUMBER</strong> </div>";
        }
        elseif(!preg_match("/^[#0-9,]*$/", $salary)){
                $error = "<div class='alert alert-danger alert-dismissible fade show'>
                <button type='button' class='close' data-dismiss='alert'></button>
                <strong>ERROR: SALARY FORMAT IS WRONG, e.g(#500,000)</strong> </div>";
        }
        else{
                $sql = "SELECT * FROM newEY WHERE name='$name' AND address='$address'";
                $query = mysqli_query($connection, $sql);
                if($query){
                        $result = mysqli_num_rows($query);
                                if($result > 0){
                                        $error = "<div class='alert alert-danger alert-dismissible fade show'>
                                        <button type='button' class='close' data-dismiss='alert'></button>
                                        <strong>ERROR: DETAILS ALREADY EXISTS!!! </strong> </div>";
                                }
                                else{
                                        $stmt = "INSERT INTO newEY(name,address,salary,position,telephone) VALUES ('$name', '$address', '$salary', '$position', '$telephone')";
                                        $exect = mysqli_query($connection,$stmt);

                                        if(!$exect){
                                                $error = "<div class='alert alert-danger alert-dismissible fade show'>
                                                <button type='button' class='close' data-dismiss='alert'></button>
                                                <strong>ERROR: FAILED</strong> </div>";
                                        }
                                        else{
                                                $error = "<div class='alert alert-success alert-dismissible fade show'>
                                                <button type='button' class='close' data-dismiss='alert'></button>
                                                <strong>CONGRATS, DATA HAS BEEN SUCCESSFULLY STORED!!!</strong> </div>";
                                        }
                                }
                }
        }
}



?>

<style>
        .sidenav{
    background-color: #006677;
    width: 210px;
    height:143vh;
    font-size:1px;
    font-style: oblique;
    position:absolute;
    top: 0;
}
.content{
   width:210px;
    /* color: green; */
}
.details{
        height:auto;
        width: auto;
        padding:0px 0px 0px 15px;
}
.alert{
        /* height:10px; */
        font-size:15px;
        padding: 0;
        margin: 0;
}
.alert strong{
        margin-left:10px;
}
@media screen and (max-width:600px){
        body{
                font-size:20px;
                margin: auto;
                width: 100%;
        }
        .logo{
        position: absolute;
        top: 0;
        left: -5%;
        height:50px;
        background-color: #f5f5f5;;
        width: 110%;
        z-index: -1; 
        }
        .logo h1{
        text-align: center;
        font-weight: bold;
        font-size:15px;
        font-family:Arial, Helvetica, sans-serif;
        text-transform: uppercase;
        color: green;
        background-color:rgba(0, 0, 0, 0);
        align-items: center;
        justify-content: center;
        /* margin-bottom: -10px; */

        }
        section{
    position: absolute;
    top: 12%;
    margin:0 -30% 0 0;
    /* z-index: 1; */
}
table{
    width:max-content;
    font-size:12px;
    font-family:arial,sans-serif;
    text-transform: capitalize;
    border-collapse: collapse;
    background-color: #006677;
    margin: 3% -10% 0 0px;
    /* line-height: 10px; */
    justify-content: center;
}
.bold{
    font-family: "Courier New";
    color: red;
    font-size: 15px;
}
        .sidenav{
                display:block;
                position:relative;
    top: 100px;
    width:100%;
        }
        .sidenav ul li{
                margin-left: 35%;
                width: 100%;
        }
        .titlec{
    font-size:30px;
    font-style: normal;
    position: absolute;
    top: 0;
    margin-left:-35%;
    text-align: center;
}
        #form1{
                font-size:20px;
                /* margin-left: -45%; */;
        }
        input[type="text"],input[type="tel"],input[type="date"]{
        width: 100%;
        height: 20px;
        border: none;
        font-size:20px;
        background:transparent;
        border-bottom: 2px solid #006677;
        outline: none;
        color: royalblue;
        line-height: 120px;
                }
                input[type="text"]:focus,input[type="tel"]:focus,input[type="date"]:focus{
    border:none;
    border-radius: 0px;
    border-bottom: 2px solid red;
    outline: none;
}
input[type="submit"]{
    width: 50%;
    height: 45px;
    border-radius: 10px;
    margin-top: 2em;
    font-size: 20px;
    color: white;
    background-color:#006677;
    text-transform: uppercase;
    font-family: algerian, ser;
    font-weight:bolder;
    letter-spacing:5px
}
input[type="submit"]:hover{
    /* padding: 5px; */
    height: 47px;
    width:52%;
    background-color: orangered;
    color:#fff;
}
        .alert{
                font-size:12px;
                margin-left:-1%;
                width:100%;
                text-align: center;
        }
        .employee{
    text-align: center;
    background-color:#006677;
    font-size: 20px;
    color:white;
    /* margin-left: -43%; */
    width: 105%;
}

}
</style>

                <div class="logo">
        <h1>sotom <b class="bold">automobile's</b> limited <b class="bold">dashboard</b></h1>
    </div>
<div class="sect">
    <section>
            <h4 class="employee">ADD EMPLOYEES' DETAILS</h4>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="form1" name="form1" autocomplete="off">
            <!-- <marquee behavior="scroll" direction="left" scrollamount="20"><h4 class="welcome">WELCOME TO THE ADMIN PAGE!!!</h4></marquee><br> -->
            <!-- <h5 class="textInfo">please fill the form below to add an employee to your employee page.
                this page is strictly, and should strictly <br> be controlled by the admin(OWNER)
                of the webpage
            </h5> -->

<span class="err"><?php echo $error ?></span>
            <div class="details">
        <label for="">Name </label><br>
        <input type="text" name="name" placeholder="Enter Your Name">
<br>
        <label for="">address</label><br>
        <input type="text" name="address" placeholder="Enter Address">
<br>
        <label for="">position</label><br>
        <input type="text" name="position" placeholder="Enter Position">
<br>
        <label for="">telephone</label><br>
        <input type="tel"  name="telephone" placeholder="Enter Phone-Number">
<br>
        <label for="">Salary</label><br>
        <input type="text"  name="salary" placeholder="Enter Salary Amount">
<br>
        <label for="">date of added new employee</label><br>
        <input type="text" name="date" max="2000-12-01" value= "<?php echo date("l jS \of F Y H:i:sa") ?>" disabled="disabled">
<br>
        <input type="submit" name="submit">

        <a href="staff.php" class="btn btn-success" style="margin-left:20%;width:20%;font-weight:bolder;font-size:25px">CHECK DATA</a>
        <!-- <input type="submit"  value="CHECK DATA" name="check" style="float:right;transform:translate(-450px, 0)"> -->
        </div>
    </form>
    <!-- <div class="sidenav">
            <ul>
                <li>
                    <h3 class="titlec">CONTENTS</h3>
                </li>
                <li class="titlec1"><i class="fa fa-home" style="font-size:25px;color:black;margin-left:10px"><a href="cms.php">Home</a></i></li>
            <li>
                <div class="drop_content">
                <i class="fa fa-user-plus" style="font-size:25px;color:black;margin-left:10px"><a class="dropbtn">employees</a></i>
                
                <div class="content">
                <i class='fas fa-user-plus' style="font-size:25px;color:black;margin-left:10px"><a href="add.php">add data</a></i><br>
                 <i class='fas fa-user-edit'  style="font-size:25px;color:black;margin-left:10px"><a href="staff.php"> check data</a></i>
                </div>
                </div>
            </li>
            <li><i class="fa fa-folder-plus" style="font-size:25px;color:black;margin-left:10px"><a href="">applications</a></i></li><br><br>
            <li><i class="fa fa-users" style="font-size:25px;color:black;margin-left:10px"><a href="">about</a></i></li><br>
            <li><i class="fa fa-book" style="font-size:25px;color:black;margin-left:10px"><a href="">comments</a></i></li><br>
            <li><i class="fa fa-user" style="font-size:25px;color:black;margin-left:10px"><a href="">attendants</a></i></li><br>
            <li><i class="fa fa-gear" style="font-size:25px;color:black;margin-left:10px"><a href="">settings</a></i></li><br>
            <li><i class="fa fa-globe" style="font-size:25px;color:black;margin-left:10px"><a href="car.php">Website</a></i></li><br>
            <li><i class="fa fa-user-slash" style="font-size:25px;color:black;margin-left:10px" id="change"><a href="">Failed Applicants</a></i></li><br>
            <li><i class="fa fa-user-lock" style="font-size:25px;color:black;margin-left:10px"><a href="">login</a></i></li><br>
            <li><i class="fa fa-power-off" style="font-size:25px;color:black;margin-left:10px"><a href="admin.php">logout</a></i></li><br>
            <!-- <li><i class="fa fa-gear" style="font-size:25px;color:black;margin-left:10px"><a href="">homepage</a></i></li><br> -->
            <!-- <li><i class="fa fa-gear" style="font-size:25px;color:black;margin-left:10px"><a href="">content</a></i></li><br> -->
<!-- 
            </ul>
        </div>
</section> --> 
<!-- </div> -->