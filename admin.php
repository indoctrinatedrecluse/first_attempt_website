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

<br><br><br>
   <form method="post" action="http://localhost/scripts/admin1.php">
   <fieldset>
      <legend style="font-size:40px; color:white;"><b>Modify a user record :</b></legend>
      <fieldset>
        <b style="font-size:20px;">Old First name:</b><br>
        <input type="text" name="firstname1" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
	<b style="font-size:20px;">New First name:</b><br>
        <input type="text" name="firstname2" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
	<b style="font-size:20px;">Old Last name:</b><br>
        <input type="text" name="lastname1" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
	<b style="font-size:20px;">New Last name:</b><br>
        <input type="text" name="lastname2" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
      </fieldset>
      <fieldset>
   	<b style="font-size:20px;">Old Birthday:</b>
  	<input type="date" name="bday1">
        <span class="error">* <?php echo $bdayErr;?></span>
	<b style="font-size:20px;">New Birthday:</b>
  	<input type="date" name="bday2">
        <span class="error">* <?php echo $bdayErr;?></span>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>Old Gender :</b></legend><br>
        <span class="error">* <?php echo $genderErr;?></span><br>
      	<input type="radio" name="gender1" <?php if (isset($gender1) && $gender1=="Male") echo "checked";?>> Male<br>
      	<input type="radio" name="gender1" <?php if (isset($gender1) && $gender1=="Female") echo "checked";?>> Female<br>
      	<input type="radio" name="gender1" <?php if (isset($gender1) && $gender1=="Other") echo "checked";?>> Other<br>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>New Gender :</b></legend><br>
        <span class="error">* <?php echo $genderErr;?></span><br>
      	<input type="radio" name="gender2" <?php if (isset($gender) && $gender2=="Male") echo "checked";?>> Male<br>
      	<input type="radio" name="gender2" <?php if (isset($gender) && $gender2=="Female") echo "checked";?>> Female<br>
      	<input type="radio" name="gender2" <?php if (isset($gender) && $gender2=="Other") echo "checked";?>> Other<br>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>Old Login Type :</b></legend><br>
        <span class="error">* <?php echo $dispositionErr;?></span><br>
	<input type="checkbox" name="disposition1" <?php if (isset($disposition1) && $disposition1=="Faculty") echo "checked";?>> Faculty<br>
  	<input type="checkbox" name="disposition1" <?php if (isset($disposition1) && $disposition1=="Scholar") echo "checked";?>> Student<br><br>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>New Login Type :</b></legend><br>
        <span class="error">* <?php echo $dispositionErr;?></span><br>
	<input type="checkbox" name="disposition2" <?php if (isset($disposition2) && $disposition2=="Faculty") echo "checked";?>> Faculty<br>
  	<input type="checkbox" name="disposition2" <?php if (isset($disposition2) && $disposition2=="Scholar") echo "checked";?>> Student<br><br>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>Old Login Category :</b></legend><br>
        <span class="error">* <?php echo $categoryErr;?></span><br>
 	<input list="category" name="category1">
 	<datalist id="category">
   	  <option value="B. Tech 3rd Year"> B. Tech 3rd Year</option>
  	  <option value="B. Tech 4th Year"> B. Tech 4th Year</option>
  	  <option value="M. Tech 1st Year"> M. Tech 1st Year</option>
    	  <option value="M. Tech 2nd Year"> M. Tech 2nd Year</option>
	  <option value="Research Scholar"> Research Scholar</option>
	  <option value="Assistant Professor"> Assistant Professor</option>
	  <option value="Professor"> Professor</option>
  	</datalist>
       </fieldset>
       <fieldset>
	<legend style="font-size:20px;"><b>New Login Category :</b></legend><br>
        <span class="error">* <?php echo $categoryErr;?></span><br>
 	<input list="category" name="category2">
 	<datalist id="category">
   	  <option value="B. Tech 3rd Year"> B. Tech 3rd Year</option>
  	  <option value="B. Tech 4th Year"> B. Tech 4th Year</option>
  	  <option value="M. Tech 1st Year"> M. Tech 1st Year</option>
    	  <option value="M. Tech 2nd Year"> M. Tech 2nd Year</option>
	  <option value="Research Scholar"> Research Scholar</option>
	  <option value="Assistant Professor"> Assistant Professor</option>
	  <option value="Professor"> Professor</option>
  	</datalist>
       </fieldset><br>
       <input type="submit" value="Submit"><br>
       <input type="reset" value="Reset All Data">
    </fieldset>
    </form>


<br><br><br>
    <form method="post" action="http://localhost/scripts/admin2.php">
    <fieldset>
      <legend style="font-size:40px; color:white;"><b>Delete a user record :</b></legend>
      <fieldset>
        <b style="font-size:20px;">First name:</b><br>
        <input type="text" name="firstname" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
        <b style="font-size:20px;">Last name:</b><br>
        <input type="text" name="lastname" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
    </fieldset>
    </form>

<br><br><br>
    <form method="post" action="http://localhost/scripts/admin3.php">
     <fieldset>
      <legend style="font-size:40px; color:white;"><b>Modify an article record :</b></legend>
     </fieldset>
     <fieldset>
        <b style="font-size:20px;">Old First name:</b><br>
        <input type="text" name="firstname1" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
	<b style="font-size:20px;">New First name:</b><br>
        <input type="text" name="firstname2" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
        <b style="font-size:20px;">Old Last name:</b><br>
        <input type="text" name="lastname1" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
	<b style="font-size:20px;">New Last name:</b><br>
        <input type="text" name="lastname2" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
      </fieldset>
      <fieldset>
   	<b style="font-size:20px;">Old Publication Date:</b>
  	<input type="date" name="pdate1">
        <span class="error">* <?php echo $pdateErr;?></span>
	<b style="font-size:20px;">New Publication Date:</b>
  	<input type="date" name="pdate2">
        <span class="error">* <?php echo $pdateErr;?></span>
      </fieldset>
      <fieldset>
	<b style="font-size:20px;">Old Journal (please provide page number):</b><br>
        <input type="text" name="journal1" color="blue">
        <span class="error">* <?php echo $journalErr;?></span><br>
	<b style="font-size:20px;">New Journal (please provide page number):</b><br>
        <input type="text" name="journal2" color="blue">
        <span class="error">* <?php echo $journalErr;?></span><br>
	<b style="font-size:20px;">Old Genre:</b><br>
        <input type="text" name="genre1" color="blue">
        <span class="error">* <?php echo $genreErr;?></span><br>
	<b style="font-size:20px;">New Genre:</b><br>
        <input type="text" name="genre2" color="blue">
        <span class="error">* <?php echo $genreErr;?></span><br>
	<b style="font-size:20px;">Old Title:</b><br>
        <input type="text" name="title1" color="blue">
        <span class="error">* <?php echo $titleErr;?></span>
	<b style="font-size:20px;">New Title:</b><br>
        <input type="text" name="title2" color="blue">
        <span class="error">* <?php echo $titleErr;?></span><br><br>
       <input type="submit" value="Submit"><br>
       <input type="reset" value="Reset All Data">
    </fieldset>
    </form>

    <form action="addjournal.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Add a journal :</b></legend>
        <input type="submit" value="Add journal">
    </form>

    <form action="query.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Make a Query :</b></legend>
        <input type="submit" value="Make a query">
    </form>

    <form action="http://localhost/scripts/destroy.php" method="post">
        <legend style="font-size:20px; color:white;"><b>Sign Out :</b></legend>
        <input type="submit" value="Sign Out!">
    </form>
    
  </body>
</html>