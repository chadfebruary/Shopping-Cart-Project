<?php
	session_start();
	include("Database.php"); 
	$Database = new Database();
	$PageTitle = "";
	$username = "";
	$password = "";
	$error = "";
	
	if(isset($_POST["login"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Username and password are required.";
		}
	else
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$Sql = "select * from login where password='$password' AND username='$username'";
		$Result = $Database->query($Sql);
		$Rows = $Result->num_rows;
		
		if($Rows == 1)
		{
			$_SESSION['username'] = $username;
			header("location: roasteryCoffees.php");
		}
		else
		{
			$error = "Username or Password is invalid";
		}
	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
 
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>
	<body>
	
		<?php include 'navigator.php'; ?>
 
		<!-- container -->
		<div class="container">
		<form name="login" method="POST" action="roasteryCoffees.php">
			<center>
			<div class ="header"> <h1> Please log in: </h1></div>
			<p class = "coffee-text"> Your user name:</p> 
			<input type="text" name="LoginDetails[0]" value="">
			<p class = "coffee-text"> Your password:</p> 
			<input type="password" name="LoginDetails[1]" value="">
			<p><a href="roasteryCoffees.php?username='.$username.'&password='.$password.'" class='btn btn-primary' >
			   <span class="glyphicon glyphicon-lock" ></span> Login
			   </a>
			</p>
			<a href="Register.php">Not registered? Create an account!</a>
		</center>
		</form>
		
	</body>


<?php
$Database->__destruct();
?>