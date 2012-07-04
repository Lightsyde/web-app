// JavaScript Document

//change color value to hsl and store it in a variable
//increment H in hsl by 0.5


$(document).ready(function() {
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
				
		console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		$('#compliment').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
		//var changetoComHEX = hsL.color;
		//console.log(changetoComHEX);
		//$('#complimentary').val(changetoComHEX);
		//var comcolorValue = 
		
		
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
				
		console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		$('#suppliment1').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
		
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
				
		console.log('hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		$('#suppliment2').css('background-color', 'hsl(' + hsl[0] + ', ' + hsl[1] + '%, ' + hsl[2] + '%)');
		
	});
});