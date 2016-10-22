<html>
<body>

<?php
	session_start();
	include("Database.php"); 
	$Database = new Database();
	$PageTitle = "";
	$username = "";
	$password = "";
	$error = 0;
	


	if(isset($_POST['btnlogin']))
	{
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$Sql = "SELECT * from customer where password='$password' AND username='$username'";
		$Result = $Database->query($Sql);
		$Rows = $Result->num_rows;
		
		if($Rows == 1)
		{
			$_SESSION['username'] = $username;
			header("location: roasteryCoffees.php");
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Username or Password is invalid")';
			echo '</script>';
			
		//echo $error;
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
		<form name="login" method="POST" action="login.php">
			<center>
			<p> <h9>Please log in: </h9></p> 
			<p class = "coffee-text"> Your user name:</p> 
			<input type="text" name="username" value="" required>
			<p class = "coffee-text"> Your password:</p> 
			<input type="password" name="password" value="" required>
			
			<p> <input type="submit" name="btnlogin" value= "Login" />
			
			</p>
			<a href="Register.php"> Not registered? Create an account!</a>
		</center>
		</form>
		
	</body>


<?php
$Database->__destruct();
?>
</body>
</html>