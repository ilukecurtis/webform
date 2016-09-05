<?php
//LUKE CURTIS 2016
require 'php/PHPMailerAutoload.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;     

$requestArray=array();

$name="Name: ";
$name.=$_POST["name"];
$reproCode="Reprographics Code: ";
$reproCode.=$_POST["reproCode"];
$numCopies="Number of copies: ";
$numCopies.=$_POST["numCopies"];
$inkType="Ink Type: ";
$inkType.=$_POST["inkType"]; //DROP DOWN
$size="Paper Size: ";
$size.=$_POST["size"]; //DROP DOWN
$paperOrCard="Paper or Card?: ";
$paperOrCard.=$_POST["paperOrCard"]; //DROP DOWN
$colour="Colour: ";
$colour.=$_POST["colour"]; //DROP DOWN
$guillotine="Guillotine: ";
if($_POST["guillotine"] !== ""){
	$guillotine.=$_POST["guillotine"]; //DROP DOWN
}
else{
	$guillotine.="No option selected"; //DROP DOWN
}
$staple="Staples: ";
if($_POST["staple"] !== ""){
	$staple.=$_POST["staple"]; //DROP DOWN
}
else{
	$staple.="No option selected"; //DROP DOWN
}
$leaveLoose="Leave loose: ";
if($_POST["leaveLoose"] !== ""){
	$leaveLoose.=$_POST["leaveLoose"]; //DROP DOWN
}
else{
	$leaveLoose.="No option selected"; //DROP DOWN
}
$specialInstructions="Special Instructions: ";
$specialInstructions.=$_POST["specialInstructions"];
$requiredFor="Required for: ";
if($_POST["requiredFor"] !== ""){
	$requiredFor.=$_POST["requiredFor"]; //DROP DOWN
}
else{
	$requiredFor.="No lesson selected"; //DROP DOWN
}
$requiredFor.="-"; //DROP DOWN
$requiredFor.=$_POST["datepicker"]; //DATE

array_push($requestArray, $name, $reproCode, $numCopies, $inkType, $size, $paperOrCard, $colour, $guillotine, $staple, $leaveLoose, $specialInstructions, $requiredFor);

if(isset($_POST['postcards'])){
	$postcards="Postcards: True"; 
	array_push($requestArray, $postcards);
}


if(isset($_POST['twoHolePunched'])){
	$twoHolePunched="2 Hole Punched: True"; 
	array_push($requestArray, $twoHolePunched);
}

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.kcn.org.uk';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
//$mail->Username = 'user@example.com';                 // SMTP username
//$mail->Password = 'secret';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('noreply@example.org', "Reprographics Request");
$mail->addAddress('example@example.org', 'J SMITH');     // Add a recipient

$mail->Subject = 'Reprographics Request from: '.$_POST["name"]. '.';
$mail->Body = "<h1>Reprographics Request Form:</h1><br>";

$arrlength=count($requestArray);
for($x = 0; $x < $arrlength; $x++) {
    //$mail->Body .= "$requestArray[$x] '<br>'";
    $string = str_replace("'", "", $requestArray[$x]);
    $mail->Body .= "<p>$string</p>";
}
$mail->AltBody = 'Please contact Luke at Service Desk if you receive this. An error has occured.';
$mail->IsHTML(true);  
$mail->AddAttachment($_FILES['attachment']['tmp_name'],$_FILES['attachment']['name']);


if(!$mail->send()) {
   header( 'Location: index.php?formCompleted=false' ) ;
}
else{
	header( 'Location: index.php?formCompleted=true' ) ;
}
?>
