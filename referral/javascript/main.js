//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
$(document).ready(function() {
	$(document).on("keypress", 'form', function (e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
	});
	$(function() {
    	$('#datepicker').datepicker({ dateFormat: 'dd-mm-yy'}).datepicker("setDate", new Date());
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
/*
	$(".submit").click(function(){
		return false;
	})*/
document.getElementById("finalNext").addEventListener("click", function(){
	document.getElementById("submit").style.display='inline-block';
	var orderedArrayNames=["Staff Name","Staff Position", "Mentor Group", "Student Name", "Subject", "Year Group", "Description", "Date"];


    var staffName=document.getElementById("staffName").value;
    var position=document.getElementById("position").value;
    var mentorGroup=document.getElementById("mentorGroup").value;
    var studentName=document.getElementById("studentName").value;
    var subject=document.getElementById("subject").value;
    var yearGroup=document.getElementById("yearGroup").value;
    var description=document.getElementById("description").value;
    var date=document.getElementById("datepicker").value;

    var referralArray=[staffName,position,mentorGroup,studentName,subject,yearGroup,description,date];
    var missingValues=[];
    for (i = 0; i < referralArray.length; i++) {
		if(referralArray[i]===""){
			missingValues.push(i);
		}
	}
	var missingNames=[];
	for (x = 0; x < missingValues.length; x++){
		var missingVal = missingValues[x];
		missingNames.push(orderedArrayNames[missingVal]);
	}

    document.getElementById("outputStaffName").innerHTML=staffName;
    document.getElementById("outputPosition").innerHTML=position;
    document.getElementById("outputStudentName").innerHTML=studentName;
    document.getElementById("outputMentorGroup").innerHTML=mentorGroup;
    document.getElementById("outputSubject").innerHTML=subject;
    document.getElementById("outputYearGroup").innerHTML=yearGroup;
    document.getElementById("outputDescription").innerHTML=description;
    document.getElementById("outputDate").innerHTML=date;
    
    if(missingNames.length > 0){
		swal('User error', 'You are missing: ' + missingNames +'! Please amend these details before submitting!',"error");
		document.getElementById("submit").style.display='none';
	}

});

})