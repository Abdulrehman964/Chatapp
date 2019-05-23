<?php
session_start();
?>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body background="/practice/wtlpro/folder/bgcolor1.jpg">
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Arima+Madurai:100,200,300,400,500,700,800,900');

/* entire container, keeps perspective */
        .card-container {
            -webkit-perspective: 800px;
        -moz-perspective: 800px;
            -o-perspective: 800px;
                perspective: 800px;
                margin-bottom: 30px;
        }
        /* flip the pane when hovered */
        .card-container:not(.manual-flip):hover .card,
        .card-container.hover.manual-flip .card{
            -webkit-transform: rotateY( 180deg );
        -moz-transform: rotateY( 180deg );
        -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
        }



        /* flip speed goes here */
        .card {
            -webkit-transition: -webkit-transform .5s;
        -moz-transition: -moz-transform .5s;
            -o-transition: -o-transform .5s;
                transition: transform .5s;
        -webkit-transform-style: preserve-3d;
        -moz-transform-style: preserve-3d;
            -o-transform-style: preserve-3d;
                transform-style: preserve-3d;
            position: relative;
        }

        /* hide back of pane during swap */
        .front, .back {
            -webkit-backface-visibility: hidden;
        -moz-backface-visibility: hidden;
            -o-backface-visibility: hidden;
                backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            background-color: #FFF;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.14);
        }

        /* front pane, placed above back */
        .front {
            z-index: 2;
        }

        /* back, initially hidden pane */
        .back {
                -webkit-transform: rotateY( 180deg );
        -moz-transform: rotateY( 180deg );
            -o-transform: rotateY( 180deg );
                transform: rotateY( 180deg );
                z-index: 3;
        }

        .back .btn-simple{
            position: absolute;
            left: 0;
            bottom: 4px;
        }
        /*        Style       */

        #one{
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);
            -moz-box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);
            box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);
            background: none repeat scroll 0 0 #FFFFFF;
        }
        .card{
            background: none repeat scroll 0 0 #FFFFFF;
            border-radius: 4px;
            color: #444444;
        }
        .card-container, .front, .back {
            width: 100%;
            height: 550px;
            border-radius: 4px;
            -webkit-box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);
            -moz-box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);
            box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.16);
        }
        
   
        .card .user img{
            background: none repeat scroll 0 0 #FFFFFF;
            border: 4px solid #FFFFFF;
            width: 100%;
            height: 250px;
        }

        .card .content{
            background-color: rgba(0, 0, 0, 0);
            box-shadow: none;
            padding: 10px 20px 20px;
        }
        .card .content .main {
            min-height: 160px;
        }
        .card .back .content .main {
            height: 215px;
        }
        .card .name {
                font-family: 'Arima Madurai', cursive;
            font-size: 22px;
            line-height: 28px;
            margin: 10px 0 0;
            text-align: center;
            text-transform: capitalize;
        }
        .card h3{
            margin: 5px 0;
            font-weight: 400;
            line-height: 20px;
        }
        .card .profession{
            color: #999999;
            text-align: center;
            margin-bottom: 20px;
        }
        .card .footer {
            border-top: 1px solid #EEEEEE;
            color: #999999;
            margin: 30px 0 0;
            padding: 10px 0 0;
            text-align: center;
        }
        .card .footer .social-links{
            font-size: 18px;
        }
        .card .footer .social-links a{
            margin: 0 7px;
        }
        .card .footer .btn-simple{
            margin-top: -6px;
        }
        .card .header {
            padding: 15px 20px;
            height: 90px;
        }
        .card .motto{
            font-family: 'Arima Madurai', cursive;
            border-bottom: 1px solid #EEEEEE;
            font-size: 20px;
            padding-bottom: 10px;
            text-align: center;
        }
       

        .card .stats-container{
            width: 100%;
            margin-top: 50px;
        }
        .card .stats{
            display: block;
            float: left;
            width: 33.333333%;
            text-align: center;
        }

        .card .stats:first-child{
            border-right: 1px solid #EEEEEE;
        }
        .card .stats:last-child{
            border-left: 1px solid #EEEEEE;
        }
        .card .stats h3{
                font-family: 'Arima Madurai', cursive;
            font-weight: 300;
            margin-bottom: 5px;
        }
        .card .stats p{
            color: #777777;
        }


        .btn-simple{
            opacity: .8;
            color: #666666;
            background-color: transparent;
        }

        .btn-simple:hover,
        .btn-simple:focus{
            background-color: transparent;
            box-shadow: none;
            opacity: 1;
        }
        .btn-simple i{
            font-size: 16px;
        }
            /*div*/
        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }
            
            .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
            }
    
            
    </style>
    <nav class='navbar navbar-inverse navbar-fixed-top' style="height:75px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/practice/wtlpro/Main.html"><H2>SdS</H2></a>
                </div>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/practice/wtlpro/Login.html"><h3>Log Out</h3></a></li>
                    <li><a href="/practice/wtlpro/convo.php"><h3>Add Friends</h3></a></li>
                    </a></li>
                </ul>
            </div>
    </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
    <script>
        $().ready(function(){
        $('[rel="tooltip"]').tooltip();

        });

        function rotateCard(btn){
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if($card.hasClass('hover')){
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        }
        $(document).ready(function() {

            console.log("here");
            list=new Array();
            list1=new Array();
            $.ajax({
                url:"find.php",
                type:"POST",
                success:function(msg){
                    list = JSON.parse(msg)
                    for(key in list)
                    {
                        console.log("list["+ key +"]="+ list[key])
                    }
                    

                    $.ajax({
                            url:"findname.php",
                            type:"POST",
                            success:function(msg1){
                                list1=JSON.parse(msg1)
                                for(key in list1)
                                {
                                    console.log("list1["+ key +"]="+ list1[key])
                                }
                                var i=list.length;
                                for(j=0;j<i;j++)
                                {
                                    console.log(list1[j]);
                                    //$('body').append("<form action='/practice/wtlpro/middleman.php' method=POST><div id='" + j+"' style='border:1px solid black; background-color: pink; '> </div><input type='hidden' name='name'  value='"+list[j]+"'> <input type='SUBMIT'  value='Submit' ></form>");



                                    $('body').append("<form action='/practice/wtlpro/middleman.php' method=POST><tr><td><div id='one' style='border:1px solid black;height:50px;width:50%; '><h3 id='"+j+"'> </h3></div><td><input type='hidden' name='name'  value='"+list[j]+"'> <td><input type='SUBMIT'  value='Chat' ><td></tr></form>");
                                    document.getElementById(j).innerHTML=list1[j];
                                }
                            }

                        })

                    
                }
                
            });

            
        })
        
       
    </script>

 
     
        <div class="card-container manual-flip" style="top:90px;position:absolute;right:20px;height:550px;width:400px">
           <div class="card">
               <div class="front">
                            
                            <h2 class="motto">Profile</h2>
                        
                   <div class="user">
                       
                   
                   <?php
                   
                    
                    $userid1=$_SESSION["userid1"];
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
                    $result=$conn->query($sql);

                    while($row=$result->fetch_assoc())
                    {
                            
                        
                        if($row["id"]==$userid1)
                        {
                            
                            if(is_null($row["pic"]))
                            {
                               
                                echo'<img class="img" src="/practice/wtlpro/folder/bgcolor2.jpg"/>';
                            }
                            else{
                                echo'<img class="img" src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).' " />';
                            }
                        }
                    }


                   ?>
                   </div>
                   <div class="content">
                       <div class="main">
                           <h3 class="name"><?php
                   
                    
                   $userid1=$_SESSION["userid1"];
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
                   $result=$conn->query($sql);

                   while($row=$result->fetch_assoc())
                   {
                           
                       
                       if($row["id"]==$userid1)
                       {
                           echo($row["fname"]." ".$row["lname"]);
                           echo"<br>";
                           echo"<p class='profession'>";
                           echo $row["about"];
                           echo "</p>";
                       }
                   }


                  ?></h3>
                           
                           <p class="text-center"></p>
                       </div>
                       <div class="footer">
                           <button class="btn btn-simple" onclick="rotateCard(this)">
                               <i class="fa fa-mail-forward"></i>Update
                           </button>
                       </div>
                   </div>
               </div> <!-- end front panel -->
               <div class="back">
                  
                   <div class="content">
                       <div class="main">
                           <h3 class="text-center">Update Your Profile</h3>
                           

                           <div class="stats-container">
                              
                           <h4 class="text-left">Update Your Profile Image</h4>
                           
                               <form action="/practice/wtlpro/changedp.php" method="post" enctype="multipart/form-data">
       
                                    <input type="file" name="image" />
                                    <br>
                                    <button type="SUBMIT">
                                        Change
                                    </button>
                                
                                </form>

                                <h4 class="text-left">Update Your Profile Details</h4>
                                   
                                <form action="/practice/wtlpro/Login.html" method="post" enctype="multipart/form-data">
                                    
                                    
                                    <button type="SUBMIT">
                                        Update
                                    </button>
                                
                                </form>
                               
                               
                           </div>

                       </div>
                   </div>
                   <div class="footer">
                       <button class="btn btn-simple" rel="tooltip" title="Flip Card" onclick="rotateCard(this)">
                           <i class="fa fa-reply"></i> Back
                        
                       </button>
                       
                   </div>
               </div> <!-- end back panel -->
           </div> <!-- end card -->
         
       </div> <!-- end card-container -->
    
   
      
   
</body>
</head>
    
      

