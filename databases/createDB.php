<?php
$servername = "localhost:3306";
$username = "Admin";
$password = "master";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE DATABASE IF NOT EXISTS RecordEx1";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "USE RecordEx1";
if ($conn->query($sql) === TRUE) {
    echo "Database switched successfully";
} else {
    echo "Error switching to database: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Users ( 
firstname VARCHAR(30) NOT NULL PRIMARY KEY,
lastname VARCHAR(30) NOT NULL,
bday DATE,
gender VARCHAR(10),
disposition VARCHAR(20),
category VARCHAR(30),
access VARCHAR(10),
username VARCHAR(30),
password VARCHAR(30),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "INSERT INTO Users (firstname, lastname, bday, gender, disposition, category, access, username, password)
VALUES ('Admin', 'Zero', null, null, null, null, 'Admin', 'Admin', 'master')";

if ($conn->query($sql) === TRUE) {
    echo "Administrator account inistialized successfully";
} else {
    echo "Could not intialize administrator : " . $conn->error;
}

$conn->close();

$servername = "localhost";
$username = "Admin";
$password = "master";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "CREATE DATABASE IF NOT EXISTS RecordEx2";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "USE RecordEx2";
if ($conn->query($sql) === TRUE) {
    echo "Database switched successfully";
} else {
    echo "Error switching to database: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Articles (
firstname VARCHAR(30) NOT NULL PRIMARY KEY,
lastname VARCHAR(30) NOT NULL,
pdate DATE,
journal VARCHAR(100),
genre VARCHAR(40),
title VARCHAR(100),
access VARCHAR(10),
reg_date TIMESTAMP
)";

if ($conn->query($sql) == TRUE) {
    echo "Table Articles created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
