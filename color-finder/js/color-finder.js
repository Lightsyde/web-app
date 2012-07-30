// JavaScript Document

//remove invisibility of the name text field

$(document).ready(function() {
		//$('.load-load').hide();
		
		
		/*$('#color').on('change', function() {
				var colorChange = $('#color').val();
				$('#color').val(colorChange);
				
			});*/
			
			
			
			//For loading colors from database
	var sup1 = $('#supplimentary1').val();
	
	
		$('#suppliment1').css('background-color', sup1);
		
		
	var sup2 = $('#supplimentary2').val();
	
	
		$('#suppliment2').css('background-color', sup2);
		
		
	var commed = $('#complimentary').val();
	
	
		$('#compliment').css('background-color', commed);
		
	
	var origin = $('#color').val();
	
		$('#colorpicker').css('background-color', origin);
			//loading ends
			
			
			
			
	$('#colorpicker').farbtastic(function (color) {		

		//this.setColor('#ffffff');
		
		$('#color').val(color);
		
		var origin = $('#color').val();
	
		$('#colorpicker').css('background-color', origin);
		
		
		
		
		/*$('#color').on('change', function() {
				var colorChange = $('#color').val();
				$('#color').setColor(colorChange);
				
			});*/
			
			//console.log(colorChange);*/
		
		var changetoHSL = $.farbtastic('#colorpicker').hsl;
		var hue = changetoHSL[0];
		var compliment = 0;
		
		
		if (hue < .5) {
			compliment = hue + .5;
		}else{
			compliment = hue - .5;
		}
		
		var hsl = [
			Math.round(compliment * 360)
			, Math.round(changetoHSL[1] * 100)
			, Math.round(changetoHSL[2] * 100)
		]
		
		$('#compliment').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
		
		var utterComHex = $.colors($('#compliment').css('background-color')).toString('hex');
		$('#complimentary').val(utterComHex);
		//var utterComHex = $('#compliment').val('hex');
		
		
		
		
		
		
		
		
		
		//Supplementary one
		if (hue < .5) {
			compliment = hue + .05;
		}else{
			compliment = hue - .05;
		}
		
		var hsl = [
			Math.round(compliment * 360)
			, Math.round(changetoHSL[1] * 100)
			, Math.round(changetoHSL[2] * 100)
		]
				
	
		$('#suppliment1').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
		var utterSupHex = $.colors($('#suppliment1').css('background-color')).toString('hex');
		$('#supplimentary1').val(utterSupHex);
		
		
		
		
		
		
		
		
		
		//Supplementary two
		if (hue < .5) {
			compliment = hue + -.04;
		}else{
			compliment = hue - -.04;
		}
		
		var hsl = [
			Math.round(compliment * 360)
			, Math.round(changetoHSL[1] * 100)
			, Math.round(changetoHSL[2] * 100)
		]
				
		//console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		$('#suppliment2').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
		var utterSup2Hex = $.colors($('#suppliment2').css('background-color')).toString('hex');
		$('#supplimentary2').val(utterSup2Hex);
		
		
		
		$('#color').on('change', function() {
				var colorChange = $('#color').val();
				$('#color').val(colorChange);
				
			});
		
		
		
			
		
	});
	
	$('#load-btn').on('click', function(ev) {
				
				
				$('.load-load').show();
				var colorChange = $('#getcolor').val();
				$('#color').val(colorChange);
				
			}); 
			
});





//Trashed codes
/*
//var trueHexa = hsl[0] 
		//var trueHexb = hsl[1]
		//var trueHexc = hsl[2]	
		
		
		//var trueHex = $.colors( 'hsl(hsl[0],hsl[1] + '%',hsl[2] + '%')' ).toString('hex');
		//$('#complimentary').val(trueHex);
		//console.log(trueHex);
		
		
		
		//console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');

	//console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');

*/