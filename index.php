<?php
 include('UI_Components/header.php');
 include("Configuration/connection.php");
 $session_timeout = 20 * 60; 
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}

if (isset($_SESSION['start_time'])) {
    $elapsed_time = time() - $_SESSION['start_time'];
    if ($elapsed_time >= $session_timeout) {
        session_unset();
        session_destroy(); 
        header("Location: index.php"); 
        exit();
    } else {
        $_SESSION['start_time'] = time();
    }
}
 if(isset($_SESSION['user']))
 {?>
    <div id="wrapper">
            <div id="menu">
                <p class="welcome">Signed as <?= $_SESSION['user_details']['username'] ?> <b></b></p>
            </div>
            <div id="chatbox">
            <?php 
                $retrievedetails->execute();
                $result = $retrievedetails->get_result();

                if($result->num_rows > 0)
                {
                    $day=0;
                    $newday=1;
                    while($fetchdata = $result->fetch_assoc())
                    {
                        $newday=$day;
                        $date = new DateTime($fetchdata['Message_time']);
                        $time=$date->format('h:i A');
                        $day= $date->format('m/d/Y');

                        if($newday !=$day){
                        ?>
                        <div style = "text-align:center";>
                            <?= $day ?>
                        </div>
                        <?php
                        }
                        if($fetchdata['sender_id']==$_SESSION['user_details']['user_id'])
                        {
                            ?>
                            <div class="message_sender">
                                <div class="text"><?= $fetchdata['message_text'] ?></div>
                                <div class="meta">
                                    <div class="name"><?= $fetchdata['username'] ?></div>
                                    <div class="timestamp"><?= $time?> </div>
                                </div>
                            </div>
                        <?php
                        }
                        else{?>
                            <div class="message_reciever">
                            <div class="text"><?= $fetchdata['message_text'] ?></div>
                            <div class="reciever">
                                    <div class="name"><?= $fetchdata['username'] ?></div>
                                    <div class="timestamp"><?= $time ?> </div>
                                </div>
                            </div>
                        <?php }
                    }
                }
            ?>
            </div>
            <form name="message" action="Features/Sendmessage.php" method="POST">
                <input name="usermsg" type="text" id="usermsg"  class = "UsermessageInput"/>
                <input name="submitmsg" type="submit" id="submitmsg" />
            </form>
    </div>
 <?php }
 else{
  ?>
 <div class="FrontPage">
   <img src="assets/images/images.png";/>
</div>
<?php }
?>