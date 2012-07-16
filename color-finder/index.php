<?php

require_once 'includes/dtb.php';





?>




<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>Color Finder</title>
		<link href="css/farbtastic.css" rel="stylesheet">
		<link href="css/general.css" rel="stylesheet">
	</head>

	<body>
	
		<form method="post" action="index.php">
		
			<label for="color">Color Code</label>
			<input type="text" id="color" name="color" value="#123456">
			<div id="colorpicker">
			</div>
			
			<label for="complimentary">Complimentary</label>
			<input type="text" id="complimentary" name="complimentary" >
			<div id="compliment">
			</div>
			
			<label for="supplimentary1">Supplementary1</label>
			<input type="text" id="supplimentary1" name="supplimentary1" >
			<div id="suppliment1">
			</div>
			
			<label for="supplimentary2">Supplementary2</label>
			<input type="text" id="supplimentary2" name="supplimentary2" >
			<div id="suppliment2">
			</div>
			
			<div>
				<div>	
				<button id="save-btn" type="submit">Save</button>
					
				
				<button>Load</button>
				</div>
				<div class="save-load">
					<label for="name-save">Name</label>
					<input type="text" id="name-save" name="name-save">
					
				</div>
			</div>
		</form>
		
	
		
			
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		
		
		<script src="js/jquery.colors.bundle.min.js"></script>
		<script src="js/farbtastic.js">
			
		</script>
		<script src="js/color-finder.js">
			$(document).ready(function() {
				$('#colorpicker').farbtastic('#color');
				
			});
		</script>
	</body>
</html>
