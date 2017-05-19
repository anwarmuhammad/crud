<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<center>
	<div id="header">
		Welcome to my CRUD Application!
<!--		 <a href='logout.php'>Logout</a>-->
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		
		<br/>
		<br>
		<br>
		<br>
		<br>
		<form action="view.php">
		<table>
           <tr>
               <th>Welcome <?php echo $_SESSION['name'] ?> !<br/></th>
           </tr>
           
		    <td><button type="submit" name="submit" >Click to Add Your Information</button></td>
		</table>
		</form>
		
		
		
		
		<br/><br/>
	<?php	
	} else {
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table>
           <tr>
               <td colspan="10">Plz Login or Sign Up to add Your Information</td>
           </tr>
           <tr>
                <form action="login.php">
               <td><button type="submit" name="submit" >login</button></td>
               </form>
               <form action="register.php">
               <td><button type="submit" name="submit" >Sign Up</button></td>
               </form>
           </tr>
		   
		    
		</table>
		
		
		
<!--
        echo "Plz log in   to add your information.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
-->
        
        
        
     <?php   
	}
	?>
	<div id="footer">
		Created by <a href="#" title="Y">Y</a>
	</div>
	</center>
</body>
</html>
