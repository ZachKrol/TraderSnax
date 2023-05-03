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
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-info sticky-top">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" target="_blank" href="https://github.com/ZachKrol/TraderSnax">
            <img src="./images/TS_LOGO.png" alt="Logo" style="width:40px;" class="rounded-pill"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><b class="h4" style="font-family: 'Trader Joes', sans-serif;">Trader Snax</b></a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item bg-text-secondary mx-3">
          <a class="nav-link px-3 rounded-4" style="background-color: #065b6c; color: white" href="products.php">View Products</a>
        </li>
        <li class="nav-item bg-text-secondary mx-3">
          <a class="nav-link px-3 rounded-4" style="background-color: #065b6c; color: white" href="logout.php">Log Out</a>
        </li>
        <li class="nav-item mx-3">
          <!-- TO DO: INSERT USER NAME AND PHOTO -->
          <a class="navbar-brand" href="profile.php">
            <img src="profilePictures/default.png" alt="Logo" style="width:40px;" class="rounded-pill">
          </a>
        </li>
      </ul>
    </div>
  </nav>

</body>

</html>