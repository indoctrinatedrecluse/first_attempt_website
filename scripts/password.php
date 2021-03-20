<?php

  session_start();

  $username = $_SESSION["username"];
  $password = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["password"])) {
    $passwordErr = "Password is a required field!";
  } else {
    $password = test_input($_POST["password"]);
    
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

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($username == "Admin" AND $password == "master")
{
    $_SESSION["username"] = "Admin";
    $_SESSION["password"] = "master";
    header ("Location : ../admin.php");
}

else {
$sql = "UPDATE Users SET username=$username, password=$password WHERE firstname=$_SESSION["firstname"] AND lastname=$_SESSION["lastname"] AND bday=$_SESSION["bday"] AND disposition=$_SESSION["disposition"] AND category=$_SESSION["category"]";

if ($conn->query($sql) === TRUE) {
    echo "Sign Up successful!";
    } else {
    echo "Sign Up failed! Could not integrate username." . $conn->error;
}
}

$conn->close();
?>
