<?php

session_start();

$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is a required field!";
  } else {
    $username = test_input($_POST["username"]);
    
    if (!preg_match("/^[a-zA-Z0-9_ ]*$/",$username)) {
      $usernameErr = "Special characters other than underscore and white spaces are not allowed!"; 
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is a mandatory field!";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9_ ]*$/",$password)) {
      $passwordErr = "Special characters other than underscore and white spaces are not allowed!"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$username="Admin";
$password="master";
$servername="localhost:3306";
$dbname="RecordEx1";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!empty($conn)) {
    mysqli_select_db($conn, $database);
}
else {
    die("Connection failed: " . $conn->connect_error);
}

if ($username == "Admin" AND $password == "master")
{
    $_SESSION["username"] = "Admin";
    $_SESSION["password"] = "master";
    header ("Location : ../admin.php");
}

else {
$sql="EXISTS(SELECT * FROM Users WHERE username=$username AND password=$password)";

if ($conn->query($sql) === TRUE) {
    echo "Login successful";
    $_SESSION["username"] = "username";
    $_SESSION["password"] = "password";
    header ("Location : ../query.php");
} else {
    echo "Login failed : Please Sign Up first!" . $conn->error;
}
}

$conn->close();
?>
