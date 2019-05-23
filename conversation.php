<?php
session_start();

if(isset($_POST['submit'])) 
{ 
    $email=$_POST['mail'];

    $servername = "localhost";
    $username = "root";
    $password= "";
    $dbname="collegewtl";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql="SELECT email FROM createlog ";

    $result = $conn->query($sql);
    
    if($result->num_rows>0)
    {
            while($row=$result->fetch_assoc())
            {
                if($row["email"]==$email)
                {
                    header("Location:/practice/wtlpro/conversation.html");
                }
            }
    }
    
}
?>

<form align="center" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>

    <input type="text" name="mail"> <input type="SUBMIT" value="submit" name="submit"> 
    

</form>

