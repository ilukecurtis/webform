//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(document).ready(function() {
	$(function() {
    	$('#datepicker').datepicker({ dateFormat: 'dd-mm-yy'});
   	});
	$(".next").click(function(){
		if(animating) return false;
		animating = true;
		   
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		//activate next step on progressbar using the index of next_fs
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		
		//show the next fieldset
		next_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale current_fs down to 80%
				scale = 1 - (1 - now) * 0.2;
				//2. bring next_fs from the right(50%)
				left = (now * 50)+"%";
				//3. increase opacity of next_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({
	        'transform': 'scale('+scale+')',
	        'position': 'absolute'
	      });
				next_fs.css({'left': left, 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});

	$(".previous").click(function(){
		if(animating) return false;
		animating = true;
		
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		
		//de-activate current step on progressbar
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		
		//show the previous fieldset
		previous_fs.show(); 
		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now, mx) {
				//as the opacity of current_fs reduces to 0 - stored in "now"
				//1. scale previous_fs from 80% to 100%
				scale = 0.8 + (1 - now) * 0.2;
				//2. take current_fs to the right(50%) - from 0%
				left = ((1-now) * 50)+"%";
				//3. increase opacity of previous_fs to 1 as it moves in
				opacity = 1 - now;
				current_fs.css({'left': left});
				previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
			}, 
			duration: 800, 
			complete: function(){
				current_fs.hide();
				animating = false;
			}, 
			//this comes from the custom easing plugin
			easing: 'easeInOutBack'
		});
	});
	$(".box").click(function(){
		if($("#extraOptions").is(':visible')){
			$("#extraOptions").slideUp(500, "linear", function(){});
			$("#showText").text("Click to show additional options");
		} 
		else if($("#extraOptions").is(':hidden')){
			$("#extraOptions").slideDown(500, "linear", function(){});
			$("#showText").text("Click to hide additional options");
		} 
	});
});
function sizeSelect(){
	var size = document.getElementById("paperSize").value;
	var selectbox=document.getElementById("colour");
	var colourArray=["White", "Light Green","Light Blue", "Light Grey", "Light Lilac","Light Peach", "Light Pink","Lemon","Dark Blue","Dark Purple","Dark Orange", "Dark Green","Dark Red", "Bright Yellow", "Pale Blue"];
	document.getElementById('sides').disabled=false;
	document.getElementById('staple').disabled=false;
	document.getElementById('leaveLoose').disabled=false;

	var i;
    for(i = selectbox.options.length - 1 ; i >= 0 ; i--)
   	{
    	selectbox.remove(i);
    }
	
	if((size=="A5 Booklet")||(size=="A4 Booklet")){
    	swal("Booklet!","'Booklet' Selected. The correct values for this booklet have been selected for you","info");
		var x;
    	for(x = 0 ; x < colourArray.length ; x++)
   		{
        	var option=document.createElement("option");
    		option.text=colourArray[x];
    		option.value=colourArray[x];
    		selectbox.appendChild(option);
    	}
    	document.getElementById('sides').value='Single Side';
    	document.getElementById('staple').value = '2 Staples';
    	document.getElementById('leaveLoose').value='';
    	document.getElementById('staple').disabled=true;
    	document.getElementById('sides').disabled=true;
   		document.getElementById('leaveLoose').disabled=true;


    }
    else if((size=="A3")||(size=="A2")||(size=="A1")||(size=="A0")){
    	document.getElementById('staple').value = '';
    	document.getElementById('staple').disabled=true;
    	var option=document.createElement("option");
    	option.text="White";
    	option.value="White";
    	selectbox.appendChild(option);
    	document.getElementById('sides').value='Single Side';
    	if(size!="A3"){
    		document.getElementById('paperOrCard').value='Paper';
    		document.getElementById('sides').disabled=true;
    	}
    }
	else{
		var x;
    	for(x = 0 ; x < colourArray.length ; x++)
   		{
        	var option=document.createElement("option");
    		option.text=colourArray[x];
    		option.value=colourArray[x];
    		selectbox.appendChild(option);
    	}
		document.getElementById('staple').value = '';

    	
	}
}
/*function checkTag(){
	var inputs = document.getElementsByTagName('required');
	var inputErrors;
	for (var i = 0; i < inputs.length; i += 1) {
    	if(inputs[i] == ''){
    		inputErrors+=1;
    	}
    }
    if (document.getElementById("name").required){
		alert("errors");
	}
	else{
		alert(inputs.length);
	}
}*/
