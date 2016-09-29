<?php
	include("Database.php");
	$Database = new Database();
	if(isset($_POST["submit"]))
	{
		$CustomerDetails = $_POST['customerDetails'];
		if(!empty($CustomerDetails[0]) && !empty($CustomerDetails[1]) && !empty($CustomerDetails[2]))
		{
			$Sql = "INSERT INTO Customer(name, username, password) VALUES('$CustomerDetails[0]', '$CustomerDetails[1]', '$CustomerDetails[2]')";
			if($Database->query($Sql) === true)
			{
				header("Location: Login.php");
			}
			else
			{
				echo "Error: ";
			}
		}
	}
?>

<html>
	
	<head>
		<title>
			Create an account
		</title>
	</head>
	
	<body>
		<form name="register" method="POST" action="Register.php">
			<h1>Create an account</h1>
			<p>Name: <input type='text' name='customerDetails[0]' value=""/></p>
			<p>Username: <input type='text' name='customerDetails[1]' value=""/></p>
			<p>Password: <input type='password' name='customerDetails[2]' value=""/></p>
			<p> <input type='submit' name='submit' value='Create account'/></p>
		</form>
	</body>
	
</html>