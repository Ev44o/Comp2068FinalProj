<!--
File Name: home.html
Author: Jordan Cooper
Web	Site: home.html, the home page
Description: This is the home page of our site, this is where users 
			 can select a survey to complete, or sign in to
			 create a survey of their own.
-->

<?php
		 $title = "Welcome";
		 $home ="current-page";
		 $login ="";
		 $create_survey ="";
		 include 'includes/header.php'; 
		?>
<!-- Title for the page -->

<div class="row">
	<div class="large-2 columns center-title "> <img src="img/logo.png"/> </div>
	<div class="large-10 columns center-title ">
		<h1>Welcome to Survey Savy</h1>
	</div>
</div>
<div class="row">
	<div class="large-12 columns" id="content">
		<p> Survey Savy is a website where those who love to do surveys are paired up with those who need 
			one done! To Begin select a survey from the table below, and have fun, or <a href="create_survey.php">create your own survey</a> by signing in. </p>
	</div>
</div>
<div class="row">
	<div id="table" class="large-6 columns" align="center">
		<table border="1px">
			<thead>
				<tr>
					<td>Select a Survey!</td>
				</tr>
			</thead>
			<tbody>
				<?php
						include 'includes/db_connect.php';
						$sql="SELECT * FROM surveys ORDER BY name ASC";
						$result=mysqli_query($connect,$sql);
						while($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><?php echo $row['name']?></td>
				</tr>
				<?php
						}
				?>
			</tbody>
		</table>
	</div>
</div>

<!-- Footer -->
<?php
	include 'includes/footer.php'; 
?>
