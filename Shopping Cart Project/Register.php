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
	<link rel= "stylesheet" href = "style.css" type="text/css" media="screen" />
	<body>
		<form name="register" method="POST" action="Register.php">
			<center> 
			<div class ="header"> <h1>Create an account</h1></div>
			<p class = "coffee-text"> Name </p> 
			<input type='text' name='customerDetails[0]' value=""/>
			<p class = "coffee-text"> Username: </p> 
			<input type='text' name='customerDetails[1]' value=""/>
			<p class = "coffee-text">Password: </p>  
			<input type='password' name='customerDetails[2]' value=""/>
			<p> <input type='submit' name='submit' value='Create account'/></p>
			</center>
		</form>
	</body>
	
</html>