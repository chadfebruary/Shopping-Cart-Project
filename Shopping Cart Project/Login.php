<?php
	include("Database.php"); 
	$Database = new Database();
?>
<html>
	
		<center><header> Welcome to the Coffee Shop </header></center>
		
		
		<link rel= "stylesheet" href = "style.css" type="text/css" media="screen" />
	
	
	<body>
		<form name="Login" method="POST" action="Login.php">
			<center>
			<div class ="header"> <h1> Please log in: </h1></div>
			<p class = "coffee-text"> Your user name:</p> 
			<input type="text" name="LoginDetails[0]" value="">
			<p class = "coffee-text"> Your password:</p> 
			<input type="password" name="LoginDetails[1]" value="">
			<p><input type="submit" name="submit" value="Login"></p>
			<a href="Register.php">Create an account</a>
		</center>
		</form>
		
	</body>
</html>

<?php
$Database->__destruct();
?>