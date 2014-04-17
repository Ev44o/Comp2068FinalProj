<!--
File Name: create_survey_table.php
Author: Jordan Cooper, Evan Pugh
Web	Site: create_survey_table.php
Description: this takes the user's data and creates the table
			 and inputs the values given into the appropreate tables. -->
<?php
	$title = "My Results";
	$home ="";
	$login ="";
	$statistics ="current-page";
	$create_user ="";
	include 'includes/header.php';
	
	session_start();

	// connect to the database
	include 'includes/db_connect.php';
	// create the table that houses the survey questions 
?>
<div class="row">
	<div class="large-12 columns center-title">
		<h2>Your Survey's Statistics</h2>
	</div>
</div>
<div class="row">
	<div id="table" class="large-12 columns" align="center">
		<table border="0px">
			<thead>
				<tr>
					<td>Survey Name</td>
					<td>Question Number</td>
					<td>Answer</td>
					<td>Total</td>
				</tr>
			</thead>
			<tbody>
				<?php   // connect to the db using the includes page
				include 'includes/db_connect.php';
				
				// assign the session id to a variable
				$id = $_SESSION['session_id'];
				// get session owner name
				$sql_get_owner = "SELECT username FROM users WHERE id ='$id'";
				// get the results of the query by connecting to the db then running the string
				$result_owner = mysqli_query($connect, $sql_get_owner) or die('Error querying database.');
				// put the results in an array
				$row_owner = mysqli_fetch_array($result_owner);
				// assign owner name to a variable
				$username = $row_owner['username'];
				
				$sql_survey_name="SELECT * FROM surveys WHERE survey_owner ='". $username ."'";
				$result_survey_name = mysqli_query($connect,$sql_survey_name);
				
				while($row_survey_name = mysqli_fetch_array($result_survey_name)) 
				{
				$survey_name = $row_survey_name['survey_name'];
				$survey_name_results= $survey_name."_results";
					
					// select the surveys that are not expired (compares the date with the current date and displays those which are not less than that date)
					$sql="SELECT questions,answers,count(*) as 'results' from $survey_name_results group by questions,answers";
					$result=mysqli_query($connect,$sql);
					while($row = mysqli_fetch_array($result)) {
					?>
					<tr>
						<td><?php echo $survey_name?></td>
						<td><?php echo $row['questions']?></td>
						<td><?php echo $row['answers']?></td>
						<td><?php echo $row['results']?></td>
					</tr>
					<?php
					}
				}
				?>
				<tr><td><button class="btn" onClick="printStats()" >Print me</button></td></tr>
			</tbody>
		</table>
	</div>
</div>
<?php include 'includes/footer.php';?>
