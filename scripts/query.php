<?php

require('http://localhost/scripts/fpdf/mc_table.php');
require('http://localhost/scripts/fpdf/rotation.php');

class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	$this->SetFont('Arial','B',50);
	$this->SetTextColor(255,192,203);
	$this->RotatedText(35,190,'R e c o r d E x',45);
}

function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

session_start();

$username = $_SESSION["username"];
$password = $_SESSION["password"];

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
    else {
            $_SESSION["firstname"] = $firstname;
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
            $_SESSION["lastname"] = $lastname;
    }
  }

  if (empty($_POST["pdate"])) {
    $pdate = null;
  } else {
    $pdate = $_POST["pdate"];
    $_SESSION["pdate"] = $pdate;
  }

  if (empty($_POST["journal"])) {
    $journal = null;
  } else {
    $journal = test_input($_POST["journal"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$journal)) {
      $journalErr = "Only letters and white spaces are allowed!";
    }
    else {
      $_SESSION["journal"] = $journal;
    }
  }

  if (empty($_POST["genre"])) {
    $genre = null;
  } else {
    $genre = test_input($_POST["genre"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$genre)) {
      $genreErr = "Only letters and white spaces are allowed!"; 
    }
    else {
      $_SESSION["genre"] = $genre;
    }
  }

  if (empty($_POST["title"])) {
    $title = null;
  } else {
    $title = test_input($_POST["title"]);
    
    if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
      $titleErr = "Only letters and white spaces are allowed!"; 
    }
    else {
      $_SESSION["title"] = $title;
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
$dbname = "RecordEx";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (pdate!=null AND journal!=null AND genre!=null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND journal=$journal AND genre=$genre AND title=$title"; }
else if (pdate==null AND journal!=null AND genre!=null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND journal=$journal AND genre=$genre AND title=$title"; }
else if (pdate!=null AND journal==null AND genre!=null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND genre=$genre AND title=$title"; }
else if (pdate!=null AND journal!=null AND genre==null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND journal=$journal AND title=$title"; }
else if (pdate!=null AND journal!=null AND genre!=null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND journal=$journal AND genre=$genre"; }
else if (pdate==null AND journal==null AND genre!=null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND genre=$genre AND title=$title"; }
else if (pdate==null AND journal!=null AND genre==null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND journal=$journal AND title=$title"; }
else if (pdate==null AND journal!=null AND genre!=null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND journal=$journal AND genre=$genre"; }
else if (pdate!=null AND journal==null AND genre==null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND title=$title"; }
else if (pdate!=null AND journal==null AND genre!=null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND genre=$genre"; }
else if (pdate!=null AND journal!=null AND genre==null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate AND journal=$journal"; }
else if (pdate==null AND journal==null AND genre==null AND title!=null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND title=$title"; }
else if (pdate==null AND journal==null AND genre!=null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND genre=$genre"; }
else if (pdate==null AND journal!=null AND genre==null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND journal=$journal"; }
else if (pdate!=null AND journal==null AND genre==null AND title==null) {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname AND pdate=$pdate"; }
else {
	$sql = "SELECT * FROM Articles WHERE firstname=$firstname AND lastname=$lastname"; }

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        //echo nl2br("First name : " . $row["firstname"]. "\nLast name : " . $row["lastname"]. "\nPublication Date : " . $row["pdate"]. "\nJournal : ". $row["journal"]. "\nGenre : ". $row["genre"]. "\nTitle : ". $row["title"]. "<br>");
        //Add the watermark
        $pdfx=new PDF();
        $pdfx->AddPage();
        $pdfx->SetFont('Arial','',35);
        $txt="The query results are generated in this PDF : ";
        $pdfx->MultiCell(0,5,$txt,0,'J');
        //Now add the query results using MultiCell
        $pdf=new PDF_MC_Table();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',14);
        $pdf->SetWidths(array(70,70));
        $pdf->Row(array("First name : ",$row["firstname"]));
        $pdf->Row(array("Last name : ",$row["lastname"]));
        $pdf->Row(array("Publication date : ",$row["pdate"]));
        $pdf->Row(array("Journal : ",$row["journal"]));
        $pdf->Row(array("Genre : ",$row["genre"]));
        $pdf->Row(array("Title : ",$row["title"]));
        $pdf->Output();
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($title);
        $x = "images/dlink1.jpg";
        $y = "Download link";
        if (file_exists($target_file)) {
          echo "<p> Click on the image to download the article :<p>";
          echo "<a href=$target_file download>
                  <img src=$x alt=$y>
                </a>";
        }
    }
} else {
    echo "No results";
}

$conn->close();
?>
