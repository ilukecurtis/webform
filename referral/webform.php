<?php
//LUKE CURTIS 2016
require 'php/PHPMailerAutoload.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;  

$referralArray=array();
array_push($referralArray, $_POST["staffName"], $_POST["position"], $_POST["mentorGroup"], $_POST["studentName"], $_POST["subject"], $_POST["yearGroup"], $_POST["description"], $_POST["datepicker"]);
$stringArray=array();
array_push($stringArray, "Staff Name", "Position", "Mentor Group", "Student Name", "Subject", "Year Group", "Description", "Date", "Key Stage");

if((strcmp($_POST["yearGroup"],'Year 7')==0)||(strcmp($_POST["yearGroup"],'Year 8')==0)||(strcmp($_POST["yearGroup"],'Year 9')==0)){
    array_push($referralArray, "Key Stage 4");
}
elseif ((strcmp($_POST["yearGroup"],'Year 10')==0)||(strcmp($_POST["yearGroup"],'Year 11')==0)) {
    array_push($referralArray, "Key Stage 5");
}
else{
	array_push($referralArray, "Key Stage 6");
}
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.example.org';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
//$mail->Username = 'user@example.com';                 // SMTP username
//$mail->Password = 'secret';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
$mail->setFrom('noreply@example.org', "Learning Referral");
$mail->addAddress('example@example.org', 'example');     // Add a recipient
$mail->Subject = 'Referral from: '.$_POST["staffName"]. '.';
$mail->Body = "<h1> Referral Form:</h1><br>";

$arrlength=count($referralArray);
for($x = 0; $x < $arrlength; $x++) {
    //$mail->Body .= "$requestArray[$x] '<br>'";
    $string=str_replace("'", "", $stringArray[$x]);
    $data=str_replace("'", "", $referralArray[$x]);
    $mail->Body .= "<p>$string : $data </p>";
}

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->IsHTML(true);  

if(!$mail->send()) {
   header( 'Location: index.php?formCompleted=false' ) ;
}
else{
	header( 'Location: index.php?formCompleted=true' ) ;
}
?>