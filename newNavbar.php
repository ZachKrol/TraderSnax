<?php
    if ($_SESSION["loggedin"]) {
        $config = parse_ini_file("dbconfig.ini");
      
      //Database connection
      $link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
      if ($link->connect_error) {
          die("Connection failed: " . $link->connect_error);
        }
    }
    ?>
<html>
<head>
</head>
<body>    
<nav class="navbar navbar-expand-sm bg-info sticky-top">
<div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="navbar-brand" href="">
        <img src="TS_LOGO.png" alt="Logo" style="width:40px;" class="rounded-pill"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href=""><b>Trader Snax</b></a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="">Reviews</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
        <li class="nav-item dropdown">
        <!-- TO DO: INSERT USER NAME AND PHOTO -->
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <img src="profilePictures/default.png" alt="Logo" style="width:40px;" class="rounded-pill">
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

</body>
</html>