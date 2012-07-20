<?php

require_once 'includes/dtb.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_UNSAFE_RAW);
$complimentary = filter_input(INPUT_POST, 'complimentary', FILTER_UNSAFE_RAW);
$supplimentary1 = filter_input(INPUT_POST, 'supplimentary1', FILTER_UNSAFE_RAW);
$supplimentary2 = filter_input(INPUT_POST, 'supplimentary2', FILTER_UNSAFE_RAW);

//echo($name);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if( $name == null || strlen($name) < 2) {
		$errors['name'] = true;
	
	}
	
	if(strlen($color) != 7) {
		$errors['color'] = true;
	}
	
	if(strlen($complimentary) != 7) {
		$errors['complimentary'] = true;
	}
	
	
	if(strlen($supplimentary1) != 7) {
		$errors['$supplimentary1'] = true;
	}
	
	
	if(strlen($supplimentary2) != 7) {
		$errors['supplimentary2'] = true;
	}
	
	
	

	if (empty($errors)) {
		
		
		
		$sql = $db->prepare('
			INSERT INTO color_store 
			(name, color, complimentary, supplementary1, supplementary2)
			
			VALUES 
			(:name, :color, :complimentary, :supplimentary1, :supplimentary2)
		
		');
	
		$sql->bindValue(':color', $color, PDO::PARAM_STR);
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$sql->bindValue(':complimentary', $complimentary, PDO::PARAM_STR);
		$sql->bindValue(':supplimentary1', $supplimentary1, PDO::PARAM_STR);
		$sql->bindValue(':supplimentary2', $supplimentary2, PDO::PARAM_STR);
		$sql->execute();
		var_dump($sql->errorInfo());
		//header('Location: index.php');
		//exit;
	}
}


//Loading from the database!!

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	if( $name == null || strlen($name) < 2) {
		$errors['name'] = true;
		var_dump($name);
	
	}
	

	if (empty($errors)) {
		
		
		
		$sql = $db->prepare('
			SELECT 
			name, color, complimentary, supplementary1, supplementary2
			
			FROM 
			color_store 
			
			WHERE 
			name = :name
		
		');
		
		
		$sql->bindValue(':name', $name, PDO::PARAM_STR);
		$results = $sql->fetchAll();
		$sql->execute();
		var_dump($sql->errorInfo());
	}
	
}



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
				</div>
				<div class="save-load">
					<label for="name">Selection Name
						<?php if (isset ($errors['name'])) : ?>
							<strong class="error">is required</strong>
						<?php endif ?>
					</label>
					
					<input type="text" id="name" name="name">
					
					<label for="errors">Errors</label>
					<input type="text" id="errors" name="errors">
					
				</div>
				
			</div>
		</form>
		
		<form method="post" action="index.php">
			<button id="load-btn" type="submit">Load</button>
			
			<div class="load-load">
				<label for="color">Color Code</label>
				<input type="text" id="color" name="color" value="#123456">
						
				<label for="errors">Errors</label>
				<input type="text" id="errors" name="errors">			
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
