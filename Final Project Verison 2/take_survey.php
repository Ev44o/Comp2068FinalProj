<!-- 
File Name: take_survey.php
Author: Jordan Cooper
Web	Site: survey site
Description: The user is redirected to this page when they have chosen a survey from the home page table
			 the survey type and name are taken from the URL and the rest is populated from the survey table
 -->
<?php
		 $title = "Taking a Survey";
		 $home ="";
		 $login ="";
		 $create_survey ="";
		 $survey= $_GET['id'];
		 $survey_type= $_GET['type'];
		 include 'includes/header.php'; 
		?>

<div class="row">
	<div id="table" class="large-12 columns" align="center">
		<form id="take_survey" name="take_survey" method="post" action="take_survey_table.php?id=<?php echo $survey;?>_results">
			<table border="1px">
				<thead>
					<tr>
						<td>Take a Survey!</td>
					</tr>
				</thead>
				<tbody>
					<?php
						include 'includes/db_connect.php';
						$sql="SELECT * FROM $survey";
						$result = mysqli_query($connect,$sql); 
						while($row = mysqli_fetch_array($result)) 
						  { 
					?>
					<tr>
						<td><input readonly type="text"  name="question<?php echo $row['survey_id'];?>"id="question<?php echo $row['survey_id'];?>" value="<?php echo $row['questions'];?>"></td>
					</tr>
					<tr>
						<?php 
						if($survey_type=='short_answer')
						{
						?>
							<td><input type="text" name="answer<?php echo $row['survey_id'];?>" id="answer<?php echo $row['survey_id'];?>"></td>;
						<?php
						}
						else
						{
						?>
							<td>
								<input type="radio" name="answer<?php echo $row['survey_id'];?>" id="answer<?php echo $row['survey_id'];?>" value="Agree">Agree 
								<br>
								<input type="radio" name="answer<?php echo $row['survey_id'];?>" id="answer<?php echo $row['survey_id'];?>" value="Disagree">Disagree
							</td>
						<?php
						}
						?>
						
						
					</tr>
					<?php
							}
					?>
					<tr>

						<td><input type="submit" name="button" id="button" value="Submit" /></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
 
  <!-- Footer -->
<?php
	include 'includes/footer.php'; 
?>