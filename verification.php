<?php 
//require '../practice/wtlpro/PHPMailerAutoload.php';
$gmail=$_POST["gmail"];
$code=$_POST["code"];

$servername = "localhost";
$username = "root";
$password= "";
$dbname="collegewtl";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM verification";
$result=$conn->query($sql);

echo("1");
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        if($row["gmail"]==$gmail && $row["code"]==$code)
        {
            echo("1");
            $sql1="SELECT * FROM createlog";
            $result1=$conn->query($sql1);
            if($result1->num_rows>0)
            {
                echo("1");
                while($row1=$result1->fetch_assoc())
                {
                    echo("1");
                    if($row1["email"]==$gmail)
                    {
                        echo("yes");

                        $sql2="UPDATE createlog set verify='Yes' where email='$gmail'";
                        $conn->query($sql2);
                        $row1["verify"]="Yes";
                        header ('Location:/practice/wtlpro/Login.html');
                        die();
                    }
                    
                }
            }
        }

    }
}

?>