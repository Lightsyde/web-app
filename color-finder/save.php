<?php

require_once 'includes/dtb.php';
require_once 'index.php';
/*
$sql = $db->query('

		SELECT id,name,base,complimentary,supplementary-1,supplementary-2 
		FROM color-store
		WHERE 



');

*/

$base = $_POST['color'];
print($base);

?>

<div>
	<label for="name-save">Name</label>
	<input type="text" id="name-save" name="name-save">
					
	<label for="base">Base color</label>
	<input type="text" id="base" name="base">
					
	<label for="compliment-save">Complementary</label>
	<input type="text" id="compliment-save" name="compliment-save">
					
	<label for="suppliment1-save">Supplementary 1</label>
	<input type="text" id="suppliment1-save" name="suppliment1-save">
			
	<label for="suppliment2-save">Supplementary 2</label>
 	<input type="text" id="suppliment2-save" name="suppliment2-save">
</div>

