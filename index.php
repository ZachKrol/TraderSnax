#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TraderSnax</title>
  <link rel="stylesheet" href="styles.css">
  <!-- <link rel="icon" type="image/x-icon" href="../../favicon.ico" /> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="main.js"></script>
</head>

<body class="d-flex flex-column h-100">
  <div class="container py-3">
    <div class="row m-3">
      <div class="col-12 text-center align-self-center">
        <h1 class="text-primary"><b>Products</b><br /></h1>
        <h2 class="text-secondary"><small>Database Tool</small></h2>
        <p class="text-secondary-emphasis">By: Zach Krol</p>
      </div>
    </div>
  </div>
  <footer class="container-fluid p-0 mt-auto text-center">
    <div class="p-2 text-bg-dark">&copy; Zach Krol 2023</div>
  </footer>
</body>


<!-- <body>
  <h1>Trader Snax Product Card Demo</h1>
  <div class="flip-card">
    <div class="flip-card-inner">
      <div class="flip-card-front">
        <p>&starf;&starf;&starf;&starf;&star; (23)</p>
        <img src="elote-dippers.png" alt="elote dippers" style="height: 250px" />
        <h3>Organic Elote Corn Dippers</h3>
      </div>
      <div class="flip-card-back">
        <p>&starf;&starf;&starf;&starf;&star; (23)</p>
        <p style="padding: 20px; padding-bottom: 60px">
          Elotes typically come slathered in mayo or a crema-based sauce,
          rolled in grated cotija or añejo cheese, dusted with chili powder,
          and squirted with lime juice. As anyone who grew up visiting the
          neighborhood elotero (or making elotes at home) can tell you, it’s a
          highly craveable combination of flavors that’s sure to leave an
          impression.
        </p>
        <button style="font-size: 24px">Review</button>
      </div>
    </div>
  </div>
</body> -->

</html>



<!-- php 
      // require_once("./mysql.log.data.php");
      // $conn = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
      // if ($conn->connect_error) {
      //   die("connection failed:" . $conn->connect_error);
      // }

      // $sql = "SELECT id, title, genre, year, link, runtime FROM movies";
      // $result = $conn->query($sql);

      // if ($result->num_rows > 0) {
      //   while ($row = $result->fetch_assoc()) {
      //     echo "<tr>" .
      //       "<td>" . $row["id"] . "</td>" .
      //       "<th>" . $row["title"] . "</th>" .
      //       "<td>" . $row["genre"] . "</td>" .
      //       "<td>" . $row["year"] . "</td>" .
      //       "<td>" .
      //       "<a class=\"web\" target=\"_blank\" href=\"" . $row["link"] . "\">Link</a>" .
      //       "</td>" .
      //       "<td>" . $row["runtime"] . "</td>" .
      //       "</tr>";
      //   }
      // }

      // $conn->close();
      end php -->