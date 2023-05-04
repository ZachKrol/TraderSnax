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
if ($_SESSION["loggedin"]) {
  include 'newNavbar.php';
  $config = parse_ini_file("dbconfig.ini");

  //Database connection
  $link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
  if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
  }

  $username = $_SESSION["username"];
  $sql = "SELECT userID, fname, lname, email, aboutme, email, following, followers, reviews, profilePicUrl FROM users WHERE username = '$username'";

  $result = $link->query($sql);
  $row = $result->fetch_assoc();
  $fullName = $row["fname"] . " " . $row["lname"];
  $fname = $row["fname"];
  $lname = $row["lname"];
  $aboutme = $row["aboutme"];
  $reviews = $row["reviews"];
  $following = $row["following"];
  $followers = $row["followers"];
  $email = $row["email"];
  $uid = $row["userID"];
  $profilePicUrl = $row["profilePicUrl"];


  $sql = "SELECT snackID, pictureURL FROM reviews WHERE username = '$username'";
  $result = $link->query($sql);
} else {
  header("location: index.php");
}


?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <title> Trader Snax </title>
  <style>
    @import url('https://fonts.cdnfonts.com/css/trader-joes');
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>  
  <script>
    function editProfile(uid, firstname, lastname, about, email, pfp){
      document.getElementById("UID").value = uid;
      document.getElementById("fname").value = firstname;
      document.getElementById("lname").value = lastname;
      document.getElementById("about").value = about;
      document.getElementById("email").value = email;
      document.getElementById("pfp").value = pfp;
    };
  </script>  
</head>

<body class="d-flex flex-column h-100">

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Edit Snack</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
        <form class="was-validated border-dark" novalidate action='updateProfile.php' method='post'>
          <br>
          <div style='display:none;'><input type='radio' name='UID' id='UID' value="" checked></div>
	    <label for="ProfilePicture" class="form-label">Edit Profile Picture:</label>
        <br>
        <input type="file" name="ProfilePicture" accept="image/*" id="ProfilePicture" value="" />

          <div class="form-floating w-75 mx-auto">
              <input type="text" class="form-control" id="fname" name="fname" value="" placeholder="Enter First Name" required>
              <label for="sname" class="form-label"> First Name </label>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please enter first name.</div>
          </div>
          <br>
	    <div class="form-floating w-75 mx-auto">
              <input type="text" class="form-control" id="lname" name="lname" value="" placeholder="Enter Last Name" required>
              <label for="sname" class="form-label"> Last Name </label>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please enter the snack name.</div>
          </div>
          <br>
	   <div class="form-floating w-75 mx-auto">
              <input type="text" class="form-control" id="email" name="email" value="" placeholder="Enter Email Address" required>
              <label for="sname" class="form-label"> Email Address </label>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please enter your email address.</div>
          </div>
          <br>
          <div class="form-floating w-75 mx-auto form-group">
              <textarea class="form-control" id="about" name="about" placeholder="About me" value="" required></textarea>
              <label for="sdesc" class="form-label"> About Me </label>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please enter the short description about yourself.</div>
          </div>
          <br>
      </div>
      <div class="modal-footer">
            <button type="reset" class="btn btn-outline-info mx-auto w-50">Reset</button>
            <button type="submit" class="btn btn-outline-info mx-auto w-50" id="submitBtn" data-bs-dismiss="modal">Confirm Changes</button>
          </div>

          <br>
      </form>
    </div>
  </div>
</div>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <section class="h-100 gradient-custom-2">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-9 col-xl-7">
            <div class="card">
              <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <div style="width:150px;height:150px;">
                    <img src=<?php echo $profilePicUrl;?> style="width:150px;height:150px;object-fit:cover;z-index:100" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2">
                    </div>
                  <button onClick='editProfile(<?php echo $uid, $fname, $lname, $about, $email; ?>)' type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark" data-bs-toggle='modal' data-bs-target='#editModal' style="z-index: 1;">
                    Edit profile
                  </button>
                  <input name="submit" type="submit" class="btn btn-outline-dark" data-mdb-ripple-color="dark" style="z-index: 1;" value="Log out">
                  </input>
                </div>
                <div class="ms-3" style="margin-top: 130px;">
                  <h5><?php echo $fullName; ?></h5>
                </div>
              </div>
              <div class="p-4 text-black" style="background-color: #f8f9fa;">
                <div class="d-flex justify-content-end text-center py-1">
                  <div>
                    <p class="mb-1 h5"><?php echo $reviews; ?></p>
                    <p class="small text-muted mb-0">Reviews</p>
                  </div>
                  <div class="px-3">
                    <p class="mb-1 h5"><?php echo $followers; ?></p>
                    <p class="small text-muted mb-0">Followers</p>
                  </div>
                  <div>
                    <p class="mb-1 h5"><?php echo $following; ?></p>
                    <p class="small text-muted mb-0">Following</p>
                  </div>
                </div>
              </div>
              <div class="card-body p-4 text-black">
                <div class="mb-5">
                  <p class="lead fw-normal mb-1">About</p>
                  <div class="p-4" style="background-color: #f8f9fa;">
                    <p class="font-italic mb-1"><?php echo $aboutme; ?></p>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <p class="lead fw-normal mb-0">Recent reviews</p>
                  <p class="mb-0"><a href="#!" class="text-muted">Show all</a></p>
                </div>
                <?php
                $index = 0;

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $snackID = $row["snackID"];
                    $pictureURL = $row["pictureURL"];
                    $item = "";
                    if ($index % 2 == 0) {
                      $item .= '<div class="row g-2">';
                    }
                    //Need to add reviewURL soon
                    $fullURL = "snackPictures/" . $pictureURL;
                    $item .= '<div style="text-align:center;"class="col mb-2">
                    <a style="text-decoration: none; color: inherit;" href="review.php">
                    <img style = "object-fit: cover; max-height: 225px;"src="' .
                      $fullURL .
                      '"alt="image 1" class="img-responsive w-100 rounded-3">
                    <h3 class="lead fw-normal mb-1" style = "font-family: \'Trader Joes\', sans-serif;">' .
                      $snackID .
                      '</h3></a></div>';

                    if ($index % 2 == 1) {
                      $item .= '</div>';
                    }
                    echo $item;
                    $index = $index + 1;
                  }
                } else {
                  echo '<div style="text-align: center;"><h3 class="lead fw-normal mb-1" style
               = "font-family: \'Trader Joes\', sans-serif;">No Reviews Yet</h3></div>';
                }


                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
  <?php
  include 'footer.php';
  ?>
</body>
<!--
<div class="row g-2">
              <div style="text-align:center;"class="col mb-2">
              <a style="text-decoration: none; color: inherit;" href="review.php">
                <img src="<?php echo $fullURL ?>"
                  alt="image 1" class="w-100 rounded-3">
                  <h3 class="lead fw-normal mb-1" style = "font-family: 'Trader Joes', sans-serif;"></h3>
                </a>
              </div>
              
              <div class="col mb-2">
                <img src=""
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>
            <div class="row g-2">
              <div class="col">
                <img src=""
                  alt="image 1" class="w-100 rounded-3">
              </div>
              <div class="col">
                <img src=""
                  alt="image 1" class="w-100 rounded-3">
              </div>
            </div>-->

</html
