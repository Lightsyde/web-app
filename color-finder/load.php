<?php
//header ('Location: index.php');
/**
 *Small description of this file:
 *Lists all the dinosaurs in the database
 *
 *@author Lightsyde (Titar Awua-Imande) <taimande@gmail.com>
 *@copyright 2012 Titar Awua Imande
 *@licence BSD-3-Clause <http://github.com/..../licence.txt>
 *@version 1.0.0
 *@package Dinosaurs\Controllers
*/
require_once 'index.php';

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
<title>Load color selection</title>
</head>

<body>
<form method="post" action="load.php">
		
			
			<button id="load-btn" type="submit">Load</button>
			
			
			<label for="load-name">Selection to Load</label>
			<input type="text" id="load-name" name="load-name">	
				
			<div class="load-load">
				<label for="getcolor">Base Color</label>
				<input type="text" id="getcolor" name="getcolor" value="">
						
				<label for="getcomp">Complimentary</label>
				<input type="text" id="getcomp" name="getcomp">	
				
				<label for="getsup">Supplimentary</label>
				<input type="text" id="getsup" name="getsup">		
				
				<label for="getsup2">Complimentary</label>
				<input type="text" id="getsup2" name="getsup2">		
				
						
			</div>
<script src="js/color-finder.js"></script>
</body>
</html>