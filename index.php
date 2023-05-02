#!/usr/local/bin/php
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: products.php"); //products page
  exit;
}

// Include config file
$config = parse_ini_file("dbconfig.ini");

//Database connection
$link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
// Check connection
if ($link->connect_error) {
  die("Connection failed: " . $link->connect_error);
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

if (array_key_exists("error", $_GET)) {
  $login_err = "Please login first.";
}

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Check if username is empty
  if (empty(trim($_POST["username"]))) {
    $username_err = "Please enter username.";
  } else {
    $username = trim($_POST["username"]);
  }

  // Check if password is empty
  if (empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password.";
  } else {
    $password = trim($_POST["password"]);
  }

  // Validate credentials
  if (empty($username_err) && empty($password_err)) {
    // Prepare a select statement
    $sql = "SELECT userID, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
      $param_username = $username;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
        if (mysqli_stmt_num_rows($stmt) == 1) {
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
          if (mysqli_stmt_fetch($stmt)) {
            if (!password_verify($password, $hashed_password)) {
              // Password is correct, so start a new session
              session_start();
              // Store data in session variables
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;

              // Redirect user to welcome page
              header("location: products.php"); //change to products page 
            } else {
              // Password is not valid, display a generic error message
              $login_err = "Invalid username or password.";
            }
          }
        } else {
          // Username doesn't exist, display a generic error message
          $login_err = "Invalid username or password.";
        }
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Close connection
  mysqli_close($link);
}
?>

<html lang="en" class="h-100">

<head>
  <title> Trader Snax </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="./images/TS_LOGO.png" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

</head>

<body class="d-flex flex-column h-100">
  <?php
  include 'newNavbarLogin.php';
  ?>

  <h1 class="text-center display-1"><b>Trader Snax</b></h1>
  <h3 class="display-6 text-center">Try snacks you've eaten.</h3>
  <h3 class="display-6 text-center">Save those you want to try.</h3>
  <h3 class="display-6 text-center">Tell your friends what's good.</h3>
  <br>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-75 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white">
    <h3 class="text-uppercase text-center"><b> Log In to Trader Snax </b></h3>
    <?php
    if (!empty($login_err)) {
      echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button>' . $login_err . '</div>';
    }
    ?>
    <div class="mb-3 mt-3">
      <label for="username" class="form-label">Username:</label>
      <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="username" placeholder="Enter username" name="username" value="<?php echo $username; ?>">
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback"><?php echo $username_err; ?></div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password:</label>
      <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" placeholder="Enter password" name="password" value="<?php echo $password; ?>">
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback"><?php echo $password_err; ?></div>
    </div>
    <!-- <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="myCheck" name="remember">
      <label class="form-check-label" for="myCheck">Remember Me.</label>
    </div> -->
    <div class="text-center w-75 d-grid mx-auto">
      <button type="submit" class="btn btn-outline-info btn-lg">Log In</button>
      <br>
      <button type="button" class="btn btn-outline-info btn-lg"><a class="nav-link" href="register.php">Register</a></button>
    </div>
    <br>
  </form>
  <?php
  include 'footer.php';
  ?>
</body>

</html>