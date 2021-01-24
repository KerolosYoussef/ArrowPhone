<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['User'])){
            include "Class/User.php";
            $username = $_SESSION['User'];
            $formError=[];
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                // Validating The Data
                if(empty($_POST['username'])){
                    $userMsg = "Username Mustn't Be Empty";
                    $formError[]= 'Username';
                }
                if(empty($_POST['Address'])){
                    $addressMsg = "Address Mustn't Be Empty";
                    $formError[]= 'Address';
                }
                if(empty($_POST['email'])){
                    $emailMsg = "Email Mustn't Be Empty";
                    $formError[]= 'Email';
                }
                if(empty($formError)){
                    // Filtering The Data
                    $username   = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
                    $address    = filter_var($_POST['Address'],FILTER_SANITIZE_STRING);
                    $gender     = $_POST['gender'];
                    $email      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                    if($user->UpdateProfile($username,$address,$gender,$email,$_SESSION['User'])){
                        $success = true;
                    }
                    $_SESSION['User'] = $username; // Register the New Session Name
                }    
            }
    ?>
        <div class='userPage'>
            <h1>USER | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                            <h5>Edit Profile</h5>
                            <p class='user'><?php echo $_SESSION['User']; ?>'s Profile</p>
                            <p style='color:#333;font-weight:bold'>Profile Reg. Date: <?php echo $user->getAllData($username)['RegisterDate']; ?></p>
                            <hr>
                            <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
                            <?php if(isset($success)) echo "<span style='color:green;font-weight:bold;font-size:17px'>Profile Updated Successfully</span>"; ?>
                            <div class='form-group'>
                                <label for="#username">Username</label>
                                <input type="text" name='username' id='username' class='form-control' value='<?php echo $user->getAllData($username)['Username']; ?>'>
                                <?php if(isset($userMsg)) echo "<span style='color:red;'>".$userMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#Address">Address</label>
                                <input type="text" name='Address' id='Address' class='form-control' value='<?php echo $user->getAllData($username)['Address']; ?>'>
                                <?php if(isset($addressMsg)) echo "<span style='color:red;'>".$addressMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#Gender">Gender</label>
                                <select name="gender" id="Gender" class='form-control'>
                                    <option <?php if($user->getAllData($username)['Gender']== 0) echo "selected"; ?> value="0">Male</option>
                                    <option <?php if($user->getAllData($username)['Gender']== 1) echo "selected"; ?> value="1">Female</option>
                                </select>
                                <?php if(isset($genderMsg)) echo "<span style='color:red;'>".$genderMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#Email">Email</label>
                                <input type="email" name='email' id='Email' class='form-control' value='<?php echo $user->getAllData($username)['Email']; ?>'>
                                <?php if(isset($emailMsg)) echo "<span style='color:red;'>".$emailMsg."</span>"; ?>
                            </div>
                            <input type='submit' value='Update' class="btn blue-gradient">
                        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
<!-- Footer -->
<footer class="page-footer font-small blue">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://www.facebook.com/Kirolos.Yossef23" target='_blank'>SlowArrow</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
<?php } 
    else {
        $helper->redirect("http://127.0.0.1/Hospital%20Mangement%20System/");
    }
    include $tpl . "footer.php"; 
    ?>