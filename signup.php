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
   <form method="post" action="http://localhost/scripts/signup.php">
   <fieldset>
      <legend style="font-size:40px; color:white;"><b>New Users Sign Up :</b></legend>
      <fieldset>
        <b style="font-size:20px;">First name:</b><br>
        <input type="text" name="firstname" color="blue">
        <span class="error">* <?php echo $firstnameErr;?></span><br>
        <b style="font-size:20px;">Last name:</b><br>
        <input type="text" name="lastname" color="blue">
        <span class="error">* <?php echo $lastnameErr;?></span><br>
      </fieldset>
      <fieldset>
   	<b style="font-size:20px;">Birthday:</b>
  	<input type="date" name="bday">
        <span class="error">* <?php echo $bdayErr;?></span>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>Gender :</b></legend><br>
        <span class="error">* <?php echo $genderErr;?></span><br>
      	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> > Male<br>
      	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> > Female<br>
      	<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> > Other<br>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>Login Type :</b></legend><br>
        <span class="error">* <?php echo $dispositionErr;?></span><br>
	<input type="checkbox" name="disposition" <?php if (isset($disposition) && $disposition=="Faculty") echo "checked";?> > Faculty<br>
  	<input type="checkbox" name="disposition" <?php if (isset($disposition) && $disposition=="Scholar") echo "checked";?> > Student<br><br>
      </fieldset>
      <fieldset>
	<legend style="font-size:20px;"><b>Login Category :</b></legend><br>
        <span class="error">* <?php echo $categoryErr;?></span><br>
 	<input list="category" name="category">
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

<style>
body{width:50%;}
#frmCheckUsername {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "scripts/check_availability.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
                $_SESSION["username"]=$("#username").val();
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
<br><br><br><div id="frmCheckUsername">
  <label>Enter Username:</label>
  <input name="Username" type="text" id="username" class="demoInputBox" onBlur="checkAvailability()"><span id="user-availability-status"></span>    
</div>
<p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
<br>
 <form action="http://localhost/scripts/password.php" method="POST">
  <fieldset>
        <b style="font-size:20px;">Enter password:</b><br>
        <input type="text" name="password" color="blue">
        <span class="error">* <?php echo $passwordErr;?></span>
  </fieldset><br>
  <input type="submit" value="Submit"><br>
 </form><br>

  </body>
</html>