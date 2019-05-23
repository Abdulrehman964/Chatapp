<?php

$fname=$_POST['fname'];
$lname = $_POST['lname'];
$password1 = $_POST['password'];

$email=$_POST['email'];
$gender=$_POST['gender'];
$BirthDate=$_POST['BirthDate'];
$BirthMonth=$_POST['BirthMonth'];
$BirthYear=$_POST['BirthYear'];
$age=$_POST['age'];

$Birth=$BirthYear.'/'.$BirthMonth.'/'.$BirthDate;

$_SESSION["fname"] = $fname;
$_SESSION["email"] = $email;

$servername = "localhost";
$username = "root";
$password= "";
$dbname="collegewtl";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1="SELECT * FROM verification";
$result1=$conn->query($sql1);
if($result1->num_rows>0)
{
    while($row1=$result1->fetch_assoc())
    {
        if($row1['gmail']==$email)
        {
            header('Location:/practice/wtlpro/errorcreatedacc.html');
            die();
        }
    }
}


$sql = "INSERT INTO createlog (fname, lname, email,gender,birthday,pwd,age) VALUES ('$fname', '$lname', '$email','$gender','$Birth','$password1','$age')";
$code=rand(1000,100000);


/////////////////////////////////gmail
////////////////////////////
/////////////////////////////////
require_once (dirname(__FILE__) .'/PHPMailerAutoload.php');
$mail= new PHPMailer;

$mail->isSMTP();

$mail->Host="smtp.gmail.com";
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';

$mail->Username='/*your mailid*/';
$mail->Password="/*your password*/";

$mail->setFrom('/*your mailid*/');

$mail->addAddress($email); /*recievers mail id*/
$mail->addReplyTo('/*your mailid*/');

$mail->isHtml(true);
$mail->Subject="Sending mails via php";
$mail->Body="<h1 align=center>This is the Verification Code For your SdS Chat Account.</h1><br><h1  align=center>";
$mail->Body.=$code;
$mail->Body.="</h1><br><h4 align=center>It can Be used only once.</h4> ";



if(!$mail->send())
{
    echo "crap";

}
else{
    echo 'not crap!!!!';
}

///////////////////////////////
///////////////////////////////
////////////////////////////////


$sql2="INSERT INTO verification VALUES ('$email',$code)";

if(mysqli_query($conn, $sql2)){

echo ("code added");
}

if(mysqli_query($conn, $sql)){
    echo "Records added successfully.";
    //header("Location:/practice/wtlpro/Login.html");

    //echo ("oh yes!!");
    header("Location:/practice/wtlpro/Verification.html");
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


?>
