<?php
$sta1=$HTTP_GET_VARS['sta1'];
$sta2=$HTTP_GET_VARS['sta2'];
$za=$HTTP_GET_VARS['za'];
$from="wap@srb.co.yu";
$fromname = "SRB W@P email Download";
$tip=mime_content_type($sta1."/".$sta2);
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "mail.srb.co.yu";  // specify main and backup server
$mail->SMTPAuth = false;     // turn on SMTP authentication
$mail->Username = "jswan";  // SMTP username
$mail->Password = "secret"; // SMTP password

$mail->From = $from;
$mail->FromName = $fromName;
$mail->AddAddress($za);
//$mail->AddAddress("ellen@example.com");                  // name is optional
$mail->AddReplyTo($from, $fromName);

$mail->WordWrap = 0;                                 // set word wrap to 50 characters
$mail->AddAttachment("$sta1/$sta2","srb-$sta2");         // add attachments
$mail->IsHTML(false);                                  // set email format to HTML

$mail->Subject = "SRB W@P email isporuka";
$mail->Body    = "Cao, drago mi je sto ste posetili moj sajt. \r\n Narucili ste fajl: $sta2 sa http://wap.srb.co.yu sajta \r\n Pono pozdrava i navratite opet.\r\n p.s: Ako vam je stigao ovaj email a niste ga narucili, prijavite mi. Hvala. Milan\r\n";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   $sitedata["mail"] .= "Email nije poslat<br/>";
   $sitedata["mail"] .= "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

$sitedata["mail"] .= "Email sa fajlom: $sta2  poslat je na $za<br/>";
?>

