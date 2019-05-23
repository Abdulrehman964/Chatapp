<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body background="/practice/wtlpro/folder/bgcolor1.jpg">
  <style>
    .header1 {
      width: 100%;
      height:50%;
      background-color: Pink;
    }
    #friend{
            
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.14);
    }

  </style>
                    <nav class='navbar navbar-inverse navbar-fixed-top' style="height:75px;">
                      <div class="container-fluid">
                        <div class="navbar-header">
                          <a class="navbar-brand" href="/practice/wtlpro/Main.html"><H2>SdS</H2></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="/practice/wtlpro/logout.php"><h3>Log Out</h3></a></li>
                          </a></li>
                        </ul>
                      </div>
                    </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
    <div>
      <h3>Click here to add new FRIENDS </h3>
      <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="POST">
      <input type="text" name="email" >
      <input type="submit"  name="submit"> 
      </form>
      <form action="/practice/wtlpro/try1.php" method=POST>
        <h3>Click here to move to convo page</h3>
        <input  type="SUBMIT" value="List" >
      </form>

      <form action =/practice/wtlpro/message.php method=POST>
      <?php
        session_start();
      
          
          if(isset($_POST['submit'])) 
          { 
              $email=$_POST['email'];

              $_SESSION["newuser"] = $email ;
          
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
              
              if($result->num_rows>0)
              {
                      while($row=$result->fetch_assoc())
                      {
                          if($row["email"]==$email)
                          {
                            /*

                            <div class="card" style="width:400px">
                              <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
                              <div class="card-body">
                                <h4 class="card-title">John Doe</h4>
                                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                <a href="#" class="btn btn-primary">See Profile</a>
                              </div>
                            </div>

                            */
                            echo '<div class="card" style="width:400px; top:20%;right:20%;position:absolute;" id="friend">';
                            if(is_null($row["pic"]))
                            {
                              echo '<img class="card-img-top" src="/practice/wtlpro/folder/bgcolor2.jpg" style="width:100%">';
                            }
                            else
                            {
                              echo '<img class="card-img-top" style="width:100%" src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).' " />';
                            }
                            echo '<div class="card-body">';
                            echo ' <h2 class="text-center">';
                            echo ($row["fname"]." ".$row["lname"]);
                            echo'</h2>';
                            echo ' <p class="text-center">Birthday: ';
                            echo $row["birthday"] ;
                            echo '</p>';
                            echo '<p class="text-center">About:';
                            echo $row["about"];
                            echo '</p>';
                            echo ' </div>';
                            echo'<form method="post" action="/practice/wtlpro/message.php">';
                           echo '<div class="footer" style="text-align: center;">
                                <button class="btn btn-simple" >
                                    <i class="fa fa-mail-forward"></i>ADD
                                </button>
                            </div>';
                            echo '</form>';
                            echo'</div>';
                            
                            
                          
                            break;
                          }
                          else{
                            continue;
                          }
                      }
              }
          }
          ?>
      </form>
    </div>
</body>