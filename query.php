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
   <form method="post" action="http://localhost/scripts/query.php">
   <fieldset>
      <legend style="font-size:40px; color:white;"><b>Query for a journal :</b></legend>
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
        <span class="error">(Optional) <?php echo $pdateErr;?></span>
      </fieldset>
      <fieldset>
	<b style="font-size:20px;">Journal (please provide page number):</b><br>
        <input type="text" name="journal" color="blue">
        <span class="error">(Optional) <?php echo $journalErr;?></span><br>
	<b style="font-size:20px;">Genre:</b><br>
        <input type="text" name="genre" color="blue">
        <span class="error">(Optional) <?php echo $genreErr;?></span><br>
	<b style="font-size:20px;">Title:</b><br>
        <input type="text" name="title" color="blue">
        <span class="error">(Optional) <?php echo $titleErr;?></span><br>
       <input type="submit" value="Submit"><br>
       <input type="reset" value="Reset All Data">
    </fieldset>
    </form>
<br><br><br><br>
    
    <form action="addjournal.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Add a journal :</b></legend>
        <input type="submit" value="Add journal">
    </form>

    <form action="http://localhost/scripts/destroy.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Sign Out :</b></legend>
        <input type="submit" value="Sign Out!">
    </form>

  </body>
</html>