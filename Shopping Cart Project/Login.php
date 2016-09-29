<?php
	include("Database.php"); 
	$Database = new Database();
?>
<html>
	<head>
		<title>
			Coffee Shop
		</title>
	</head>
	
	<body>
		<form name="Login" method="POST" action="Login.php">
			<h1>Please log in: </h1>
			<p>Your user name: <input type="text" name="LoginDetails[0]" value=""></p>
			<p>Your password: <input type="password" name="LoginDetails[1]" value=""></p>
			<p><input type="submit" name="submit" value="Login"><a href="Register.php">Create an account</a></p>
		</form>
	</body>
</html>

<?php
$Database->__destruct();
?>