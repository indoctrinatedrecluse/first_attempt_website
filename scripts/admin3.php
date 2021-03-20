<?php

session_start();

$firstnameErr = $lastnameErr = "";
$firstname = $lastname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First Name is a required field!";
  } else {
    $firstname = test_input($_POST["firstname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is a required field!";
  } else {
    $lastname = test_input($_POST["lastname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white spaces are allowed!"; 
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername = "localhost";
$username = "Admin";
$password = "master";
$dbname = "RecordEx1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "DELETE FROM Users * WHERE firstname=$firstname, lastname=$lastname";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

$conn->close();
?>
