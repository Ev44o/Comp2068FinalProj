<!doctype html>
<!--
File Name: register.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page checks the entered information from the register.html
page and makes sure it is valid. It then inserts the information into the database.
The user is then redirected to the login.
-->
<html>
	<head>
		<title>Survey Site - Register</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php

		//Create a variable we can use to determine if the user input is good or not
		$formOK = true;

		//Check for username value
		if (empty($_POST['registerUsername']))
		{
			$message = 'A username is required.<br> 
			Click Ok to go back.';
			echo "<script type='text/javascript'>window.alert('$message');
			window.location.href='edit_user.php'</script>";
			$formOK = false;
		}

		//Check for password value
		if (empty($_POST['registerPassword']))
		{
			$message = 'A password is required. <br>
			Click Ok to go back.';
			echo "<script type='text/javascript'>window.alert('$message');
			window.location.href='edit_user.php'</script>";
			$formOK = false;
		}

		//Check for matching password values
		if ($_POST['registerPassword'] != $_POST['confirmPassword'])
		{
			$message = 'Passwords do not match, please enter them again. <br>
			Click Ok to go back.';
			echo "<script type='text/javascript'>window.alert('$message');
			window.location.href='edit_user.php'</script>";
			$formOK = false;
		}

		//Check for email value
		if (empty($_POST['registerEmail']))
		{
			$message = 'An email address is required.<br>
			Click Ok to go back.';
			echo "<script type='text/javascript'>window.alert('$message');
			window.location.href='edit_user.php'</script>";
			$formOK = false;
		}
		
		//If we have both a username, password and an email, save the user to the database
		if ($formOK == true)
		{
			$conn = mysqli_connect('localhost', 'db200198596', '910208', 'db200198596') or die('Could not connect: ' . mysql_error());

			//Hash the password before saving it
			$hashPassword = sha1($_POST['registerPassword']);
			$sql = "INSERT INTO users (username, password, email) VALUES ('$_POST[registerUsername]', '$hashPassword', '$_POST[registerEmail]')";
			
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			
			echo "Thank you for registering. <br>
			You will be redirected to the login page momentarily.";
			header('Refresh: 5; url=login.html');
		}
		?>
	</body>
</html>