#!/usr/local/bin/php
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TraderSnax</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/png" href="./images/TS_LOGO.png" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script defer src="./main.js"></script>
</head>

<body class="d-flex flex-column h-100">
  <?php
  include 'navbar.php';
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
        <h2 class="mb-5 text-primary display-1">Products</h2>
      </div>
    </div>
    <div class="row">
      <?php
      require_once("./mysql.log.data.php");
      $conn = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
      if ($conn->connect_error) {
        die("connection failed:" . $conn->connect_error);
      }

      $sql = "SELECT ID, snackID, pictureURL, name, description, rating, type FROM snacks";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '
            <div class="flip-card col-xl-3 col-lg-4 col-md-6 p-4">
              <div class="flip-card-inner">
                <div class="flip-card-front rounded-4">
                  <p class="h5 mt-2">Rating: ' . $row["rating"] . '</p>
                  <img class="m-2" src="./images/' . $row["pictureURL"] . '" alt="' . $row["name"] . '" style="height: 250px" />
                  <p class="h3 mx-2 pt-5 pt-md-2" style="padding-top: 30px">' . $row["name"] . '</p>
                </div>
                <div class="flip-card-back rounded-4">
                  <p class="h5 mt-2">Rating: ' . $row["rating"] . '</p>
                  <p class="lg-small px-3 m-2 overflow-auto" style="height:250px">' . $row["description"] . '</p>
                  <div class="py-2">
                    <button type="button" class="btn btn-light mx-2 snack-page-btn" data-snack-id="' . $row["snackID"] . '" style="min-width: 100px">More Info</button>
                    <button type="button" class="btn btn-light mx-2 product-review-btn" data-snack-id="' . $row["snackID"] . '" style="min-width: 100px">Review</button>
                  </div>
                  <p class="h4 mx-2 pt-3 pt-md-0">' . $row["name"] . '</p>
                </div>
              </div>
            </div>
          ';
        }
      }
      $conn->close();
      ?>
    </div>
  </div>
  <?php
  include 'footer.php';
  ?>
</body>

</html>