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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="./main.js"></script>
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');

    i {
      color: #ff9c1a;
      content: "\f3e5";
    }

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
    if ($numReviews > 0) {
      $rating = $rating / $numReviews;
    }
    $rating = round($rating, 1);
  } else {
    header("location: index.php");
  }
  ?>
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

    <div class="row m-3 pt-3">
      <div class="col-12">
        <h4 class="display-3 text-primary" style="font-family: 'Trader Joes', sans-serif;">Reviews:</h4>
      </div>

      <?php
      $sqlReviews = "SELECT username, rating, reviewText FROM reviews WHERE snackID = '$snackID'";
      $reviewsResult = $link->query($sqlReviews);

      if ($reviewsResult->num_rows > 0) {
        while ($review = $reviewsResult->fetch_assoc()) {
          $stars = '';
          $tempRating = $review["rating"];
          $newRating = round($tempRating);

          $reviewersUsername = $review["username"];
          $sqlGetPic = "SELECT * FROM users WHERE username = '$reviewersUsername'";
          $getPicResult = $link->query($sqlGetPic);
          $reviewersPic = $getPicResult->fetch_assoc();
          $reviewersURL = $reviewersPic["profilePicURL"];

          // star fill
          if ($newRating == 1) {
            $stars = '
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    ';
          } else if ($newRating == 2) {
            $stars = '
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    ';
          } else if ($newRating == 3) {
            $stars = '
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    ';
          } else if ($newRating == 4) {
            $stars = '
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                    ';
          } else if ($newRating == 5) {
            $stars = '
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    ';
          } else {
            $stars = '
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    <i class="bi bi-star"></i>
                    ';
          };

          echo '

          <div class="col-12">
            <div class="w-85 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white">
              <div class="row">
                <div class="col-auto d-flex align-items-center">
                  <img style="width:40px;" class="rounded-pill" src="./profilePictures/' . $reviewersURL . '" alt="profile picture">
                  <p class="my-auto ps-3">' . $reviewersUsername . '</p>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col">' . $stars . '</div>
              </div>
              <div class="row pt-4">
                <div class="col-auto">
                  <p>' . $review["reviewText"] . '</p>
                </div>
              </div>
            </div>
          </div>

        ';
        }
      } else {
        echo '
          <div class="col-12">
            <div class="w-85 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white">
              <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-center">
                  <h4 class="h4 text-dark" style="font-family: \'Trader Joes\', sans-serif;">No Reviews Yet</h4>
                </div>
              </div>
            </div>
          </div>
        ';
      }
      ?>
    </div><!-- end Review row -->
  </div><!-- end container -->
  <?php
  include 'footer.php';
  ?>
</body>

</html>