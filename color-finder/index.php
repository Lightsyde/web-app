<?php

require_once 'includes/dtb.php';
//require_once 'load.php';

$errors = array();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_UNSAFE_RAW);
$complimentary = filter_input(INPUT_POST, 'complimentary', FILTER_UNSAFE_RAW);
$supplimentary1 = filter_input(INPUT_POST, 'supplimentary1', FILTER_UNSAFE_RAW);
$supplimentary2 = filter_input(INPUT_POST, 'supplimentary2', FILTER_UNSAFE_RAW);


$load = filter_input(INPUT_POST, 'load', FILTER_SANITIZE_STRING);
//var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	if(isset($_POST['saving'])) {
		
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
			//var_dump($sql->errorInfo());
		//header('Location: index.php');
		//exit;
		}
		//loading aspect
		
		if( $name == null || strlen($name) < 2) {
			$errors['name'] = true;
			
	
		}
	}

//Loading from the database!!

	if(isset($_POST['loading'])) {
			//if (empty($errors)) {
	
		
			$sql = $db->prepare('
				SELECT 
				name, color, complimentary, supplementary1, supplementary2
			
				FROM 
				color_store 
				
				WHERE 
				name = :load
		
			');
		
		
			$sql->bindValue(':load',$load, PDO::PARAM_STR);
			$sql->execute();
			$results = $sql->fetch();
			
			//var_dump($sql->errorInfo());
			//var_dump($results);
			
		//}
	
		
//	}
		
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
		
		<div id="cover">		
			
			
		
			<div id="divtotal">
				
				<form method="post" action="index.php">
					
					<input type="hidden" value="saving" name="saving">
					
					<div id="title">
						
					</div>
					<div class="contain">
						<label for="color">Color Code</label>
						<input type="text" id="color" name="color" value="<?php if(isset($results)) {echo $results['color'];}?>">
						
						<div id="colorpicker" class="colorbox">
						</div>
						
						<label for="complimentary">Complimentary</label>
						<input type="text" id="complimentary" name="complimentary" value="<?php if(isset($results)) {echo $results['complimentary'];}?>">
						<div id="compliment" class="colorbox">
						</div>
					</div>
					
					
					<div class="contain">
						<label for="supplimentary1">Supplementary1</label>
						<input type="text" id="supplimentary1" name="supplimentary1" value="<?php if(isset($results)) {echo $results['supplementary1'];}?>">
						<div id="suppliment1" class="colorbox">
						</div>
						
						<label for="supplimentary2">Supplementary2</label>
						<input type="text" id="supplimentary2" name="supplimentary2" value="<?php if(isset($results)) {echo $results['supplementary2'];}?>">
						<div id="suppliment2" class="colorbox">
						</div>
					</div>
					
					
					
				 
						<!--<div>	
						
						</div> -->
						<div class="save-load">
						 <button id="save-btn" type="submit">Save</button>
						
							<label for="name">Selection Name
								<?php if (isset ($errors['name'])) : ?>
									<strong class="error">is required</strong>
								<?php endif ?>
							</label>
							
							<input type="text" id="name" name="name">
							
							
							
						</div>
						
					
				</form>
				
				<form method="post" action="index.php">
					
					<input type="hidden" value="loading" name="loading">
					
					
						
					<div class="load-load">
					<button id="load-btn" type="submit">Load</button>
					
					
					<label for="load">Selection to Load</label>
					<input type="text" id="load" name="load">	
					
					
								
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
			</div>
		</div>
	</body>
</html>
