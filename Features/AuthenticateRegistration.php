<?php 
    include("../Configuration/connection.php");
session_start();
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if(isset($_POST['registration_btn']))
{
    $username = sanitize_input($_POST["username"]);
    $email = sanitize_input($_POST["email"]);
    $password = sanitize_input($_POST["password"]);
    
    if (empty($username)) {
        $errors[] = "Username is required";
    }
    if (empty($email) || !is_valid_email($email)) {
        $errors[] = "Valid email is required";
    }
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    $_SESSION['username'] = $username;
    $_SESSION['email']=$email;

    if($password!=$confirm_password)
    {
        $_SESSION['message'] = 'Passwords do not match';
        header('Location: ../Register.php');
        return;
    }
    else
    {
        $sql = $conn->prepare("SELECT * from USERS where email = ?");
        $sql->bind_param('s',$email);
        $sql->execute();
        $result = $sql->get_result();
        if($result->num_rows > 0){
            $_SESSION['message'] = "Email Already Registered";
            header('Location: ../Register.php');
        }
        else
        {
            $password = password_hash($password,PASSWORD_BCRYPT);
            if($addusers->execute()==TRUE)
            {
                session_unset();
                $_SESSION['message'] = "Registration Successfull";
                header('Location: ../Login.php');
            }
            else
            {
                $_SESSION['message'] = "Registration Unsuccessful";
                header('Location: ../Register.php');
            }
        }
    }
}
 
else{
    echo "INVALID ENTRY";
}

?>