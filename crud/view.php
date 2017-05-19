<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM user_info WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="Resource/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
<center>
<div id="header">
	<div id="content">

     
     <a href="index.php">Home</a> | | <a href="logout.php">Logout</a>
    </div>
</div>

	
	<br/><br/>
	<div id="body">
	<div id="content">
	
	<table align="center" >
	<tr>
        <td colspan="10">
            <a href="add.html" class="btn btn-info"><strong>Add Your Information</strong></a>
        </td>
    </tr>
	
		<tr >
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email</td>
			<td>City Name</td>
			<td>Website</td>
			<td>Action</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['first_name']."</td>";
			echo "<td>".$res['last_name']."</td>";
			echo "<td>".$res['email']."</td>";	
            echo "<td>".$res['city_name']."</td>";
            echo "<td>".$res['website']."</td>";
            
            
       echo "<td><a href=\"edit.php?id=$res[id]\" > Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; 
            
            
            
         
              
		}
		?>
	</table>
	
        </div>
		    
		</div>
		
			</center>	
</body>
</html>
