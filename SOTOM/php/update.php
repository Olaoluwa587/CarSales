<?php
include '../includes/dbconn.php';
include '../includes/staff.php';
// error_reporting(0);

$id = $_GET['usersid'];
$sql2 = "SELECT * FROM newEY where $id=name";
$query2 = mysqli_query($connection, $sql2);
if($query2){
        $result = mysqli_num_rows($query2);
        if($result > 0){
                $row = mysqli_fetch_assoc($query2);
                if($row){
                        echo "<script> alert('hi: $id')</script>";
                }
        }
}
else{
        die("error");
}

if(isset($_POST['submit'])){
        
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];
    $position = $_POST['position'];
    $telephone = $_POST['telephone'];
    
$sql = "UPDATE newEY SET id=$id, name='$name', address='$address', salary='$salary', position='$position', telephone='$telephone' WHERE id=$id";
$query = mysqli_query($connection, $sql);


if($query){
    header("Location:staff.php");
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
.err{
    margin-top:20%;
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
            <h4 class="employee">UPDATE EMPLOYEES' DETAILS</h4>
    <form action="" method="post" id="form1" name="form1" autocomplete="off">
            <!-- <marquee behavior="scroll" direction="left" scrollamount="20"><h4 class="welcome">WELCOME TO THE ADMIN PAGE!!!</h4></marquee><br> -->
            <!-- <h5 class="textInfo">please fill the form below to add an employee to your employee page.
                this page is strictly, and should strictly <br> be controlled by the admin(OWNER)
                of the webpage
            </h5> -->


            <div class="details">
        <label for="">Name </label><br>
        <input type="text" name="name" placeholder="Enter Your Name" >
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
        <input type="text" name="date" max="2000-12-01" value= "<?php echo date("Y-m-d h:i:sa") ?>" disabled="disabled">
<br>
        <input type="submit" name="submit" value="UPDATE">
</div>
</form>