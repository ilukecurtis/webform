<?php
//LUKE CURTIS 2016
require 'php/PHPMailerAutoload.php';

$mail = new PHPMailer;
//$mail->SMTPDebug = 3; 
$mail->IsHTML(true);   

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
$mail->Host = 'example.example';  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
//$mail->Username = 'user@example.com';                 // SMTP username
//$mail->Password = 'secret';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->setFrom('noreply@example.org', "Reprographics Request");
$mail->addAddress('a.eagle@example.org', 'A EAGLE');     // Add a recipient
$mail->AddEmbeddedImage('img/banner.jpg', 'banner');
$mail->AddEmbeddedImage('img/logo.jpg', 'logo');
$mail->Subject = 'Reprographics Request from: '.$_POST["name"]. '.';

$mail->Body .= "
      <style type='text/css'>
         /* Client-specific Styles */
         div, p, a, li, td { -webkit-text-size-adjust:none; }
         #outlook a {padding:0;} /* Force Outlook to provide a 'view in browser' menu link. */
         html{width: 100%; }
         body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
         /* Prevent Webkit and Windows Mobile platforms from changing default font sizes, while not breaking desktop design. */
         .ExternalClass {width:100%;} /* Force Hotmail to display emails at full width */
         .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;} /* Force Hotmail to display normal line spacing. */
         #backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
         img {outline:none; text-decoration:none;border:none; -ms-interpolation-mode: bicubic;}
         a img {border:none;}
         .image_fix {display:block;}
         p {margin: 0px 0px !important;}
         table td {border-collapse: collapse;}
         table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }
         a {color: #33b9ff;text-decoration: none;text-decoration:none!important;}
         /*STYLES*/
         table[class=full] { width: 100%; clear: both; }
         /*IPAD STYLES*/
         @media only screen and (max-width: 640px) {
         a[href^='tel'], a[href^='sms'] {
         text-decoration: none;
         color: #33b9ff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {
         text-decoration: default;
         color: #33b9ff !important;
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 440px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 420px!important;text-align:center!important;}
         img[class=banner] {width: 440px!important;height:220px!important;}
         img[class=col2img] {width: 440px!important;height:220px!important;}
         }
         /*IPHONE STYLES*/
         @media only screen and (max-width: 480px) {
         a[href^='tel'], a[href^='sms'] {
         text-decoration: none;
         color: #33b9ff; /* or whatever your want */
         pointer-events: none;
         cursor: default;
         }
         .mobile_link a[href^='tel'], .mobile_link a[href^='sms'] {
         text-decoration: default;
         color: #33b9ff !important; 
         pointer-events: auto;
         cursor: default;
         }
         table[class=devicewidth] {width: 280px!important;text-align:center!important;}
         table[class=devicewidthinner] {width: 260px!important;text-align:center!important;}
         img[class=banner] {width: 280px!important;height:140px!important;}
         img[class=col2img] {width: 280px!important;height:140px!important;}
         }
      </style>
   </head>
   <body>
<!-- Start of preheader 
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='preheader' >
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <!-- Spacing 
                              <tr>
                                 <td width='100%' height='20'></td>
                              </tr>
                              <!-- Spacing                               <tr>
                                 <td width='100%' align='left' valign='middle' style='font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #FFFFFF' st-content='preheader'>
                                    Cant see this Email? View it in your <a href='#' style='text-decoration: none; color: #470508'>Browser </a> 
                                 </td>
                              </tr>
                              <!-- Spacing
                              <tr>
                                 <td width='100%' height='20'></td>
                              </tr>
                              <!-- Spacing 
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of preheader -->    
<!-- Start of header -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='header'>
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table width='600' bgcolor='#470508' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <tr>
                                 <td>
                                    <!-- logo -->
                                    <table bgcolor='#FFFFFF' width='140' align='left' border='0' cellpadding='0' cellspacing='0' class='devicewidth'>
                                       <tbody>
                                          <tr>
                                             <td width='140' height='50' align='center'>
                                                <div class='imgpop'>
                                                   <a target='_blank' href='#'>
                                                   <img src='cid:logo' alt='' border='0' width='140' height='50' style='display:block; border:none; outline:none; text-decoration:none;'>
                                                   </a>
                                                </div>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!-- end of logo -->
                                    <!-- start of menu -->
                                    <table bgcolor='#470508' width='250' height='50' border='0' align='right' valign='middle' cellpadding='0' cellspacing='0' border='0' class='devicewidth'>
                                       <tbody>
                                          <tr>
                                             <td height='50' align='center' valign='middle' style='font-family: Helvetica, arial, sans-serif; font-size: 13px;color: #FFFFFF' st-content='menu'>
                                                <a href='https://www.klz.org.uk/schools/8865448/Staff/SitePages/Home.aspx' style='color: #FFFFFF;text-decoration: none;'>Portal</a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a href='http://5448-whd-001.school.hernebayhigh.org:8081' style='color: #FFFFFF;text-decoration: none;'>Support</a>
                                                &nbsp;&nbsp;&nbsp;
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                    <!-- end of menu -->
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of Header -->
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr>
                     <td align='center' height='30' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator --> 
<!-- Start of main-banner -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='banner'>
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
                           <tbody>
                              <tr>
                                 <!-- start of image -->
                                 <td align='center' st-image='banner-image'>
                                    <div class='imgpop'>
                                       <a target='_blank' href='#'><img width='600' border='0' height='300' alt='' border='0' style='display:block; border:none; outline:none; text-decoration:none;' src='cid:banner' class='banner'></a>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <!-- end of image -->
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of main-banner -->  
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr>
                     <td align='center' height='30' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator -->   
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr>
                     <td align='center' height='30' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator -->   
<!-- start of Full text -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='full-text'>
   <tbody>
      <tr>
         <td>
            <table width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table bgcolor='#ffffff' width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td height='20' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td>
                                    <table width='560' align='center' cellpadding='0' cellspacing='0' border='0' class='devicewidthinner'>
                                       <tbody>
                                          <!-- Title -->
                                          <tr>
                                             <td style='font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #000000; text-align:center; line-height: 24px;'>
                                                Reprographics request details
                                             </td>
                                          </tr>
                                          <!-- End of Title -->
                                          <!-- spacing -->
                                          <tr>
                                             <td width='100%' height='15' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                          </tr>
                                          <!-- End of spacing -->
                                          <!-- content -->
                                          <tr>
                                             <td style='font-family: Helvetica, arial, sans-serif; font-size: 14px; color: #000000; text-align:center; line-height: 24px;'>";
$arrlength=count($requestArray);
for($x = 0; $x < $arrlength; $x++) {
//$mail->Body .= "$requestArray[$x] '<br>'";
$string = str_replace("'", "", $requestArray[$x]);
$mail->Body .= "<p>$string</p>";
}
$mail->Body .= "		
                                             </td>
                                          </tr>
                                          <!-- End of content -->
                                          <!-- Spacing -->
                                          <tr>
                                             <td width='100%' height='15' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                                          </tr>
                                          <!-- Spacing -->
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td height='20' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of Full Text -->
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr>
                     <td align='center' height='30' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator --> 
<!-- Start of seperator -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='seperator'>
   <tbody>
      <tr>
         <td>
            <table width='600' align='center' cellspacing='0' cellpadding='0' border='0' class='devicewidth'>
               <tbody>
                  <tr>
                     <td align='center' height='30' style='font-size:1px; line-height:1px;'>&nbsp;</td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of seperator -->
<!-- Start of footer -->
<table width='100%' bgcolor='#fcfcfc' cellpadding='0' cellspacing='0' border='0' id='backgroundTable' st-sortable='footer'>
   <tbody>
      <tr>
         <td>
            <table width='600' bgcolor='#470508' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
               <tbody>
                  <tr>
                     <td width='100%'>
                        <table bgcolor='#470508' width='600' cellpadding='0' cellspacing='0' border='0' align='center' class='devicewidth'>
                           <tbody>
                              <!-- Spacing -->
                              <tr>
                                 <td height='10' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td style='font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #FFFFFF; text-align:center; line-height: 24px;'>
                                    Herne Bay High School - Reprographics Request Form
                                 </td>
                              </tr>
                              <!-- Spacing -->
                              <tr>
                                 <td height='10' style='font-size:1px; line-height:1px; mso-line-height-rule: exactly;'>&nbsp;</td>
                              </tr>
                              <!-- Spacing -->
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </td>
      </tr>
   </tbody>
</table>
<!-- End of footer -->  
   </body>
   </html>";

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
