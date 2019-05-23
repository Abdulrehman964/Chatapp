<?php
session_start();

$user2=$_SESSION["user2"];




$servername = "localhost";
$username = "root";
$password= "";
$dbname="collegewtl";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM createlog ";

$result = $conn->query($sql);
$fullname;
if($result->num_rows>0)
{
        while($row=$result->fetch_assoc())
        {
            if($row["id"]==$user2)
            {
               
                echo($row["fname"]." ".$row["lname"]);
               
                //header("Location:/practice/wtlpro/convo.php");
                
            }
        }
}