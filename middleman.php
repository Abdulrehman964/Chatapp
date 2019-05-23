<?php 
  session_start();


  $_SESSION["user2"]=$_POST['name'];
  header("Location:/practice/wtlpro/friend.php");
?>