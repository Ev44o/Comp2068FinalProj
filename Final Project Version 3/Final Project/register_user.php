<!doctype html>
<!--
File Name: register_user.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: -->

<!-- Header + required info for nav -->
<?php
		 $title = "Register a User";
		 $home ="";
		 $login ="";
		 $create_survey ="";
		 $create_user ="current-page";
		 include 'includes/header.php'; 
		?>
		<div class="row">
			<div class="large 12-columns center-title loginCred">
				<form id="login" name="login" method="post" action="register.php">
					<br>Registration Form:<br><br>
					<input type="text" name="registerUsername" id="registerUsername" placeholder="Username" /><br>
					<input type="password" name="registerPassword" id="registerPassword" placeholder="Password" /><br>
					<input type="password" name="confirmPassword" id="confirmPassword" placeholder="Password" /><br>
					<input type="email" name="registerEmail" id="registerEmail" placeholder="Email Address" /><br>
					<input type="submit" name="registerButton" id="registerButton" value="Register" /><br>
				</form>
<!-- Footer -->
<?php
	include 'includes/footer.php'; 
?>
