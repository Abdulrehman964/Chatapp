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
        $friendsname= array();
        
        $sql="SELECT * FROM conversation";
        $sql1="SELECT * FROM createlog";

       
        $result=$conn->query($sql);
        $result1=$conn->query($sql1);

        if($result->num_rows>0)
        {
            
            while($row=$result->fetch_assoc())
            {
                if($row["userid1"]==$user1 )
                {
                    
                    if($result1->num_rows>0)
                    {
                        
                        while($row1=$result1->fetch_assoc())
                        {
                            
                            if($row["userid2"]==$row1["id"])
                            {
                                //$name=$row1["fname"]+" "+$row1["lname"];
                                
                                array_push($friendsname,$row1["fname"]);
                                break;
                            }
                            else{
                                continue;
                            }
                        }
                        
                    }
                }
                elseif($row["userid2"]==$user1)
                {
                    
                    if($result1->num_rows>0)
                    {
                        
                        while($row1=$result1->fetch_assoc())
                        {
                            
                            
                            if($row["userid1"]==$row1["id"])
                            {
                                //$name=$row1["fname"]+" "+$row1["lname"];
                                
                                array_push($friendsname,$row1["fname"]);
                                break;
                            }
                            else{
                                continue;
                            }
                        }
                        
                    }
                }
                mysqli_data_seek($result1,0);
            }
            echo json_encode($friendsname);
        }
