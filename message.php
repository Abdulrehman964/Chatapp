<?php
session_start();


   
    $email=$_SESSION["emailuser"];
    $email1=$_SESSION["newuser"];
    //echo"$email1";

    $servername = "localhost";
    $username = "root";
    $password= "";
    $dbname="collegewtl";


    date_default_timezone_set('Asia/Kolkata');
    $hour=date("H")*3600;
    $minute=date("i")*60;
    $seconds=date("sa");
    $hour1=(int)$hour;
    $minute1=(int)$minute;
    $seconds1=(int)$seconds;
    $time=$hour1+$minute1+$seconds1;
    //echo $time;



    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql="SELECT * FROM createlog ";
    
    

    $result = $conn->query($sql);
    
    
    if($result->num_rows>0)
    {
        //echo"here";
            while($row=$result->fetch_assoc())
            {
                if($row["email"]==$email)
                {
                    
                    $userid1=$row["id"];
                    echo $row["id"];
                    echo"$userid1";
                }
                if($row["email"]==$email1)
                {
                    echo "hullu";
                    $userid2=$row["id"];
                    echo "$userid2";
                }
            }
    }
    $choice=0;
    $sql2="SELECT * FROM conversation";
    $result2=$conn->query($sql2);
    if($result2->num_rows>0)
    {
       
            while($row=$result2->fetch_assoc())
            {
                
                if($row["userid1"]==$userid2&&$row["userid2"]==$userid1)
                {
                    echo "hmmm";
                    $choice=1;
                    header("Location:/practice/wtlpro/try1.html");
                }
            }
    }
    if($choice==0)
    {
        $sql1="INSERT INTO conversation (userid1,userid2,time) VALUES('$userid1','$userid2','$time')";
        header("Location:/practice/wtlpro/try1.php");
        if(mysqli_query($conn, $sql1)){
            echo "Added";
            
            echo" click here to move to messaging";

            echo'<form action="/practice/wtlpro/try1.php" method=POST>';
            echo '<input type="SUBMIT" value" Reply" >';
            echo "</form>";
            
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }

?>