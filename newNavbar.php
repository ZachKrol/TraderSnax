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
  <nav class="navbar navbar-expand-md bg-info sticky-top">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navbar-brand" target="_blank" href="https://github.com/ZachKrol/TraderSnax">
            <img src="./images/TS_LOGO.png" alt="Logo" style="width:40px;" class="rounded-pill"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><b class="h4">Trader Snax</b></a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="products.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Reviews</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item dropdown">
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