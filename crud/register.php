<html>

<head>
    <title>Register</title>
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
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		echo "All fields should be filled. Either one or many fields are empty.";
		echo "<br/>";
		echo "<a href='register.php'>Go back</a>";
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
//		echo "Registration successfully";
//		echo "<br/>";
//		echo "<a href='login.php'>Login</a>";
        
        
        
        
       
    header("location:login.php");

        
        
	}
} else {
?>
            <br>
            <br>


            <form name="form1" method="post" action="">
                <table width="75%" border="0">
                    <tr>

                        <td>
                            <input type="text" name="name" placeholder="Full Name">
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="text" name="email" placeholder="Email">
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="text" name="username" placeholder="Username">
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="password" name="password" placeholder="Password">
                        </td>
                    </tr>
                    <tr>

                        <!--				<td><input type="submit" name="submit" value="Sign Up"></td>-->



                        <td colspan="10">
                            <button type="submit" name="submit"><strong>Sign Up</strong></button>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
}
?>
    </center>
</body>

</html>