<!DOCTYPE html>
<html>
<head>
<script src="javascript/jquery.js"></script>
<script src="javascript/jquery-ui.js"></script>
<script src="javascript/jquery.easing.min.js"></script>
<link rel='stylesheet' type='text/css' href='javascript/sweetalert/sweetalert.css'>
<script src='javascript/sweetalert/sweetalert.min.js'></script>
<script src="javascript/main.js"></script>
<title>HBHS Repro Request</title>
<link rel="shortcut icon" href="images/favicon.png" />
<link rel='stylesheet' type='text/css' href='css/styles.css'>
<link rel="stylesheet" href="css/jquery-ui.css">
<?php
if(isset($_GET['formCompleted'])){
  $formCompleted.=$_GET["formCompleted"];
  if ($formCompleted=="true"){
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Request success!","Your repro request has been sent to reprographics! Please close this page!","success");';
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
  <span id="title"> Reprographics Request Form </span>
  <span class="requestText"> Contact: example@example.com <br>
  Hours: Term time only - Mon-Thur 8-4 - Friday 8-3:30 <br>
  Please ensure all requests are made at least 24 <b>BEFORE</b> they are required. <br> </span>
</div>
  <!-- multistep form -->
  <form id="msform" action="webform.php" method="post" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Details</li>
      <li>Paper Size and Options</li>
      <li>Upload & Submit</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h2 class="fs-title">Details</h2>
      <h3 class="fs-subtitle">Please enter the following information</h3>
      <input type="text" id="name" name="name" placeholder="Name - Required" required />
      <input type="text" id="reproCode" name="reproCode" placeholder="Reprographics Code - Required" required />
      Period Required:<br> <select name="requiredFor">
          <option value="">Select...</option>
          <option value="Period 1"> Period 1 </option>
          <option value="Period 2"> Period 2 </option>
          <option value="Period 3"> Period 3 </option>
          <option value="Period 4"> Period 4 </option>
          <option value="Period 5"> Period 5 </option>
          <option value="Period 6"> Period 6 </option>
    </select><br><br>
      Date Print Required: <input type="date" id="datepicker" placeholder="Date - Required" name="datepicker" required>
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
      <h2 class="fs-title">Paper Size and Options</h2>
      <h3 class="fs-subtitle">Please choose options</h3>
     Number of Copies: <input type="text" name="numCopies" placeholder="e.g. 10 - Required" required>  
      Ink: <select name="inkType" required>
        <option value="Black And White">Mono</option>
        <option value="Colour">Colour</option>
    </select>
  <br>
  Size/Booklet: <select name="size" id="paperSize" onchange="sizeSelect()" required>
        <option value="A4">A4</option>
        <option value="A5">A5</option>
        <option value="A5 Booklet">A5 Booklet</option>
        <option value="A4 Booklet">A4 Booklet</option>
        <option value="A3">A3</option>
        <option value="A2">A2 (Poster)</option>
        <option value="A1">A1 (Poster)</option>
        <option value="A0">A0 (Poster)</option>
    </select><br>
  Sides: <select name="sides" id="sides" onchange="sizeSelect()"  required>
      <option value="Single Side">Single Sided</option>
      <option value="Double Side">Double Sided</option>
    </select>
  <br>
  Paper or Card?: <select name="paperOrCard" id="paperOrCard" required>
        <option value="Paper">Paper</option>
        <option value="Card">Card</option>
    </select><br>
  
  Colour: <select name="colour" id="colour" required>
      <option value="White">White</option>
        <option value="Light Green">Light Green</option>
        <option value="Light Blue">Light Blue</option>
        <option value="Light Grey">Light Grey</option>
        <option value="Light Lilac">Light Lilac</option>
        <option value="Light Peach">Light Peach</option>
        <option value="Light Pink">Light Pink</option>
        <option value="Lemon">Lemon (Yellow)</option>
        <option value="Dark Blue">Dark Blue (Neptune)</option>
        <option value="Dark Green">Dark Green (Saturn)</option>
        <option value="Dark Orange">Dark Orange</option>
        <option value="Dark Purple">Dark Purple (Mercury)</option>
        <option value="Dark Red">Dark Red (Venus)</option>
        <option value="Bright Yellow">Bright Yellow (Jupiter)</option>
        <option value="Bright Yellow">Pale Blue</option>

    </select><br>
    Special Instructions: <br><textarea rows=2 cols=50 name="specialInstructions" placeholder="E.g. PVC Covers, Coil Bound, Headed Paper"></textarea>
  <br><br>
    <div class="arrow_box box"><a id="showText">Click for additional options</a></div><br>
    <div id="extraOptions">
    <div id="postCardText"> Post Cards: </div><input type="checkbox" name="postcards" value="postcards">
    Guillotine: <select name="guillotine">
        <option value="">None</option>
        <option value="Guillotine In Half"> Guillotine in Half</option>
        <option value="Guillotine Crop Marks"> Guillotine Crop Marks </option>
      </select>
    <br>
    Staple: <select name="staple" id="staple">
        <option value="">None</option>
        <option value="1 Staple"> 1 Stape</option>
        <option value="2 Staples"> 2 Staples </option>
      </select>
    <br><br>
    Two Hole Punched:<input type="checkbox" name="twoHolePunched" value="twoHolePunched">
    Leave Loose: <select name="leaveLoose" id="leaveLoose">
        <option value="">No Preference</option>
        <option value="Collated"> Collated</option>
        <option value="Stack"> Stack </option>
      </select>
    <br><br>
    </div>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>  
    <fieldset>
      <h2 class="fs-title">File Upload - Required</h2>
      <h3 class="fs-subtitle">Attach file required below</h3>
      <input type="file" name="attachment" required> 
      <input type="button" name="previous" class="previous action-button" value="Previous" />
      <input type="submit" name="submit" class="submit action-button" value="Submit" id="submit"/>
    </fieldset>
  </form>
</body>
</html>