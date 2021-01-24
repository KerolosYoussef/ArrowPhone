<?php 
    session_start();
    $nonavbar = '';
    include "init.php";
    if(isset($_SESSION['User'])){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            include "Class/User.php";
            $pass   = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
            $cpass  = filter_var($_POST['cpass'],FILTER_SANITIZE_STRING);
            if($pass != $cpass){
                $match = false;
            } else {
                $match = true;
                $pass = sha1($pass);
                $user->updatePassword($pass,$_SESSION['User']);
            }
        }
?>

    <div class='container'>
        <div class='loginCont'>
            <div class='loginBox z-depth-1 rounded'>
            <a style='color:#333' href='../index.php'><h3 class='text-center'>HMS | Patient Password Reset</h3></a>
                <form id='loginform' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <fieldset>
                        <legend>Password Reset</legend>
                        <p style='margin:0px'>Please set your new password.</p>
                        <?php
                            if(isset($match)){
                                if($match == False){
                                    echo "<p style='color:red;margin:0'>Password Doesn't Match</p>";
                                } else {
                                    echo "<p style='color:green;margin:0'>Password Updated Succesfully , Login Again</p>";
                                    unset($_SESSION['User']);
                                    $helper->redirect("User Login.php",2);
                                }
                            }
                        ?>
                        <div class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-lock input-prefix"></i>
                            <input required type="password" id="prefixInside" name='password' class="form-control">
                            <label for="prefixInside">Password</label>
                        </div>
                        <div style='margin-bottom:0' class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-lock input-prefix"></i>
                            <input required type="password" id="cpass" name='cpass' class="form-control">
                            <label for='cpass'>Password Again</label>
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

<?php
    } else {
        $helper->redirect("User Login.php");
    }
include $tpl . "footer.php"; ?>