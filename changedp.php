<?php
    session_start();
    
        $check =getimagesize($_FILES["image"]["tmp_name"]);
        
        if($check !== false)
        {
            $image = $_FILES['image']['tmp_name'];
            $imgCont = addslashes(file_get_contents($image));

            $servername = "localhost";
            $username = "root";
            $password= "";
            $dbname="collegewtl";
        
        
        
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            $user1=$_SESSION["userid1"];
           
         
            
            $sql="UPDATE createlog SET pic= ('$imgCont' ) where id=$user1";
            $result = $conn->query($sql);
            if($result)
            {
                header("Location:/practice/wtlpro/try1.php");
            }
            else
            {
                echo "File upload failed, please try again.";
            } 
                    
            
        
        
    }
    


?>