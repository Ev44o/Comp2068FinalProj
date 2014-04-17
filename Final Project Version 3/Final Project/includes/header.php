<!--
File Name: header.php
Author Name: Jordan Cooper
Website Name: header.php
Description: This is an included asset, this will house the navigation bar for our site
		     allowing for change to be done quickly as changes will be done here instead of
			 on each individual page.
			 This will also house the required header information, such as title
			 style sheets, and google fonts.
 -->
<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/styles.css" />

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Della+Respira">
    <style>
      body {
        font-family: 'Della Respira', serif;
      }
    </style>
<script src="js/modernizr.js"></script>
<!-- add print script -->
<script src="js/printStats.js"></script>
</head>
	<body>
	
		<?php include 'includes/nav.php'; ?>
 
