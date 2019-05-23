<?php
    session_start();
    if(isset($_POST["submit"]))
    {
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
            
            $convoid=$_SESSION["convoid"];
         
            $date=date('Y-m-d ');
            date_default_timezone_set('Asia/Kolkata');
            $time= date('H:i:s');
            $sql="INSERT into reply (userid1,cid,image,Date,Time) VALUES ('$user1','$convoid','$imgCont','$date','$time' )";
            $result = $conn->query($sql);
            if($result){
                header("Location:/practice/wtlpro/friend.php");
            }else{
                echo "File upload failed, please try again.";
            } 
                    //Get image data from database
            
        
        }
    }
    


?>