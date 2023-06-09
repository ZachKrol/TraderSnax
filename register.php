#!/usr/local/bin/php
<?php
// Include config file
$config = parse_ini_file("dbconfig.ini");

//Database connection
$link = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = $emailaddr = $first_name = $last_name = "";
$username_err = $password_err = $confirm_password_err = $emailaddr_err = $first_name_err = $last_name_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT userID FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(htmlspecialchars($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    //validate email address
    if (empty(htmlspecialchars($_POST["emailaddr"]))) {
        $emailaddr_err = "Please enter an email address.";
    } else if (!filter_var(htmlspecialchars($_POST["emailaddr"]), FILTER_VALIDATE_EMAIL)) {
        $emailaddr_err = "Please enter a valid email address.";
    } else {
        $emailaddr = htmlspecialchars($_POST["emailaddr"]);
    }

    //validate first name
    if (empty(htmlspecialchars($_POST["fname"]))) {
        $first_name_err = "Please enter your first name.";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", htmlspecialchars($_POST["fname"]))) {
        $first_name_err = "Please enter a valid first name that only contains letters.";
    } else {
        $first_name = htmlspecialchars($_POST["fname"]);
    }

    //validate last name
    if (empty(trim($_POST["lname"]))) {
        $last_name_err = "Please enter your last name.";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", trim($_POST["lname"]))) {
        $last_name_err = "Please enter a valid last name that only contains letters.";
    } else {
        $last_name = trim($_POST["lname"]);
    }

    //Profile Picture
    //saving profile picture url
    $profilePicURL = "";


    if (file_exists($_FILES['ProfilePicture']['tmp_name']) && is_uploaded_file($_FILES['ProfilePicture']['tmp_name'])) {
        $target_dir = "profilePictures/";
        $target_file = $target_dir . basename($_FILES["ProfilePicture"]["name"]);
        $filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;
        $check = getimagesize($_FILES["ProfilePicture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["ProfilePicture"]["tmp_name"], $target_dir . $username .  '.' . $filetype)) {
                echo "The file " . htmlspecialchars(basename($_FILES["ProfilePicture"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $profilePicURL = $username .  '.' . $filetype;
    } else {
        // user hasn't uploaded anything set to default profile picture
        $profilePicURL = "default.png";
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($first_name_err) && empty($last_name_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email, fname, lname, profilePicUrl) VALUES (?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_email, $param_fname, $param_lname, $profilePicURL);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $emailaddr;
            $param_fname = $first_name;
            $param_lname = $last_name;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: index.php");
            } else {
                echo "Oops! Something went wrong. Please try again later.";
                die;
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

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
    <style>
        @import url('https://fonts.cdnfonts.com/css/trader-joes');
    </style>
</head>

<body class="d-flex flex-column h-100">

    <?php
    include 'newNavbarLogin.php';
    ?>

    <h1 class="text-center display-1"><b style="font-family: 'Trader Joes', sans-serif;"> Trader Snax</b></h1>
    <h3 class=" display-6 text-center">Try snacks you've eaten.</h3>
    <h3 class="display-6 text-center">Save those you want to try.</h3>
    <h3 class="display-6 text-center">Tell your friends what's good.</h3>
    <br>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="w-75 container-sm border border-dark border-2 rounded shadow p-4 mb-4 bg-white" enctype="multipart/form-data">
        <h3 class="text-uppercase text-center"><b> Register for Trader Snax </b></h3>
        <div class="mb-3 mt-3">
            <label for="fname" class="form-label">First Name:</label>
            <input type="text" class="form-control  <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" id="fname" placeholder="Enter first name" name="fname" value="<?php echo $first_name; ?>">
            <div class="invalid-feedback"><?php echo $first_name_err; ?></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="lname" class="form-label">Last Name:</label>
            <input type="text" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" id="lname" placeholder="Enter last name" name="lname" value="<?php echo $last_name; ?>">
            <div class="invalid-feedback"><?php echo $last_name_err; ?></div>
        </div>

        <div class="mb-3 mt-3">
            <label for="uname" class="form-label">Email Address:</label>
            <input type="text" class="form-control <?php echo (!empty($emailaddr_err)) ? 'is-invalid' : ''; ?>" id="emailaddr" placeholder="Enter email address" name="emailaddr" value="<?php echo $emailaddr; ?>">
            <div class="invalid-feedback"><?php echo $emailaddr_err; ?></div>
        </div>
        <div class="mb-3 mt-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" id="username" placeholder="Enter username" name="username" value="<?php echo $username; ?>">
            <div class="invalid-feedback"><?php echo $username_err; ?></div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" id="password" placeholder="Enter password" name="password" value="<?php echo $password; ?>">
            <div class="invalid-feedback"><?php echo $password_err; ?></div>
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Re-enter Password:</label>
            <input type="password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" id="confirm_password" placeholder="Enter password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            <div class="invalid-feedback"><?php echo $confirm_password_err; ?></div>
        </div>
        <div class="mb-3">
            <label for="ProfilePicture" class="form-label">Upload Profile Picture:</label>
            <br>
            <input type="file" name="ProfilePicture" accept="image/*" id="ProfilePicture" value="" />
        </div>
        <div class="text-center w-75 d-grid mx-auto">
            <button id="submit" type="submit" class="btn btn-outline-info btn-lg">Sign Up </button>
            <br>
            <button type="button" class="btn btn-outline-info btn-lg"><a class="nav-link" href="index.php">Already Have an Account? Log In</a></button>
        </div>
        <br>
    </form>
    <?php
    include 'footer.php';
    ?>
</body>

</html>