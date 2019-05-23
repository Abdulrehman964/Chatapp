<?php 
          
        
            session_start();
            $servername = "localhost";
            $username = "root";
            $password= "";
            $dbname="collegewtl";
        
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $user1=$_SESSION["userid1"];
            $user2=$_SESSION["user2"];
            
            $text=$_POST["message"];
            
            $sql="SELECT * FROM conversation ";

            $result=$conn->query($sql);

            if($result->num_rows>0)
            {
              while($row=$result->fetch_assoc())
              {
                if(($row["userid1"]==$user1&&$row["userid2"]==$user2)||($row["userid1"]==$user2&&$row["userid2"]==$user1))
                {

                    $convoid=$row["cid"];
                    $_SESSION["convoid"]=$convoid;
                    
                    break;
                }
            }
            $_SESSION["convoid"]=$convoid;
                    $date=date('Y-m-d ');
                    date_default_timezone_set('Asia/Kolkata');
                    
                    $time= date('H:i:s');
                    echo $date."<br>";
                    echo $time;
                    echo "here";
                    echo $text;
                    $sql1="INSERT INTO reply (cid,userid1,message,Date,Time) VALUES($convoid,$user1,'$text','$date','$time')";
                    $result1=$conn->query($sql1);
                    //$result1=mysqli_query($conn ,$sql1);
                    //mysqli_query($conn, $sql1)
                    header("Location:/practice/wtlpro/friend.php");
                        echo $convoid;
                        exit;
                        
                    }
                        
                
           



        
?>