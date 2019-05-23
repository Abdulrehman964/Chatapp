<?php 
//require '../practice/wtlpro/PHPMailerAutoload.php';
require_once (dirname(__FILE__) .'/PHPMailerAutoload.php');
$mail= new PHPMailer;

$mail->isSMTP();

$mail->Host="smtp.gmail.com";
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='/*your mailid*/';
$mail->Password="/*password*/";

$mail->setFrom('/*your mailid*/');

$mail->addAddress('/*recievers mail id*/');
$mail->addReplyTo('/*your mailid*/');

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
