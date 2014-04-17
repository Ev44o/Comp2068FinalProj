<!--
File Name: update_user.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page makes changes to account information.
The user enters their current password to allow changes to the account information.
When it is submitted it is checked for blanks, incorrectly filled fields and
correct email formating etc.
-->

<!-- Header + required info for nav -->
		<?php
		 $title = "Log in";
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
		session_start(); // start the session
		
		if (!isset($_SESSION['session_id']))
		{	// show an error message to the user if they are not logged in
			$message = "You do not have permission to view this, please login or register.";
			echo "<script type='text/javascript'>window.alert('$message');
					window.location.href='edit_user.php'</script>";
		}
		else
		{	// if the username or email fields are empty, notify the user
			if (empty($_POST['username']) || empty($_POST['email']))
			{	// show an error message to the user
				$message = "Please go back and check that you have entered information in the fields that are marked with a *."; 
				echo "<script type='text/javascript'>window.alert('$message');
					window.location.href='edit_user.php'</script>";
			}
			else
			{	// assign session id to $id so that it is easier to use later
				$id = $_SESSION['session_id'];
				$conn = mysqli_connect('localhost', 'db200198596', '910208', 'db200198596') or die('Error connecting to MySQL server.');
				
				//find the function that strips out problem characters from strings
				
				$currentPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
				// if the current/old password is empty, let the user know
				if(empty($currentPassword))
				{	// show an error message to the user 
					$message = "Please go back and check that you have entered your	current password correctly.";
					echo "<script type='text/javascript'>window.alert('$message');
					window.location.href='edit_user.php'</script>";
				}
				else
				{	// hash the current entered password
					$hashCurrentPassword = sha1($currentPassword);
					// select the password from the database that matches the session ID
					$sql = "SELECT password FROM users WHERE id='$id'";
					
					// run the query
					$passCheck = mysqli_query($conn, $sql) or die('Error updating database.');
					// assign the query to an array
					$row = mysqli_fetch_array($passCheck);
					// assign the hashed password to a variable so it can be compared
					$storedHashPassword = $row['password'];
					
					// if the current/old passwords match, continue with the update, if not cancel
					if ($hashCurrentPassword == $storedHashPassword)
					{	// check the remaining entries for any possible characters that could cause problems
						$username = mysqli_real_escape_string($conn, $_POST['username']);
						$email = mysqli_real_escape_string($conn, $_POST['email']);
						$newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
						$confirmNewPassword = mysqli_real_escape_string($conn, $_POST['confirmNewPassword']);
						// if anything has been entered into the new password fields, continue
						if (!empty($newPassword) || !empty($confirmNewPassword))
						{	// check to see if the new password fields match, if so continue
							if ($newPassword == $confirmNewPassword)
							{	// hash the new password
								$hashNewPassword = sha1($newPassword);
								// insert new values into the update statement
								$sqlUpdate = "UPDATE users SET username = '$username', email = '$email', password ='$hashNewPassword' WHERE id =$id";
								// run the update statement
								mysqli_query($conn, $sqlUpdate) or die('Error updating database.');
								//redirect
								echo "Information updated. <br>
								You will be redirected to the home page momentarily.";
								header('Refresh: 5; url=home.php');
							}
							else
							{	// show an error message to the user if
								$message = "The new password fields do not match. Click Ok to go back.";
								echo "<script type='text/javascript'>window.alert('$message');
								window.location.href='edit_user.php'</script>";
							}
						}
						else
						{	// update the user account information without a new password
							$sqlUpdate = "UPDATE users SET username = '$username', email = '$email' WHERE id =$id";
							mysqli_query($conn, $sqlUpdate) or die('Error updating database.');
							//redirect
							echo "Information updated. <br>
							You will be redirected to the home page momentarily.";
							header('Refresh: 5; url=home.php');
						}// close the connection
						mysqli_close($conn);
					}
					else
					{	// show an error message to the user when the current/old password is incorrect
						$message = "Incorrect current password. Click Ok to go back.";
						echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='edit_user.php'</script>";
					}
				}
			}
		}
		?>
<?php
	include 'includes/footer.php'; 
?>