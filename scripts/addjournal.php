<?php

session_start();

$firstnameErr = $lastnameErr = $pdateErr = $journalErr = $genreErr = $titleErr = "";
$firstname = $lastname = $pdate = $journal  =  $genre = $title = "";

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

  if (empty($_POST["pdate"])) {
    $pdateErr = "Date of Publication is a required field!";
  } else {
    $pdate = $_POST["pdate"];
  }

  if (empty($_POST["journal"])) {
    $journalErr = "Journal in which the article was published is a mandatory field!";
  } else {
    $journal = test_input($_POST["journal"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$journal)) {
      $journalErr = "Only letters and white spaces are allowed!";
    }
  }

  if (empty($_POST["genre"])) {
    $genreErr = "Genre is a required field!";
  } else {
    $genre = test_input($_POST["genre"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$genre)) {
      $genreErr = "Only letters and white spaces are allowed!"; 
    }
  }

  if (empty($_POST["title"])) {
    $titleErr = "Title of the journal is a mandatory field!";
  } else {
    $title = test_input($_POST["title"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
      $titleErr = "Only letters and white spaces are allowed!"; 
    }
  }

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      if($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }
  }

  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
     $uploadOk = 0;
  }

  if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";

  } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$servername = "localhost:3306";
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$dbname = "RecordEx2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Articles (firstname, lastname, pdate, journal, genre, title, access)
VALUES ($firstname, $lastname, $pdate, $journal, $genre, $title, 'Client')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
