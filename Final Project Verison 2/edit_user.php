<!--
File Name: edit_user.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page allows a user to edit their account information.
They enter their current password to allow changes to the account information.
When it is submitted it is checked for blanks, incorrectly filled fields etc.
-->

<html>
	<head>
		<title>Survey Site - Account information</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/styles.css" /> <!-- custom stylesheet -->
	</head>
	<body> <!-- navigation links --> 
		<a href="login.html">Login</a> / <a href="logout.php">Logout</a> /<a href="register.html">Register</a>
		
		<?php
		session_start();
		// make sure the user is logged in to see the content
		if(!isset($_SESSION['session_id']))
		{	// tell them they cannot view this page
			$message = 'You do not have permission to view this page.<br> 
			Click Ok to go back.';
			echo "<script type='text/javascript'>window.alert('$message');
			window.history.back()'</script>";
		}
		else
		{	// connection string
			$conn = mysqli_connect('localhost', 'db200198596', '910208', 'db200198596') or die('Error connecting to MySQL server.');
			// query string
			$sql = "SELECT * FROM users WHERE id ='". $_SESSION['session_id'] ."'";
			// get the results of the query by connecting to the db then running the string
			$result = mysqli_query($conn, $sql) or die('Error querying database.');
			// put the results in an array
			$row = mysqli_fetch_array($result);
			// assign the array information to variables
			$id = $row['id'];
			$username = $row['username'];
			$email = $row['email'];
			// close the connection
			mysqli_close($conn);
			// output the form for the user to edit the data
			echo
			'<form method="post" action="update_user.php">
				<div>
					<label>Username *</label>
					<input type="text" name="username" value="'. $username .'" />
				</div>
				<div>
					<label>Email *</label>
					<input type="email" name="email" value="'. $email .'" />
				</div>
				<div>
					<label>New Password</label>
					<input type="password" name="newPassword" value="" />
				</div>
				<div>
					<label>Confirm New Password</label>
					<input type="password" name="confirmNewPassword" value="" />
				</div>
				
				<p>Please enter your current password to make changes</p>
				<div>
					<label>Current Password *</label>
					<input type="password" name="currentPassword" value="" />
				</div>
				
				<input type="hidden" name="id" value="<?php echo $id ?>" />
				<input type="submit" value="Save" />
				<p>The * indicates the required fields. <br>
				If you do not enter your email with a .com .ca, etc extension,<br>
				.com will automatically be assigned.</p>
			</form>';
		}
		?>
	</body>
</html>