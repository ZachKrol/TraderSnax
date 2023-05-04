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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');

    .rating input[type="radio"] {
      display: none;
    }

    .rating i {
      cursor: pointer;
    }

    .rating i.active {
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
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (!empty($_GET["snackID"])) {
          $snackName = $_GET['snackID'];
        } else {
          $snackName = "No Snack Selected";
        }
    } 
    if(isset($_REQUEST['submit'])){
      echo "si" . $snackName;
      echo $_REQUEST["snackName"];
      echo $_GET['snackName'];
      echo $_POST['snackName'];
    }
    
    $config = parse_ini_file("dbconfig.ini");

    //Database connection
    $link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
    // Check connection
    if ($link->connect_error) {
      die("Connection failed: " . $link->connect_error);
    }
    $sql = "SELECT pictureURL FROM snacks WHERE snackID = '$snackName'";
    $result = $link->query($sql);

    if ($result->num_rows < 1) {
      header("location: profile.php");
    }
    $row = $result->fetch_assoc();
    $pictureURL = $row["pictureURL"];
    $pictureName = $row["name"];
    $fullURL = "images/" . $pictureURL;
    if (isset($_REQUEST['submit'])) {
      $rating = $_REQUEST["rating"];
      $text = $_REQUEST["textBox"];
      
      if (isset($_REQUEST['rating']) == null) {
        $rating = 1;
      }
      $sql = "INSERT INTO reviews (username, snackID, rating, reviewText, pictureURL, likes)
            VALUES (?, ?, ?, ?, ?, ?)";
      if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param(
          $stmt,
          "ssssss",
          $param_username,
          $param_snackName,
          $param_rating,
          $param_text,
          $param_pictureURL,
          $param_likes
        );

        $param_username = $username;
        $param_snackName = $snackName;
        $param_rating = $rating;
        $param_text = $text;
        $param_pictureURL = $pictureURL;
        $param_likes = 0;
        if (mysqli_stmt_execute($stmt)) {
          echo "Review posted successfully";
          header("location: profile.php");
        }
      }
    }
  } else {
    header("location: index.php");
  }
  ?>
  <div class="container py-4 d-flex justify-content-center align-items-center" style="height: 100% !important;" id="product-section">
    <div class="row">
      <div class="col-md-6 my-5 my-md-0 max-height-md-500 max-height-sm-200">
        <div class="d-flex align-items-center justify-content-center h-100 overflow-auto">
          <img style="max-height: 100%; max-width: 100%; height: auto;" src="<?php echo $fullURL; ?>" alt="<?php echo $pictureName; ?>" />
        </div>
      </div>
      <div class="col-md-6">
        <form action="" method="get" class="was-validated w-75 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white">
        <input type='hidden' name='snackID' value='<?php echo "$snackName";?>'/> 
          <h3 class="text-uppercase text-center"><b> Review </b></h3>
          <h3 class="text-uppercase text-center" style="font-family: 'Trader Joes', sans-serif;">
            <b><?php echo $snackName; ?> </b>
          </h3>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Leave a rating</label>
            <div class="rating">
              <input type="radio" id="star1" name="rating" value="1" class="form-check-input" />
              <label for="star1" title="1 star">
                <i class="bi bi-star"></i>
              </label>
              <input type="radio" id="star2" name="rating" value="2" class="form-check-input" />
              <label for="star2" title="2 stars">
                <i class="bi bi-star"></i>
              </label>
              <input type="radio" id="star3" name="rating" value="3" class="form-check-input" />
              <label for="star3" title="3 stars">
                <i class="bi bi-star"></i>
              </label>
              <input type="radio" id="star4" name="rating" value="4" class="form-check-input" />
              <label for="star4" title="4 stars">
                <i class="bi bi-star"></i>
              </label>
              <input type="radio" id="star5" name="rating" value="5" class="form-check-input" />
              <label for="star5" title="5 stars">
                <i class="bi bi-star"></i>
              </label>
            </div>
            <script>
              const stars = document.querySelectorAll(".rating i");
              var rating = 0;
              stars.forEach((star, index1) => {

                star.addEventListener("click", () => {
                  rating = index1;
                  $("#star" + (rating + 1)).prop("checked", true);
                  stars.forEach((star, index2) => {

                    if (index1 >= index2) {
                      star.classList.add("bi-star-fill");
                      star.classList.remove("bi-star");
                      star.classList.add("active");
                    } else {
                      star.classList.add("bi-star");
                      star.classList.remove("bi-star-fill");
                      star.classList.remove("active");
                    }
                    //index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
                  });
                });
              });

              /*
                $(document).ready(function() {
                // Get the rating value
                var rating = $('input[name=rating]:checked').val();
                
                
                // Set the corresponding radio input to checked
                $("#star" + rating).prop("checked", true);

                // Fill the stars on click
                $(".rating label").on("click", function() {
                    rating = $(this).prevAll("input[name=rating]").val();
                    console.log(rating);
                    $(this).find("i").toggleClass("bi-star bi-star-fill");
                    $(this).prevAll("label").find("i").removeClass("bi-star").addClass("bi-star-fill");
                    $(this).nextAll("label").find("i").removeClass("bi-star-fill").addClass("bi-star");
                });
                });*/
            </script>
            <label for="reviewText" class="form-label">Write a review</label>
            <textarea class="form-control is-valid" id="reviewTextbox" name="textBox" rows="4" placeholder="Required written review" required></textarea>

            <div class="invalid-feedback">Must leave a written review.</div>
          </div>
          <div class="text-center w-75 d-grid mx-auto">
            <button id="submit" type="submit" name="submit" class="btn btn-outline-info btn-lg">Submit</button>
          </div>
          <br>
        </form>
      </div>
    </div><!-- end row -->
  </div><!-- end container -->
  <?php
  include 'footer.php';
  ?>
</body>

</html