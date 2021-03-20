<?php
   session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <meta charset="utf-8">
    <title>Home</title>
    <style>
       .error {color: #FF0000;}
    </style>
  </head>
  <body>

<br><br><br><br><br>
   <form method="post" action="scripts/addjournal.php">
   <fieldset>
      <legend style="font-size:40px; color:white;"><b>Add a new journal :</b></legend>
      <fieldset>
        <b style="font-size:20px;">First name:</b><br>
        <input type="text" name="firstname" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
        <b style="font-size:20px;">Last name:</b><br>
        <input type="text" name="lastname" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
      </fieldset>
      <fieldset>
   	<b style="font-size:20px;">Publication Date:</b>
  	<input type="date" name="pdate">
        <span class="error">* <?php echo $pdateErr;?></span>
      </fieldset>
      <fieldset>
	<b style="font-size:20px;">Journal (please provide page number):</b><br>
        <input type="text" name="journal" color="blue">
        <span class="error">* <?php echo $journalErr;?></span><br>
	<b style="font-size:20px;">Genre:</b><br>
        <input type="text" name="genre" color="blue">
        <span class="error">* <?php echo $genreErr;?></span><br>
	<b style="font-size:20px;">Title:</b><br>
        <input type="text" name="title" color="blue">
        <span class="error">* <?php echo $titleErr;?></span><br><br>
  <b style="font-size:20px;">Submit the artice:</b><br>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br> 
       <input type="submit" value="Submit" name="submit"><br>
       <input type="reset" value="Reset All Data">
    </fieldset>
    </form>

<br><br><br><br>

    <form action="query.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Make a Query :</b></legend>
        <input type="submit" value="Make a query">
    </form>

    <form action="scripts/destroy.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Sign Out :</b></legend>
        <input type="submit" value="Sign Out!">
    </form>

  </body>
</html>