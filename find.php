<?php
session_start();


    $servername = "localhost";
    $username = "root";
    $password= "";
    $dbname="collegewtl";

    $user1=$_SESSION["userid1"];
    

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
        $friends= array();
        $sql="SELECT * FROM conversation";

        $result=$conn->query($sql);

        if($result->num_rows>0)
        {
            
            while($row=$result->fetch_assoc())
            {
                if($row["userid1"]==$user1)
                {
                    array_push($friends,$row["userid2"]);
                }
                elseif($row["userid2"]==$user1)
                {
                    array_push($friends,$row["userid1"]);
                }
                
            }
            echo json_encode($friends);
        }






        
