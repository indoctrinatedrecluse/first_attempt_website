<?php

session_start();

$firstnameErr = $lastnameErr = $bdayErr = $genderErr = $dispositionErr = $categoryErr = "";
$firstname1 = $lastname1 = $bday1 = $gender1  =  $disposition1 = $category1 = "";
$firstname2 = $lastname2 = $bday2 = $gender2  =  $disposition2 = $category2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname1"])) {
    $firstnameErr = "Old First Name is a required field!";
  } else {
    $firstname1 = test_input($_POST["firstname1"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname1)) {
      $firstnameErr = "Only letters and white spaces are allowed!"; 
    }
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname2"])) {
    $firstnameErr = "New First Name is a required field!";
  } else {
    $firstname2 = test_input($_POST["firstname2"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname2)) {
      $firstnameErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["lastname1"])) {
    $lastnameErr = "Old Last Name is a required field!";
  } else {
    $lastname1 = test_input($_POST["lastname1"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname1)) {
      $lastnameErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["lastname2"])) {
    $lastnameErr = "New Last Name is a required field!";
  } else {
    $lastname2 = test_input($_POST["lastname2"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname2)) {
      $lastnameErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["bday1"])) {
    $bdayErr = "Old Birth Date is a required field!";
  } else {
    $bday1 = $_POST["bday1"];
  }

  if (empty($_POST["bday2"])) {
    $bdayErr = "New Birth Date is a required field!";
  } else {
    $bday = $_POST["bday2"];
  }

  if (empty($_POST["gender1"])) {
    $genderErr = "";
  } else {
    $gender1 = test_input($_POST["gender1"]);
  }

  if (empty($_POST["gender2"])) {
    $genderErr = "";
  } else {
    $gender2 = test_input($_POST["gender2"]);
  }

  if (empty($_POST["disposition1"])) {
    $dispositionErr = "";
  } else {
    $disposition1 = test_input($_POST["disposition1"]);
  }

  if (empty($_POST["disposition2"])) {
    $dispositionErr = "";
  } else {
    $disposition2 = test_input($_POST["disposition2"]);
  }

  if (empty($_POST["category1"])) {
    $categoryErr = "";
  } else {
    $category1 = test_input($_POST["category1"]);
  }

  if (empty($_POST["category2"])) {
    $categoryErr = "";
  } else {
    $category2 = test_input($_POST["category2"]);
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

$sql = "UPDATE Users SET firstname=$firstname2, lastname=$lastname2, bday=$bday2, disposition=$disposition2, category=$category2 WHERE firstname=$firstname1 AND lastname=$lastname2 AND bday=$bday1 AND disposition=$disposition1 AND category=$category1";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

$conn->close();
?>
