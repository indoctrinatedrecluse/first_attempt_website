<?php

session_start();

$firstnameErr = $lastnameErr = $pdateErr = $journalErr = $genreErr = $titleErr = "";
$firstname1 = $lastname1 = $pdate1 = $journal1  =  $genre1 = $title1 = "";
$firstname2 = $lastname2 = $pdate2 = $journal2  =  $genre2 = $title2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname1"])) {
    $firstnameErr = "Old First Name is a required field!";
  } else {
    $firstname1 = test_input($_POST["firstname1"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname1)) {
      $firstnameErr = "Only letters and white spaces are allowed!";
    }
  }

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

  if (empty($_POST["pdate1"])) {
    $pdate1 = null;
  } else {
    $pdate1 = $_POST["pdate1"];
  }

  if (empty($_POST["pdate2"])) {
    $pdate2 = null;
  } else {
    $pdate2 = $_POST["pdate2"];
  }

  if (empty($_POST["journal1"])) {
    $journal1 = null;
  } else {
    $journal1 = test_input($_POST["journal1"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$journal1)) {
      $journalErr = "Only letters and white spaces are allowed!";
    }
  }

  if (empty($_POST["journal2"])) {
    $journal2 = null;
  } else {
    $journal2 = test_input($_POST["journal2"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$journal2)) {
      $journalErr = "Only letters and white spaces are allowed!";
    }
  }

  if (empty($_POST["genre1"])) {
    $genre1 = null;
  } else {
    $genre1 = test_input($_POST["genre1"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$genre1)) {
      $genreErr = "Only letters and white spaces are allowed!"; 
    }
  }

   if (empty($_POST["genre2"])) {
    $genre2 = null;
  } else {
    $genre2 = test_input($_POST["genre2"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$genre2)) {
      $genreErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["title1"])) {
    $title1 = null;
  } else {
    $title1 = test_input($_POST["title1"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$title1)) {
      $titleErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["title2"])) {
    $title2 = null;
  } else {
    $title2 = test_input($_POST["title2"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$title2)) {
      $titleErr = "Only letters and white spaces are allowed!"; 
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
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = "RecordEx2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE Articles SET firstname=$firstname2, lastname=$lastname2, pdate=$pdate2, journal=$journal2, genre=$genre2, title=$title2 WHERE firstname=$firstname1, lastname=$lastname1, pdate=$pdate1, journal=$journal1, genre=$genre1, title=$title1";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
