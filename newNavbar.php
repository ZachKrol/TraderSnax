<html>

<head lang="en">
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');
  </style>
  <script>
    function getUser(uname){
        var dbParam = uname;

        const xmlhttp = new XMLHttpRequest();
        
        xmlhttp.open("GET", "userPages.php?username=" + dbParam, true);
        xmlhttp.send();
    }
  </script>
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
      <ul class="navbar-nav mx-auto">
        <form autocomplete="off" class="d-flex mb-0">
          <input class="form-control me-2 rounded-pill" id="searchUser" name="searchUser" type="text" placeholder="Search Users" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
        </form>
        <ul class="dropdown-menu" id="searchResults" name="searchResults" aria-labelledby="defaultDropdown">
          <?php
          session_start();
          if ($_SESSION["loggedin"]) {
            $config = parse_ini_file("dbconfig.ini");

            //Database connection
            $link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
            if ($link->connect_error) {
              die("Connection failed: " . $link->connect_error);
            }

            $currentUser = $_SESSION["username"];
            $sqlPic = "SELECT * FROM users WHERE username = '$currentUser'";
            $picResult = $link->query($sqlPic);
            $picRowResult = $picResult->fetch_assoc();
            $profilePicture = $picRowResult["profilePicURL"];

            $sql = "select * FROM users";
            $result = $link->query($sql);
            while ($record = $result->fetch_assoc()) {
              $username = $record['username'];
              echo '<li class="dropdown-item"><a onClick="getUser(\'' . $username . '\')">' . $username . '</a></li>';
            }
          }
          ?>
        </ul>
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
            <img src="profilePictures/<?php echo $profilePicture; ?>" alt="Logo" style="width:40px;" class="rounded-pill">
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <script>
    $(document).ready(function() {
      $("#searchUser").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#searchResults li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
</body>

</html>
