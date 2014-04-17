<!doctype html>
<!--
File Name: register.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description:
-->
<?php
		 $title = "Register a User";
		 $home ="";
		 $login ="";
		 $create_survey ="";
		 $create_user ="";
		 $statistics ="";
		 $logout ="";
		 $edit_user="";
		 include 'includes/header.php'; 
		?>
		<?php

		//Create a variable we can use to determine if the user input is good or not
		$formOK = true;

		//Check for username value
		if (empty($_POST['registerUsername']))
		{
			echo 'Username is required';
			$formOK = false;
		}

		//Check for password value
		if (empty($_POST['registerPassword']))
		{
			echo 'Password is required';
			$formOK = false;
		}

		//Check for matching password values
		if ($_POST['registerPassword'] != $_POST['confirmPassword'])
		{
			echo 'Passwords do not match';
			$formOK = false;
		}

		//Check for email value
		if (empty($_POST['registerEmail']))
		{
			echo 'Email is required';
			$formOK = false;
		}
		else
		{
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $_POST['registerEmail']))
			{
				echo 'Invalid Email';
				$formOK = false;
			}
		}
		
		//If we have both a name and an email value, save the user to the database
		if ($formOK == true)
		{
			$conn = mysqli_connect('localhost', 'db200198596', '910208', 'db200198596') or die('Could not connect: ' . mysql_error());

			//Hash the password before saving it
			$hashPassword = sha1($_POST['registerPassword']);
			$sql = "INSERT INTO users (username, password, email) VALUES ('$_POST[registerUsername]', '$hashPassword', '$_POST[registerEmail]')";

			mysqli_query($conn, $sql);
			echo "User added";
			mysqli_close($conn);
		}
		else
		{
			echo 'Click <a href="javascript:history.go(-1)">HERE</a> to go back and adjust your entry.';
		}
		?>
<?php
	include 'includes/footer.php'; 
?>