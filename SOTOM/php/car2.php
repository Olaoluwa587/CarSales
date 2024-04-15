<?php
// require 'login.php';

if(isset($sendmsg)){
  header("Location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../stylesheet/car123.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!--logo of the website -->
    <div class="logo">
        <h1>sotom <b class="bold">automobile's</b> limited</h1>
    </div>

    <div class="navbar">
        <nav>
            <a href="actuion.php" class="link">Auction</a>
            <a href="about.php" class="link">About</a>
            <a href="gallery.php" class="link">Gallery</a>
            <a href="" class="link">Contact Us</a>
            <a href="newsletter.php" class="link">Latest News</a>

            <div class="dropdown">
  <button class="dropbtn">Account</button>
  <div class="dropdown-content">
    <a href="sign-Up.php">Sign-Up</a>
    <a href="login.php">Login</a>
    <a href="login.php">Logout</a>
  </div>
</div>

            <span id="inputs">
                <input type="search" id="lookup" placeholder="Search....">
                <input type="submit" id="search" value="Search">
            </span>
        </nav>
    </div>

<!-- <img src="../images/car 1.jfif" alt="" width="100%" height="auto"> -->
    <div id="demo" class="carousel slide" data-ride="carousel">

  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
    <li data-target="#demo" data-slide-to="4"></li>
    <li data-target="#demo" data-slide-to="5"></li>
    <li data-target="#demo" data-slide-to="6"></li>
    <li data-target="#demo" data-slide-to="7"></li>
    <li data-target="#demo" data-slide-to="8"></li>
    <li data-target="#demo" data-slide-to="9"></li>
    <li data-target="#demo" data-slide-to="10"></li>
  </ul>

  <div class="carousel-inner">

    <div class="carousel-item active">
      <img src="../images/car 1.jfif" alt="Los Angeles" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>We had such a great time in LA!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../images/car 3.jpeg" alt="Chicago" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>   
    </div>

    <div class="carousel-item">
      <img src="../images/car 5.jpg" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div> 
    </div>

      <div class="carousel-item">
      <img src="../images/car 6.jpg" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div> 
      </div>

      <div class="carousel-item">
      <img src="../images/car 7.jpg" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
</div>

      <div class="carousel-item">
      <img src="../images/car 8.jpg" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div> 
      </div>

      <div class="carousel-item">
      <img src="../images/car 9.jpg" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
      </div>

      <div class="carousel-item">
      <img src="../images/car 10.jfif" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
      </div>

      <div class="carousel-item">
      <img src="../images/car 11.jfif" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
      </div>

      <div class="carousel-item">
      <img src="../images/2017_lamborghini_centenario_4k-1920x1080.jpg" alt="New York" width="100%" height="auto">
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>   
    </div>

  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


  <div class="car_variety">
        <h2>we have a variety of car that best suits your style</h2>
        <select name="" id="">
              <option value="" selected>categories</option>
              <option value=""></option>
              <option value=""></option>
              <option value=""></option>
              <option value=""></option>
        </select>
        <select name="" id="">
          <option value="" selected>model</option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
        <select name="" id="">
          <option value="" selected>model</option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
        <select name="" id="">
          <option value="" selected>model</option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
        <select name="" id="">
          <option value="" selected>model</option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
        <select name="" id="">
          <option value="" selected>model</option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
          <option value=""></option>
        </select>
        <span class="alt">or</span>
        <span  class="build"><a href="">BUILD AND PRICE</a></span>
  </div>


</body>
</html>