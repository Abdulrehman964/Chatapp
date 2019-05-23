<?php 
//require '../practice/wtlpro/PHPMailerAutoload.php';
require_once (dirname(__FILE__) .'/PHPMailerAutoload.php');
$mail= new PHPMailer;

$mail->isSMTP();

$mail->Host="smtp.gmail.com";
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='divyapomendkar@gmail.com';
$mail->Password="dsp@11054";

$mail->setFrom('divyapomendkar@gmail.com');

$mail->addAddress('divyapomendkar@gmail.com');
$mail->addReplyTo('divyapomendkar@gmail.com');

$mail->isHtml(true);
$mail->Subject="Sending mails via php";
$mail->Body="<h1 align=center>Taylor Swift</h1><br> <h4 align=center>She the best</h4> ";

if(!$mail->send())
{
    echo "crap";

}
else{
    echo 'not crap!!!!';
}
?>