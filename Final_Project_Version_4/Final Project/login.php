<!doctype html>
<!--
File Name: login.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This code runs when the user clicks submit
it searches the database for a perfect match
if a match is returned, the user is allowed to access the site
else it informs them of an incorrect username or password.
-->
<?php
		 $title = "Welcome";
		 $home ="";
		 $login ="current-page";
		 $create_survey ="";
		 $create_user ="";
		 $statistics ="";
		 $logout ="";
		 $edit_user="";
		 include 'includes/header.php'; 
		?>
		<?php

		// define username and password from text entered in login.html posts
		$username = $_POST['loginUsername'];
		$password = $_POST['loginPassword'];
		
		// connect to the database
		$conn = mysqli_connect("localhost", "db200198596", "910208", "db200198596") or die(mysql_error());
		
		// check for unwanted characters that could allow sql injection
		$username = mysqli_real_escape_string($conn, $username);
		$password = mysqli_real_escape_string($conn, $password);
		
		// hash the password to see if it is the correct one
		$hashpassword = sha1($password);
		
		$sql = "SELECT id, username, password FROM users WHERE username='$username' AND password='$hashpassword'";
		
		$result = mysqli_query($conn, $sql) or die('Error querying database.');
		
		// Mysql_num_row is counting table row, there should only be 1 because it is an exact match.
		$count = mysqli_num_rows($result);
		
		// If result matched $username and $password, table row must be 1 row
		if ($count == 1)
		{
			// get the user id for use later
			$row = mysqli_fetch_array($result);
			$id = $row['id'];
			
			session_start();// start session then store the id in it
			$_SESSION['session_id'] = $id;
			//header("location:create_survey.php");
			//redirect
			echo'
			<div class="row">
				<div class="large 12-columns center-title">
					Login successful. <br>
					You will be redirected to the home page momentarily.
				</div>
			</div>';
			header('Refresh: 3; url=home.php');
		}
		else
		{
			$message = "ERROR! incorrect username or password.";
			echo "<script type='text/javascript'>window.alert('$message');
				window.location.href='user_login.php'</script>";
		}
		mysqli_close($conn);
		?>

	<!-- Footer -->
	<?php
		include 'includes/footer.php'; 
	?>
