#!/usr/local/bin/php
<?php
session_start();
// Include config file
if (isset($_POST['submit'])) {
  $_SESSION["loggedin"] = false;
  $_SESSION["id"] = NULL;
  $_SESSION["username"] = NULL;
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TraderSnax</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" type="image/png" href="./images/TS_LOGO.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="./main.js"></script>
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');
  </style>
</head>

<body class="d-flex flex-column h-100">
  <?php
  include 'newNavbar.php';
  ?>
  <div class="container py-3">
    <div class="row m-3">
      <div class="col-12 text-center align-self-center">
        <h2 class="mb-5 text-primary display-1" style="font-family: 'Trader Joes', sans-serif;"><b>Products</b></h2>
      </div>
    </div>
    <div class="row">
      <?php
      session_start();
      if ($_SESSION["loggedin"]) {
        // Include config file
        $config = parse_ini_file("dbconfig.ini");

        //Database connection
        $link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
        $link2 = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
        // Check connection
        if ($link->connect_error) {
          die("Connection failed: " . $link->connect_error);
        }

        $sql = "SELECT ID, snackID, pictureURL, name, description, rating, type FROM snacks";
        $result = $link->query($sql);

        //$numReviews = $row2["numReviews"];
        //$snackID = $row["snackID"];
        //$rating = $row["rating"];
        //$pictureURL = $row["pictureURL"];
        //$snackName = $row["name"];
        //$type = $row["type"];
        //$desc = $row["description"];


        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $sql2 = $link2->prepare("
            SELECT snacks.snackID, 
            COUNT(CASE WHEN reviews.snackID IS NOT NULL THEN 1 END) AS numReviews
            FROM snacks
            LEFT JOIN reviews ON snacks.snackID = reviews.snackID
            WHERE snacks.snackID = ?
            GROUP BY snacks.snackID
          ");

            $sql2->bind_param("s", $row["snackID"]);
            $sql2->execute();
            $result2 = $sql2->get_result();
            $row2 = $result2->fetch_assoc();
            $numReviews = $row2["numReviews"];
            $rating =  $row["rating"];

            if ($numReviews > 0) {
              $rating =  $rating / $numReviews;
            }
            $rating = round($rating, 1);
            echo '
            <div class="flip-card col-xl-3 col-lg-4 col-md-6 p-4">
              <div class="flip-card-inner">
                <div class="flip-card-front rounded-4">
                  <p class="h5 mt-3" style="color: #146c43"><span class="small">Rating: </span>' . $rating . '</p>
                  <div class="d-flex align-items-center justify-content-center" style="height: 250px; width: 100%">
                    <img class="m-2" src="./images/' . $row["pictureURL"] . '" alt="' . $row["name"] . '" style="max-height: 90%; max-width: 90%;" />
                  </div>
                  <p class="h3 mx-2 pt-5 pt-md-2">' . $row["name"] . '</p>
                  <p class="h6 text-secondary mx-2 pt-3 pt-md-0">' . $row["type"] . '</p>
                </div>
                <div class="flip-card-back rounded-4">
                  <p class="h5 mt-3" style="color: #a6e9d5"><span class="small">Rating: </span>' . $rating . '</p>
                  <p class="lg-small px-1 m-2 overflow-auto" style="height:210px">' . $row["description"] . '</p>
                  <div class="py-2">
                    <button type="button" class="btn btn-light mx-2 snack-page-btn" data-snack-id="' . $row["snackID"] . '" style="min-width: 90px">More Info</button>
                    <button type="button" class="btn btn-light mx-2 product-review-btn" data-snack-id="' . $row["snackID"] . '" style="min-width: 90px">Review</button>
                  </div>
                  <p class="h4 mx-2 pt-3 pt-md-0">' . $row["name"] . '</p>
                  <p class="h6 text-dark mx-2 pt-3 pt-md-0">' . $row["type"] . '</p>
                </div>
              </div>
            </div>
          ';
          }
        }
        $link->close();
      } else {
        header("location: index.php");
      }
      ?>


    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>

</html>
