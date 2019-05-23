<?php
session_start();
////////////////Login
$password1 = $_POST['password'];
$email=$_POST['email'];

$_SESSION["emailuser"] = $email ;


$servername = "localhost";
$username = "root";
$password= "";
$dbname="collegewtl";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT id,email,pwd,verify FROM createlog ";

$result = $conn->query($sql);

if($result->num_rows>0)
{
        while($row=$result->fetch_assoc())
        {
            if($row["email"]==$email&&$row["pwd"]==$password1&&$row["verify"]=="Yes")
            {
            
                $_SESSION["userid1"]=$row["id"];
                
                header("Location:/practice/wtlpro/convo.php");
                
            }
            
        }
}