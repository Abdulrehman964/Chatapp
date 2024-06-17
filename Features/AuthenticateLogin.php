<?php
include("../Configuration/connection.php");
session_start();
if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_user = $conn->prepare("SELECT user_id,username, password FROM users WHERE email = ?;");
    $select_user->bind_param('s', $email);

    $select_user->execute();
    $result = $select_user->get_result();

    if($result->num_rows > 0)
    {
        $fetchdata = $result->fetch_assoc();
        $hashedpassword = $fetchdata['password'];
        $verify = password_verify($password,$hashedpassword);
        if($verify)
        {
            $_SESSION['user']=true;
            $_SESSION['user_details']=[
                'username'=> $fetchdata['username'],
                'user_id' => $fetchdata['user_id']
            ];
            header('Location: ../index.php');
        }
        else{
            $_SESSION['message'] = 'Invalid Email or Password';
            header('Location: ../Login.php');
        }
    } 
    else 
    {
        $_SESSION['message'] = 'Invalid Email or Password';
            header('Location: ../Login.php');
    }
}

 ?>