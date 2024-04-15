<?php
include_once '../includes/staff.php';

include_once '../includes/dbconn.php';
error_reporting(0);

// $msg = "";
// $msg = $_GET['msg'];

// if(isset($_POST['delete2'])){

// $msg = strtoupper($msg);

// echo  "<div class='alert alert-primary alert-dismissible fade show' style='margin-top:25%;text-align:center;z-index:-1;font-size:25px;font-weight:bolder'>
// $msg </div>";
// }

?>
<style>
    .dropbtn {
    background-color: #006677;
    color: white;
    /* padding: 16px; */
    /* font-size: 16px; */
    border: none;
    font-weight: bold;
    font-size: 22px;
    margin-left: 15px;
  }
  
  /* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
    margin-left: 25%;
    /* margin-top: 14px; */
    /* display:flex; */
  }
  
  /* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  /* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  
  /* Change color of dropdown links on hover */
.dropdown-content a:hover{
    background-color: #ddd;
}
  
  /* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content{
    display: block;
}
  
  /* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    color:#333;
}
.buttons{
    display: flex;
    flex-direction: row;
    
}
</style>
<div class="sect">
        <section>
            <div class="test">
            <h3>EMPLOYEES INFORMATION</h3>
        </div>


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<!-- <button type="button" class="btn btn-primary">ADD DATA<button> -->

<div class="buttons">

<input type="text" name="search12" placeholder="search data" style="width:max-content">
<button class="btn-btn-dark" name="submitS" style="width:max-content;font-weight:bolder;background-color:#006677;color:black;border-radius:5px;">SEARCH</button>

    <div class="dropdown">
<button id="dropbtn" class="btn btn-success" style="width:max-content;font-weight:bolder;width:150px">DATA</button>
<div class="dropdown-content">
        <a onclick="window.open('add.php','data','width=600,top=15,left=455')" class="text-danger">ADD ONE DATA</a>
        <a href="add.php" class="text-danger">ADD MULTIPLE DATA</a>
</div>
    </div>  

    <!-- <a href="add.php" class="btn btn-success" >ADD DATA</a> -->
    <button class="btn btn-danger" style="font-weight:bolder;margin-right:25%" name="delete2">
        <a href="delete2.php" class="text-light" name="delete2" >DELETE ALL</a>
    </button>
</div>

            <table>


                    <?php

                        $sql = "SELECT * FROM newEY";
                        $query = mysqli_query($connection, $sql);

                        $error = "";

                        if($query){
                            $result = mysqli_num_rows($query);
                                if($result > 0 ){
                                    if(isset($_POST["submitS"])){
                                        $search = $_POST["search12"];
                                    
                                        $sql3 = "SELECT * FROM newEY where id=$search or name=$search";
                                        $query3 = mysqli_query($connection, $sql3);
                                    
                                        if($query3){    
                                            $result = mysqli_num_rows($query3);
                                            if(mysqli_num_rows($query3) > 0){
                                    
                                                echo '   <thead>
                                                <tr class="heading">
                                                    <th>Id</th>
                                                    <th>name</th>
                                                    <th>address</th>
                                                    <th>salary</th>
                                                    <th>position</th>
                                                    <th>Telephone</th>
                                                    <th class="empod" colspan="1">Employment-Date</th>
                                                    <th class="" colspan="2">Operations</th>
                                                </tr>
                                            </thead>';
                                    
                                                $row = mysqli_fetch_assoc($query3);
                                                echo "
                                                <tr class='info'>
                                                <td>".$row['id']."</td>
                                                <td class='name'>".$row['name']."</td>
                                                <td class='address'>".$row['address']."</td>
                                                <td>".$row['salary']."</td>
                                                <td class='position'>".$row['position']."</td>
                                                <td>".$row['telephone']."</td>
                                                <td class='date'>".$row['date']."</td>
                                                <td>
                                                <button class='btn btn-primary'><a href='update.php?usersid=$row[id]' class=text-light>UPDATE</a></button>
                                                </td>
                                                <td>
                                                <button class='btn btn-danger'><a href='delete.php?deleteid=$row[id]' class=text-light>DELETE</a></button>
                                                </td>
                                                <td>
                                                ";
                                            }
                                            else{
                                                echo "<h1 class='text-danger'>  NO RECORD FOUND </h1>";
                                            }
                                        }
                                    }
                                    else{
                                echo '   <thead>
                                             <tr class="heading">
                                                 <th>Id</th>
                                                 <th>name</th>
                                                 <th>address</th>
                                                 <th>salary</th>
                                                 <th>position</th>
                                                 <th>Telephone</th>
                                                 <th class="empod" colspan="1">Employment-Date</th>
                                                 <th class="" colspan="2">Operations</th>
                                             </tr>
                                         </thead>';
                                while($row = mysqli_fetch_assoc($query)){

                                                          
                                                    echo"
                                                    <tr class='info'>
                                                    <td>".$row['id']."</td>
                                                    <td class='name'>".$row['name']."</td>
                                                    <td class='address'>".$row['address']."</td>
                                                    <td>".$row['salary']."</td>
                                                    <td class='position'>".$row['position']."</td>
                                                    <td>".$row['telephone']."</td>
                                                    <td class='date'>".$row['date']."</td>
                                                    <td>
                                                    <button class='btn btn-primary'><a href='update.php?usersid=$row[id]' class=text-light>UPDATE</a></button>
                                                    </td>
                                                    <td>
                                                    <button class='btn btn-danger'><a href='delete.php?deleteid=$row[id]' class=text-light>DELETE</a></button>
                                                    </td>
                                                    </tr>";
                                }
                                    }
                                echo "</table></form>";
                        }}
                    // }<a style='text-decoration: none;color:white;font-weight:bolder;' href='update.php?updateid=$row[id]'>UPDATE</a>
                    if($result <= 0){
                        echo  "<div class='alert alert-info alert-dismissible fade show' style='position:absolute;z-index:-1;margin-top:10%'>
                        <button type='button' class='close' data-dismiss='alert'></button>
                        <strong>ALERT,ALERT! :- NO INFORMATION / RECORD FOUND IN DATABASE, PLEASE CLICK ON THE ADD DATA, TO ADD YOUR EMPLOYESS' INFORMATION</strong>.</strong> </div>";
                    }

                    ?>

<?php

// if(isset($_POST["submitS"])){
//     $search = $_POST["search12"];

//     $sql3 = "SELECT * FROM newEY where id=$search";
//     $query3 = mysqli_query($connection, $sql3);

//     if($query3){    
//         $result = mysqli_num_rows($query3);
//         if($result > 0){

//             echo '   <thead>
//             <tr class="heading">
//                 <th>Id</th>
//                 <th>name</th>
//                 <th>address</th>
//                 <th>salary</th>
//                 <th>position</th>
//                 <th>Telephone</th>
//                 <th class="empod" colspan="1">Employment-Date</th>
//                 <th class="" colspan="2">Operations</th>
//             </tr>
//         </thead>';

//             $row = mysqli_fetch_assoc($query3);
//             echo "
//             <tr class='info'>
//             <td>".$row['id']."</td>
//             <td class='name'>".$row['name']."</td>
//             <td class='address'>".$row['address']."</td>
//             <td>".$row['salary']."</td>
//             <td class='position'>".$row['position']."</td>
//             <td>".$row['telephone']."</td>
//             <td class='date'>".$row['date']."</td>
//             <td>
//             ";
//         }
//     }
// }
?>

        </section>
    </div>