<!--
File Name: logout.php
Author Names: Jordan Cooper, Evan Pugh
Website Name: Survey Site
Description: This page runs when the user clicks
logout. It removes the session and redirects to 
the home page.
-->
<?php
//open the session
session_start();
//destroy the session
session_destroy();
//redirect
echo "You are now logged out. <br>
You will be redirected to the home page momentarily.";
header('Refresh: 5; url=home.php');
exit();
?>