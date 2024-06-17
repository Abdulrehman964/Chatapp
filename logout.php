<?php
session_start();
if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
    unset($_SESSION['user_details']);
    
    $_SESSION['message'] = "Logged out successfully";
}
header('Location: Login.php');

?>