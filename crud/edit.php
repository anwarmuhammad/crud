<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
	$city_name = $_POST['city_name'];
	$website = $_POST['website'];	
	
	// checking empty fields
	if(empty($first_name) || empty($last_name) || empty($email) || empty($city_name) ||  empty($website)) {
				
		if(empty($first_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
        if(empty($last_name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
        if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
        
		if(empty($city_name)) {
			echo "<font color='red'>City field is empty.</font><br/>";
		}
		
		if(empty($website)) {
			echo "<font color='red'>Website field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE user_info SET first_name='$first_name',     last_name='$last_name', email='$email',city_name='$city_name', website='$website' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$first_name = $res['first_name'];
    $last_name = $res['last_name'];
    $email = $res['email'];
	$city_name = $res['city_name'];
	$website = $res['website'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<center>
   <div id="header">
	<div id="content">

     <a href="index.php">Home</a> |  | <a href="logout.php">Logout</a>
    
    </div>
</div>

		<br/><br/>
	<div id="body">
	<div id="content">
	<form name="form1" method="post" action="edit.php">
		<table >
			<tr> 
				
				<td><input type="text" name="first_name" value="<?php echo $first_name;?>"></td>
			</tr>
			<tr> 
				
				<td><input type="text" name="last_name" value="<?php echo $last_name;?>"></td>
			</tr>
			<tr> 
				
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				
				<td><input type="text" name="city_name" value="<?php echo $city_name;?>"></td>
			</tr>
			
			<tr> 
				
				<td><input type="text" name="website" value="<?php echo $website;?>"></td>
			</tr>
			<tr >
				
				<input type="hidden" name="id" value=<?php echo $_GET['id'];?>
				  
				
				
				
<tr>
    <td colspan="">
        <button type="submit" name="update"><strong>UPDATE</strong></button>
    </td>
</tr>

		</table>
	</form>
        </div>
	    
	</div>
	</center>
</body>
</html>
