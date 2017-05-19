<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="header">
	<div id="content">

     
     <a href="index.php">Home</a> 
    </div>
</div>
<center>

<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		echo "Either username or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<br>
	<br>
	<form name="form1" method="post" action="">
		<table  >
			<tr> 
				
				<td><input type="text" name="username" placeholder="Username"></td>
			</tr>
			<tr> 
				
				<td><input type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr> 
				
<!--				<td ><input type="submit" name="submit" value="Login"></td>-->
				
				<td colspan="10"><button type="submit" name="submit"><strong>Login</strong></button></td>
				
			</tr>
		</table>
	</form>
<?php
}
?>
</center>
</body>
</html>
