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

    <h1 style="font-size:40px;">Login to <strong><abbr title="Online Research Document Repository" style="font-size:50px; color: white">RecordEx</abbr></strong></h1>
    <p>Check out the author's blog :   <a href="http://www.abmitrablogger.blogspot.com" target="_blank"><img src="images/link1.jpg" alt="here" style="height:50px; width:50px; border: 0;"></a>.</p>

  <form method="post" action="http://localhost/scripts/home.php">
      <legend style="font-size:20px; color:white;"><b>Login information :</b></legend>
      <b>User ID:</b><br>
      <input type="text" name="username" color="blue">
      <span class="error">* <?php echo $usernameErr;?></span><br>
      <b>Password :</b><br>
      <input type="password" name="password" color="blue">
      <span class="error">* <?php echo $passwordErr;?></span><br><br>
      <input type="submit" value="Login">
   </form>
	
   <br><br><br><br>

   <form action="signup.php" method="post">
      <legend style="font-size:20px; color:white;"><b>For new Users :</b></legend>
      <input type="submit" value="Sign Up!">
   </form>

  </body>
</html>