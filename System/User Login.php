<?php 
    session_start();
    $nonavbar = '';
    include "init.php";
    if(isset($_SESSION['User'])){
        $helper->redirect("Dashboard.php");
    } else {
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            include "Class/User.php";
            $formeError = [];
            if($_POST['password']<6){
                $formError[] = "Please enter at least 6 characters";
            } else {
                $password = sha1($_POST['password']);
            }
            $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
            if($user->checkLogin($username,$password) && empty($formError)){
                // Regiser the user in a Session
                $_SESSION['User'] = $username;
                $helper->redirect("Dashboard.php");
            } else {
                $loginStatus = False;
            }
        }
    }
?>

    <div class='container'>
        <div class='loginCont'>
            <div class='loginBox z-depth-1 rounded'>
            <a style='color:#333' href='../index.php'><h3 class='text-center'>HMS | Patient Login</h3></a>
                <form id='loginform' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <fieldset>
                        <legend>Sign in to your account</legend>
                        <p style='margin:0px'>Please enter your Username and Password to login</p>
                        <?php
                            if(isset($loginStatus)){
                                if($loginStatus == False){
                                    echo "<p style='color:red;margin:0'>Invalid username or password</p>";
                                }
                            }
                        ?>
                        <div class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-user input-prefix"></i>
                            <input required type="text" id="prefixInside" name='username' class="form-control">
                            <label for="prefixInside">Username</label>
                        </div>
                        <div style='margin-bottom:0' class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-lock input-prefix"></i>
                            <input required type="password" id="password" name='password' class="form-control">
                            <label for='password'>Password</label>
                        </div>
                        <p class='msg hidden'>Please enter at least 6 characters.</p>
                        <a href="Forgot-Password.php">Forget Your Password?</a>
                        <div class='md-form float-right'>
                            <input type="submit" value='Login' id='submit' class='btn btn-primary'>
                        </div>
                        <div style='clear:both'></div>
                        <hr>
                        <p>Don't have an account yet? <a href="Regiseration.php">Create an Account</a></p>
                    </fieldset>
                    <br>
                    <p class='text-center'>© 2020 <b style='color:#555;'>SlowArrow</b>. All rights reserved</p>
                </form>
            </div>
        </div>
    </div>

<?php include $tpl . "footer.php"; ?>