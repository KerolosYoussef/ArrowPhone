<?php 
    session_start();
    $nonavbar = '';
    include "init.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include "Class/User.php";
        $Email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $uname = filter_var($_POST['uname'],FILTER_SANITIZE_STRING);
        if($user->checkReset($Email,$uname)){
            $_SESSION['User'] = $uname;
            $helper->redirect("Reset-Password.php");
        } else {
            $recoverStatus = false;
        }
    }
?>

    <div class='container'>
        <div class='loginCont'>
            <div class='loginBox z-depth-1 rounded'>
            <a style='color:#333' href='../index.php'><h3 class='text-center'>HMS | Patient Password Recovery</h3></a>
                <form id='loginform' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <fieldset>
                        <legend>Password Recovery</legend>
                        <p style='margin:0px'>Please enter your Email and your Username to recover your password.</p>
                        <?php
                            if(isset($recoverStatus)){
                                if($recoverStatus == False){
                                    echo "<p style='color:red;margin:0'>Invalid Email or Username</p>";
                                }
                            }
                        ?>
                        <div class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-user input-prefix"></i>
                            <input required type="text" id="prefixInside" name='uname' class="form-control">
                            <label for="prefixInside">Registered Username</label>
                        </div>
                        <div style='margin-bottom:0' class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-lock input-prefix"></i>
                            <input required type="email" id="email" name='email' class="form-control">
                            <label for='email'>Registered Email</label>
                        </div>
                        <div class='md-form float-right'>
                            <input type="submit" value='Reset' id='submit' class='btn btn-primary'>
                        </div>
                        <div style='clear:both'></div>
                        <hr>
                        <p>Don't have an account yet? <a href="">Create an Account</a></p>
                    </fieldset>
                    <br>
                    <p class='text-center'>© 2020 <b style='color:#555;'>SlowArrow</b>. All rights reserved</p>
                </form>
            </div>
        </div>
    </div>

<?php include $tpl . "footer.php"; ?>