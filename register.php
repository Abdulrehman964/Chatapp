<?php 
include('UI_Components/header.php'); 
if(isset($_SESSION['user']))
{
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}
?>
    <div class="ph-5">
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                    if(isset($_SESSION['message']))  
                    { 
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form action="Features/AuthenticateRegistration.php" method="POST">

                                <div class="mb-3">
                                    <label for="Username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter username" id="email_address" aria-describedby="emailHelp" value = "<?= isset($_SESSION['username']) ? $_SESSION['username'] : ""?> " required>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="Email-address" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email-address" id="email_address" aria-describedby="emailHelp" value = "<?= isset($_SESSION['email']) ? $_SESSION['email'] : ""?> " required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" id="exampleInputPassword1" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password" id="exampleInputPassword1" required>
                                </div>
                               
                                <button type="submit" name="registration_btn" class="btn btn-primary">Register</button>

                                </div>
                            </form>
                        </div>
                    </div>    
                    
                <div>
            <div>
        <div>
    </div>    