<?php
include("../Configuration/connection.php");
session_start();

if(isset($_POST['submitmsg'])){
    $message_text = $_POST['usermsg'];
    $sender_id = $_SESSION['user_details']['user_id'];

    if($sendmessage->execute()==TRUE){
        echo "Successfully Entered Message";
        header('Location: ../index.php');
    }
    else{
        echo "Message is not sent". $sendmessage->error;
    }
}