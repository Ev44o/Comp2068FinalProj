<!--
File Name: login1.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page is run when the user tries to log in to the contact page.
if the user's data is correct he will be redriected to the appropreate page
-->
<?php
		 $title = "Welcome";
		 $home ="";
		 $login ="current-page";
		 $create_survey ="";
		 $create_user ="";
		 include 'includes/header.php'; 
		?>
		<div class="row">
			<div class="large 12-columns center-title loginCred">
				<form id="login" name="login" method="post" action="login.php">
					<br>Login:<br><br>
					<input type="text" name="loginUsername" id="loginUsername" placeholder="Username" /><br>
					<input type="password" name="loginPassword" id="loginPassword" placeholder="Password" /><br>
					<input type="submit" name="loginButton" id="loginButton" value="Login" /><br>
				</form>
			</div>
		</div>
<!-- Footer -->
<?php
	include 'includes/footer.php'; 
?>