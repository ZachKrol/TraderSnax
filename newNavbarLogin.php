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
          <a class="navbar-brand" target="_blank" href="https://github.com/ZachKrol/TraderSnax">
            <img src="./images/TS_LOGO.png" alt="Logo" style="width:40px;" class="rounded-pill"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><b class="h4">Trader Snax</b></a>
        </li>
      </ul>
    </div>
  </nav>

</body>

</html>