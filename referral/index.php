<!DOCTYPE html>
<html>
<head>
<script src="javascript/jquery.js"></script>
<script src="javascript/jquery-ui.js"></script>
<script src="javascript/jquery.easing.min.js"></script>
<link rel='stylesheet' type='text/css' href='javascript/sweetalert/sweetalert.css'>
<script src='javascript/sweetalert/sweetalert.min.js'></script>
<script src="javascript/main.js"></script>
<title>HBHS Referral Form</title>
<link rel="shortcut icon" href="images/favicon.png" />
<link rel='stylesheet' type='text/css' href='css/styles.css'>
<link rel="stylesheet" href="css/jquery-ui.css">
<?php
if(isset($_GET['formCompleted'])){
  $formCompleted.=$_GET["formCompleted"];
  if ($formCompleted=="true"){
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Request success!","Your referral has been sent to senior management! Please close this page!","success");';
    echo '}, 500);</script>';
  }
  elseif ($formCompleted=="false"){
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Request failed!","Your referral has not been sent due to an internal error, please try again later or contact servicedesk@hernebayhigh.org if the issue persists!","error");';
      echo '}, 500);</script>';
  }  
}
?>
</head>	
<body>
<br><br>
<div id="wrapper">
  <img src="images/logo.png" id="HBHSLogo">
  <span id="title"> Student Referral Form </span>
</div>
  <!-- multistep form -->
  <form id="msform" action="webform.php" method="post" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Your Details</li>
      <li>Student Details</li>
      <li>Description of issue</li>
      <li>Review and Submit</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Your Details</h2>
      <h3 class="fs-subtitle">Please enter the following information</h3>
      <input type="text" id="staffName" name="staffName" placeholder="Staff Name" />
      <span class="fs-subtitle">Position: </span> <select class="select_style" id="position" name="position" placeholder="Position" >
  			<option value="">Select...</option>
  	  		<option value="HOD">HOD</option>
  	  		<option value="Teacher">Teacher</option>
  	  		<option value="LSA">LSA</option>
  	   		<option value="Cover Supervisor">Cover Supervisor</option>
  	  		<option value="LRC Staff">LRC Staff</option>
  	</select><br>
      <input type="date" id="datepicker" placeholder="Date" name="datepicker">
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Student Details</h2>
      <h3 class="fs-subtitle">Please enter the students details below</h3>
      <input type="text" id="studentName" name="studentName" placeholder="Student Name" />
      <input type="text" id="mentorGroup" name="mentorGroup" placeholder="Mentor Group" />
      <input type="text" id="subject" name="subject" placeholder="Subject" />
      <span class="fs-subtitle">Year Group:</span> <select class="select_style" name="yearGroup" id="yearGroup" placeholder="Year Group" >
  			<option value="">Select...</option>
  	  		<option value="Year 7">Year 7</option>
  	  		<option value="Year 8">Year 8</option>
  	  		<option value="Year 9">Year 9</option>
  	   		<option value="Year 10">Year 10</option>
  	  		<option value="Year 11">Year 11</option>
  	  		<option value="Year 12">Year 12</option>
  	  		<option value="Year 13">Year 13</option>
  	</select><br><br>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>    
    <fieldset>
      <h2 class="fs-title">Description of Issue</h2>
      <h3 class="fs-subtitle">Please enter as much information as you can regarding your concern</h3>
      <textarea id="description" rows="15" cols="50" placeholder="Details" name="description"></textarea>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button" value="Next" id="finalNext" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Summary</h2>
      <h3 class="fs-subtitle">Please confirm the details here before clicking submit (the submit button will not show if you have not entered ALL details), if you need to amend any data, press the previous button</h3>
      Staff Name: <span id="outputStaffName"></span><br>
      Position:<span id="outputPosition"></span> <br>
      Student Name: <span id="outputStudentName"></span><br>
      Mentor: <span id="outputMentorGroup"></span><br> 
      Subject: <span id="outputSubject"></span> <br> 
      Year Group: <span id="outputYearGroup"></span><br>
      Description: <span id="outputDescription"></span><br>
      Date: <span id="outputDate"></span><br>
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="submit" name="submit" class="submit action-button" value="Submit" id="submit"/>
    </fieldset>
  </form>
</body>
</html>