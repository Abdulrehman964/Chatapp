<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "chat_db";

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = 'Select * from users';

if($conn->query($sql)==TRUE){
  //echo "Table Already Exists \n";
}
else
{
  $sql = "Create table Users ( 
   user_id int NOT NULL AUTO_INCREMENT,
   username varchar(255) NOT NULL,
   Email varchar(255) NOT NULL,
   password varchar(255) NOT NULL,
   primary key(user_id)
  );";

  if($conn->query($sql)==TRUE){
   // echo " User Table has been Created";
  }
  else{
    //echo "Failed to create table  " . $conn->error;
  }
}

$sql = 'Select * from messages';

if($conn->query($sql)==TRUE){
  //echo "Table Already Exists";
}
else {
  $sql = "Create table messages (
  message_id int NOT NULL AUTO_INCREMENT,
  sender_id int NOT NULL,
  message_text LongText,
  Message_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  primary key(message_id),
  Foreign key (sender_id) references Users(user_id)
  );";

  if($conn->query($sql)==TRUE){
    //echo " Messages Table has been Created";
  }
  else{
    //echo "Failed to create table  " . $conn->error;
  }
}

$addusers = $conn->prepare("INSERT into USERS (username,email,password) VALUES(?,?,?)");
$addusers->bind_param('sss',$username,$email,$password);

$sendmessage = $conn->prepare("INSERT into messages (sender_id,message_text) VALUES(?,?) ");
$sendmessage->bind_param('is',$sender_id,$message_text);

$retrievedetails = $conn->prepare("Select u.username,m.sender_id,m.message_text,m.Message_time from messages m,users u where u.user_id=m.sender_id order by m.Message_time");
?>