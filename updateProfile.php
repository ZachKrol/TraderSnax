#!/usr/local/bin/php
<?php
	// Include config file
	$config = parse_ini_file("../../database/dbconfig.ini");

	//Database connection
	$conn = new mysqli($config["servername"], $config["username"], $config["password"], $config["dbname"]);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$UID = htmlspecialchars($_POST['userid']);
	$firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
	$about = htmlspecialchars($_POST['about']);
    $email = htmlspecialchars($_POST['email']);
    $pfp = htmlspecialchars($_POST['pfp']);


	$stmt = $conn->prepare("UPDATE users SET fname=?, lname=?, aboutme=?, email=?, profilePicURL=? WHERE userID=?");
    $stmt->bind_param("sssssi", $firstname, $lastname, $about, $email, $pfp, $UID);
    $stmt->execute();
	$stmt->close();
	
	//close access to mysql
	$conn->close();

	header('Location: profile.php');

?>