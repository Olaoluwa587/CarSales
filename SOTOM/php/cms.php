<?php
session_start();

$username = $_SESSION['username'];

include_once '../includes/staff.php';
?>
    <style>
    @media only screen and (max-width: 600px) {
        body{
            width: 100%;
        }
        .sidenav{
            /* width: 20px;
            font-size: 12px;
            font-weight: normal; */
            display:none;
        }
        
    }
    </style>
<div class="sect">
    <section>
        <marquee behavior="scroll" direction="left" scrollamount="20"><h4 class="welcome" style="font-size:30px">WELCOME TO THE ADMIN PAGE!!!</h4></marquee><br>
    </section>
</div>


</body>
</html>