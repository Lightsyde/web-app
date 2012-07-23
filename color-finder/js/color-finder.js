// JavaScript Document

//remove invisibility of the name text field

$(document).ready(function() {
		//$('.load-load').hide();
	$('#colorpicker').farbtastic(function (color) {
		$('#color').val(color);
		
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
		//var trueHexa = hsl[0] 
		//var trueHexb = hsl[1]
		//var trueHexc = hsl[2]	
		
		
		//var trueHex = $.colors( 'hsl(hsl[0],hsl[1] + '%',hsl[2] + '%')' ).toString('hex');
		//$('#complimentary').val(trueHex);
		//console.log(trueHex);
		
		
		
		//console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
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
				
		//console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		$('#suppliment1').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
		var utterSupHex = $.colors($('#suppliment1').css('background-color')).toString('hex');
		$('#supplimentary1').val(utterSupHex);
		
		
		//Supplementary two
		if (hue < .5) {
			compliment = hue + -.05;
		}else{
			compliment = hue - -.05;
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
		
		
		
		
		
		
		
			$('#load-btn').on('click', function(ev) {
				
				
				$('.load-load').show();
				var colorChange = $('#getcolor').val();
				$('#color').val(colorChange);
				
			}); 
			/*$('#color').on('change', function() {
				var colorChange = $('#color').val();
				$('#color').val(colorChange);
				
			});*/
		
	});
	
	
});