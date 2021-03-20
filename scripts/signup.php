<?php

session_start();

$firstnameErr = $lastnameErr = $bdayErr = $genderErr = $dispositionErr = $categoryErr = "";
$firstname = $lastname = $bday = $gender  =  $disposition = $category = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $firstnameErr = "First Name is a required field!";
  } else {
    $firstname = test_input($_POST["firstname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white spaces are allowed!"; 
    }
    else {
      $_SESSION["firstname"]=$firstname;
    }
  }

  if (empty($_POST["lastname"])) {
    $lastnameErr = "Last Name is a required field!";
  } else {
    $lastname = test_input($_POST["lastname"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white spaces are allowed!"; 
    }
    else {
      $_SESSION["lastname"]=$lastname;
    }
  }

  if (empty($_POST["bday"])) {
    $bdayErr = "Birth Date is a required field!";
  } else {
    $bday = $_POST["bday"];
    $_SESSION["bday"]=$bday;
  }

  if (empty($_POST["gender"])) {
    $genderErr = "";
  } else {
    $gender = test_input($_POST["gender"]);
    $_SESSION["gender"]=$gender;
  }

  if (empty($_POST["disposition"])) {
    $dispositionErr = "";
  } else {
    $disposition = test_input($_POST["disposition"]);
    $_SESSION["disposition"]=$disposition;
  }

  if (empty($_POST["category"])) {
    $categoryErr = "";
  } else {
    $category = test_input($_POST["category"]);
    $_SESSION["category"]=$category;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "RecordEx1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Users (firstname, lastname, bday, disposition, category, access) VALUES ($firstname, $lastname, $bday, $disposition, $category, 'Client')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

$conn->close();
?>
