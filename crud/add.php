<?php session_start(); ?>

    <?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

        <html>

        <head>
            <title>Add Data</title>
        </head>

        <body>
            <?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
    $email= $_POST['email'];
    $city_name = $_POST['city_name'];
	$website = $_POST['website'];
	$loginId = $_SESSION['id'];
		
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
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO user_info(first_name, last_name, email,city_name,website, login_id) VALUES('$first_name','$last_name','$email', '$city_name','$website','$loginId')");
		
		//display success message
//		echo "<font color='green'>Data added successfully.";
//		echo "<br/><a href='view.php'>View Result</a>";
        
        
        
        
         header("location:view.php");

	}
}
?>
        </body>

        </html>