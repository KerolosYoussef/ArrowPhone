<?php 
    session_start();
    $nonavbar = '';
    include "init.php";
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include "Class/User.php";
        // getting the data
        $fname      = $_POST['fname'];
        $address    = $_POST['address'];
        $username   = $_POST['uname'];
        $gender     = $_POST['gender'];
        $email      = $_POST['email'];
        $pass       = $_POST['password'];
        $cPass      = $_POST['cpassword']; 
        // Checking For Errors
        $formError = [];
        if(empty($fname)){
            $fnameMsg = "Full Name Mustn't Be Empty";
            $formError[] = 'fname';
        }
        if(empty($address)){
            $addrMsg = "Address Mustn't Be Empty";
            $formError[] = 'address';
        }
        if(empty($username)){
            $cityMsg = "Username Mustn't Be Empty";
            $formError[] = 'uname';
        }
        if(empty($email)){
            $emailMsg = "Email Mustn't Be Empty";
            $formError[] = 'email';
        }
        if(empty($pass)){
            $passMsg = "Password Mustn't Be Empty";
            $formError[] = 'pass';
        }
        if($pass != $cPass){
            $cpassMsg = "Password Doesn't Match";
            $formError[] = 'cpsas';
        }
        if($user->isExist($username,$email)){
            $errorMsg = "This Username or Email is Already Registered";
            $formError[] = "Already";
        }
        if(empty($formError)){ // No Error in Form
            // filtering the data
            $fname      = filter_var($fname,FILTER_SANITIZE_STRING);
            $address    = filter_var($address,FILTER_SANITIZE_STRING);
            $username   = filter_var($username,FILTER_SANITIZE_STRING);
            $email      = filter_var($email,FILTER_SANITIZE_EMAIL);
            $pass       = sha1($pass);
            $user->Register($fname,$address,$gender,$username,$email,$pass);
            $success = true;
        }

    }
?>

    <div class='container'>
        <div class='loginCont'>
            <div class='loginBox z-depth-1 rounded'>
            <a style='color:#333' href='../index.php'><h3 class='text-center'>HMS | Patient Regiseration</h3></a>
                <form id='loginform' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <fieldset style='padding:20px'>
                        <legend style='width:72px !important'>Sign Up</legend>
                        <?php if(isset($errorMsg)) echo "<p style='color:red'>".$errorMsg."</p>"; ?>
                        <?php if(isset($success)) echo "<p style='color:green'>Registerd Successfully</p>"; ?>
                        <p style='margin:0px'>Please enter your personal details below</p>
                        <div class="md-form">
                            <input type="text" id="prefixInside" name='fname' class="form-control">
                            <label for="prefixInside">Full Name</label>
                            <?php if(isset($fnameMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$fnameMsg."</span>"; ?>
                        </div>
                        <div class="md-form">
                            <input type="text" id="address" name='address' class="form-control">
                            <label for='address'>Address</label>
                            <?php if(isset($addrMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$addrMsg."</span>"; ?>
                        </div>
                        <div class='md-form'>
                            <label for="Gender">Gender</label>
                        </div>
                        <br>
                        <br>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input checked type="radio" class="custom-control-input" value='0' id="male" name="gender">
                            <label class="custom-control-label" for="male">Male</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" value='1' id="female" name="gender">
                            <label class="custom-control-label" for="female">Female</label>
                        </div>
                        <br>
                        <br>
                        <p style='margin:0px'>Enter your account details below:</p>
                        <div class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-user input-prefix"></i>
                            <input type="text" id="uname" name='uname' class="form-control">
                            <label for='uname'>Username</label>
                            <?php if(isset($unameMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$unameMsg."</span>"; ?>
                        </div>
                        <div class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-envelope input-prefix"></i>
                            <input type="email" id="email" name='email' class="form-control">
                            <label for="email">Email</label>
                            <?php if(isset($emailMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$emailMsg."</span>"; ?>
                        </div>
                        <div style='margin-bottom:0' class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-lock input-prefix"></i>
                            <input type="password" id="password" name='password' class="form-control">
                            <label for='password'>Password</label>
                            <?php if(isset($passMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$passMsg."</span>"; ?>
                        </div>
                        <div style='margin-bottom:0' class="md-form input-with-pre-icon">
                            <i style='color:#0095FF' class="fas fa-lock input-prefix"></i>
                            <input type="password" id="cpassword" name='cpassword' class="form-control">
                            <label for='cpassword'>Password Again</label>
                            <?php if(isset($cpassMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$cpassMsg."</span>"; ?>
                        </div>
                        <div class='md-form float-right'>
                            <input type="submit" value='Regiser' id='submit' class='btn btn-primary'>
                        </div>
                        <div style='clear:both'></div>
                        <hr>
                        <p>Already have an account? <a href="User Login.php">Login</a></p>
                    </fieldset>
                    <br>
                    <p class='text-center'>© 2020 <b style='color:#555;'>SlowArrow</b>. All rights reserved</p>
                </form>
            </div>
        </div>
    </div>

<?php include $tpl . "footer.php"; ?>