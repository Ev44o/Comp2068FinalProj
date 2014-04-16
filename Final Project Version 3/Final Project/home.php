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
		 $create_user ="";
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
	<div id="table" class="large-12 columns" align="center">
		<table border="0px">
			<thead>
				<tr>
					<td>Survey Name</td>
					<td>Survey Type</td>
					<td>Expires</td>
				</tr>
			</thead>
			<tbody>
				<?php
						include 'includes/db_connect.php';
						$sql="SELECT survey_name,survey_type,DATE_FORMAT(end_date,'%Y/%m%/%d') as end_date FROM surveys WHERE end_date >= curdate() ORDER BY survey_name ASC";
						$result=mysqli_query($connect,$sql);
						while($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<td><a href="take_survey.php?id=<?php echo $row['survey_name']?>&type=<?php echo $row['survey_type']?>"><?php echo $row['survey_name']?></a></td>
					<td><?php echo $row['survey_type']?></a></td>
					<td><?php echo $row['end_date']?></td>
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
