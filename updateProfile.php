#!/usr/local/bin/php
<?php
// Include config file
$config = parse_ini_file("./dbconfig.ini");

//Database connection
$conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$UID = htmlspecialchars($_POST['UID']);
$username = htmlspecialchars($_POST['username']);
$firstname = htmlspecialchars($_POST['fname']);
$lastname = htmlspecialchars($_POST['lname']);
$about = htmlspecialchars($_POST['about']);
$email = htmlspecialchars($_POST['email']);

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
    $stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, aboutme=?, email=?, profilePicURL=? WHERE userID=?");
    $stmt->bind_param("sssssi", $firstname, $lastname, $about, $email, $profilePicURL, $UID);
    }
else{
    $stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, aboutme=?, email=? WHERE userID=?");
    $stmt->bind_param("ssssi", $firstname, $lastname, $about, $email, $UID);
}


$stmt->execute();
$stmt->close();

//close access to mysql
$conn->close();

header('Location: profile.php');

?>