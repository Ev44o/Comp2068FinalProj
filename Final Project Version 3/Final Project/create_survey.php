<!--
File Name: create_survey.php
Author: Jordan Cooper
Web	Site: create_survey.php
Description: in this section the user is prompted to input their survey data
			 once that data is filled in a table will be created for them
			 in the database, and their information will be stored --> 
<!-- Header + nav information -->			 
<?php
		 $title = "Create a Survey!";
		 $home ="";
		 $login ="";
		 $create_survey ="current-page";
		 $create_user ="";
		 include 'includes/header.php'; 
		?>
<div class="row">
	<div class="large-12 columns center-title">
		<h1> Create Your Own Survey!</h1>
	</div>
</div>
<!-- create a form, get information from the user about their survey -->
<div class="row">
	<div id="table" class="large-12 columns center-title">
		<form id="create_survey" name="create_survey" method="post" action="create_survey_table.php">
			<table width="510" border="0" align="center">
				<!--Survey Title -->
				<tr>
					<td>Survey Title:</td>
					<td><input type="text" name="name" id="name" /></td>
				</tr>
				<!--Survey type -->
				<tr>
					<td>Type of Survey</td>
					<td>
						<input type="radio" name="survey_type" value="agree_disagree">Agree/Disagree
						<input type="radio" name="survey_type" value="short_answer">Short Answer
					</td>
				</tr>
				<!--Exp date -->
				<tr>
					<td>Expires On</td>
					<td>
						<input type="date" name="end_date" value="end_date">
					</td>
				</tr>
				<!--Question 1 -->
				<tr>
					<td>Question 1:</td>
					<td><input type="text" name="question1" id="question1" /></td>
				</tr>
				<!--Question 2 -->
				<tr>
					<td>Question 2:</td>
					<td><input type="text" name="question2" id="question2" /></td>
				</tr>
				<!--Question 3 -->
				<tr>
					<td>Question 3:</td>
					<td><input type="text" name="question3" id="question3" /></td>
				</tr>
				<!--Question 4 -->
				<tr>
					<td>Question 4:</td>
					<td><input type="text" name="question4" id="question4" /></td>
				</tr>
				<!--Question 5 -->
				<tr>
					<td>Question 5:</td>
					<td><input type="text" name="question5" id="question5" /></td>
				</tr>
				<!--submit -->		
				<tr>
					<td>Submit</td>
					<td><input type="submit" name="button" id="button" value="Submit" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>
<?php
	include 'includes/footer.php'; 
?>