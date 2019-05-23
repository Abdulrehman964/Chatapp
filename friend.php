
<html>
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body background="/practice/wtlpro/folder/bgcolor2.jpg">
    <script>
      $(document).ready(function(){
      
       $.ajax({
          url:"findfrndname.php",
                type:"POST",
                success:function(msg){
                  console.log("wow");
                  
                  console.log(msg);
                  //$('body').append("<div style='background-color:pink;'><p id=j></p></div>");
                  //$('body').append("<nav class='navbar navbar-inverse'><div class='container-fluid'><div class='navbar-header'><a class='navbar-brand' href='#' id='j'></div></div></nav>");
                  
                  //document.getElementById(j).innerHTML=msg;
                  document.getElementById('j').innerHTML=msg;
                    
                }  
        });
      })
      </script>
      <style>
      
        .wrapper{ 
            // width: 1000px;
            background-image: url("/practice/wtlpro/folder/bgcolor1.jpg");
            width: 100wh;
            overflow-y:scroll; 
            position:relative;
            height:475px;
        }
        textarea {
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 5px;
        }
        #time{
          float: right;
          margin-left: 20px;
          margin-right:0;
        }
        .container {
          border: 2px solid #dedede;
          border-radius: 5px;
          padding: 10px;
          margin: 10px 0;
        }
        .img{
          border-radius: 5px;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0,0.19);
        }
        
      </style>
          <nav class='navbar navbar-inverse navbar-fixed-top' style="height:75px">
            <div class='container-fluid'>
              <div class='navbar-header'>
                <a class='navbar-brand' href='#' id='j'>
              </div>
                
                <ul class="nav navbar-nav navbar-right">
                  <li><a  href='/practice/wtlpro/Login.html' >Log Out</a></li>
                  <li><a  href='/practice/wtlpro/try1.php' >Go Back</a></li>
                </ul>
            </div>
            </nav>
            <br>
            <br>
            <br>
            <br>
          <div class="output">
          <div class="wrapper">

            
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
              }
              $convoid=$_SESSION["convoid"];
              
              $sql="SELECT * FROM reply group by Date,Time";
              $result = $conn->query($sql);
              $text;
              if($result->num_rows>0)
              {
                      while($row=$result->fetch_assoc())
                      {
                          if($row["cid"]==$convoid)
                          {
                            
                              if($row["userid1"]==$user1)
                              {
                                  if(is_null($row["message"]))
                                  {
                                    //echo '<img style="position: absolute;right: 20px;width:300px;height:250px;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).' " />';
                                   
                                    
                                    echo "<br>";
                                    echo "<div style='position: absolute;right: 20px;width:300px;height:300px;'";
                                    echo '<a href="data:image/jpeg;base64,'.base64_encode( $row['image'] ).' " download='.$row["rid"].'>';
                                    echo'<img style="position: absolute; border-radius: 5px;right: 20px;width:300px;height:250px;" src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).' " />';
                                    echo '</a>';
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                  
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo $row["Time"];   
                                    echo "</div>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    
                                    

                                  }
                                  else{
                                  $text=$row["message"];
                                  
                                  echo "<br>";
                                  echo '<div class="container"  style="position: absolute;right: 20px; background-color:#98FB98">';
                                  echo $text;
                                  echo'<span id="time" class="time-right">';
                                  echo $row["Time"];
                                  echo '</span>';
                                  echo '</div>';
                                  echo "<br>";
                                  echo"<br>";
                                  echo"<br>";
                                  
                                  }
                                 
                                  
                              }
                              else
                              {
                                  if(is_null($row["message"]))
                                  {
                                    echo "<br>";
                                    echo "<div style='position: absolute;left:20px;width:300px;height:275px;'";
                                    echo '<a href="data:image/jpeg;base64,'.base64_encode( $row['image'] ).' " download='.$row["rid"].'>';
                                    echo '<img  style=" width:300px; border-radius: 5px;height:250px;"src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).' "  />';
                                    echo $row["Time"];                                  
                                    echo '</a>';
                                    echo "</div>";
                                    echo "<br>";
                                    echo"<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    echo "<br>";
                                    
                                   
                                  }

                                  else{
                                    $text=$row["message"];
                                    
                                    echo "<br>";
                                    echo '<div class="container" style="position: absolute; left: 20px;background-color:#E6E6FA">';
                                    echo $text;
                                    echo'<span id="time" class="time-right">';
                                    echo $row["Time"];
                                    echo '</span>';
                                    echo '</div>';
                                    echo "<br>";
                                    echo"<br>";
                                 
                                  }
                                  
                                  
                              }
                              
                          }
                          
                      }
              }
          $conn->close();
          ?>
         
         </div>
      </div>
      <br>
      <form action="/practice/wtlpro/upload.php" method="post" enctype="multipart/form-data">
       
        <input type="file" name="image"/>
        <span><input style="display: inline-block;border-radius: 25px;" type="SUBMIT" name="submit" value="UPLOAD"/>
            </span>
      </form>
      <form action="/practice/wtlpro/storemsg.php" method="POST">
        <span><textarea name="message" style="width:1400px;margin-left:0%"></textarea>
        <input style="border-radius: 25px;" type="SUBMIT" value="Send" name="submit"><span>
      </form>
          
</body>
</html>


