#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TraderSnax</title>
  <link rel="icon" type="image/png" href="./images/TS_LOGO.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="./main.js"></script>
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');

    @media (max-width: 767.98px) {
      .max-height-sm-200 {
        max-height: 200px;
      }
    }

    @media (min-width: 768px) {
      .max-height-md-500 {
        max-height: 500px;
      }
    }
  </style>
</head>

<body class="d-flex flex-column h-100">
  <?php
  session_start();
  include 'newNavbar.php';
  $snackName = "";
  $pictureURL = "";
  if ($_SESSION["loggedin"]) {
    $username = $_SESSION["username"];
    if ($snackName = $_GET['snackID']) {
      $snackName = $_GET['snackID'];
    } else {
      $snackName = "No Snack Selected";
    }
    $config = parse_ini_file("dbconfig.ini");

    //Database connection
    $link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    // Check connection
    if ($link->connect_error) {
      die("Connection failed: " . $link->connect_error);
    }


    $sql = "SELECT ID, snackID, pictureURL, name, description, rating, type FROM snacks WHERE snackID = '$snackName'";
    $result = $link->query($sql);

    if ($result->num_rows < 1) {
      echo "Error: Failed to load a snack";
      $snackName = "Failed to load a snack";
    }

    // get snack info
    $row = $result->fetch_assoc();
    $snackID = $row["snackID"];
    $pictureURL = $row["pictureURL"];
    $name = $row["name"];
    $description = $row["description"];
    $rating = $row["rating"];
    $type = $row["type"];
    $fullURL = "images/" . $pictureURL;

    // get number of reviews for snack
    $sql2 = $link->prepare("
    SELECT snacks.snackID, 
    COUNT(CASE WHEN reviews.snackID IS NOT NULL THEN 1 END) AS numReviews
    FROM snacks
    LEFT JOIN reviews ON snacks.snackID = reviews.snackID
    WHERE snacks.snackID = ?
    GROUP BY snacks.snackID
  ");

    $sql2->bind_param("s", $snackID);
    $sql2->execute();
    $result2 = $sql2->get_result();
    $row2 = $result2->fetch_assoc();
    $numReviews = $row2["numReviews"];
  } else {
    header("location: index.php");
  }
  ?>
  <div class="alert alert-info">
    <div class="d-none d-xl-block font-weight-bold">X-LARGE (XL)</div>
    <div class="d-none d-lg-block d-xl-none font-weight-bold">LARGE (LG)</div>
    <div class="d-none d-md-block d-lg-none font-weight-bold">MEDIUM (M)</div>
    <div class="d-none d-sm-block d-md-none font-weight-bold">SMALL (SM)</div>
    <div class="d-block d-sm-none alert font-weight-bold">
      X-SMALL (Default)
    </div>
  </div>
  <div class="container py-3">
    <div class="row m-3">
      <div class="col-12 text-center align-self-center">
        <h2 class="mb-2 text-primary display-1" style="font-family: 'Trader Joes', sans-serif;"><b><?php echo $name; ?></b></h2>
        <h3 class="mb-2 text-secondary h3"><?php echo $type; ?></h3>
        <h5 class="mb-5 text-dark h5">Rating: <b><?php echo $rating . " (" . $numReviews . ")"; ?></b></h5>
      </div>
    </div>
    <div class="row m-3">
      <div class="col-md-6 mb-5 mb-md-0 max-height-md-500 max-height-sm-200">
        <div class="d-flex align-items-center justify-content-center h-100 overflow-auto">
          <img style="max-height: 100%; max-width: 100%; height: auto;" src="<?php echo $fullURL; ?>" alt="<?php echo $pictureName; ?>" />
        </div>
      </div>
      <div class="col-md-6 d-flex align-items-center justify-content-center">
        <div class="w-85 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white">
          <h4 class="mb-2 text-primary h4"><b style="font-family: 'Trader Joes', sans-serif;">Description:</b></h4>
          <p><?php echo $description; ?></p>
          <div class="text-center w-75 d-grid mx-auto">
            <button type="button" class="btn btn-outline-info btn-lg product-review-btn" data-snack-id="<?php echo $row["snackID"]; ?>">Write a Review</button>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end container -->
  <?php
  include 'footer.php';
  ?>
</body>

</html