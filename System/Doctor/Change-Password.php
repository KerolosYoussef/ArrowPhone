<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['Doctor'])){
            include "../Class/Doctor.php";
            $dname = $_SESSION['Doctor'];
            $formError=[];
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                if(empty($_POST['password'])){
                    $formError[] = 'Password';
                    $PasswordMsg = 'Current Password Can\'t be Empty';
                }
                if(empty($_POST['nPass'])){
                    $formError[] = 'NPassword';
                    $NpasssMsg = 'New Password Can\'t be Empty';
                }
                if(empty($_POST['cpass'])){
                    $formError[] = 'Cpass';
                    $cpassMsg = 'Confirm Password Can\'t be Empty';
                }
                if(strlen($_POST['nPass']) < 6){
                    $NpasssMsg = 'Password Must be atleast 6 character';
                    $formError[] = 'length';
                }
                if(empty($formError)){
                    $curPass    = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
                    $nPass      = filter_var($_POST['nPass'],FILTER_SANITIZE_STRING);
                    $cPass      = filter_var($_POST['cpass'],FILTER_SANITIZE_STRING);
                    $curPass = sha1($curPass);
                    if($doc->getData($dname)['Password']==$curPass){
                        if($nPass == $cPass){
                            $nPass = sha1($nPass);
                            $success = true;
                            $msg = "Password Changed Successfully";
                            $color = 'green';
                            $doc->updatePassword($nPass,$dname);
                        } else {
                            $success = false;
                            $msg = "Password Doesn't Match";
                            $color = 'red';
                        }
                    } else {
                        $success = false;
                        $msg = "Wrong Password";
                        $color = 'red';
                    }
                }
                
            }
    ?>
        <div class='userPage'>
            <h1>DOCTOR | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                            <h5>Change Password</h5>
                            <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
                            <?php if(isset($success)) echo "<span style='color:$color;font-weight:bold;font-size:17px'>".$msg."</span>"; ?>
                            <div class='md-form'>
                                <label for="password">Current Password</label>
                                <input  type="password" name='password' id='password' class='form-control'>
                                <?php if(isset($PasswordMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$PasswordMsg."</span>"; ?>
                            </div>
                            <div class='md-form'>
                                <label for="#nPass">New Password</label>
                                <input  type="password" name='nPass' id='Npass' class='form-control'>
                                <?php if(isset($NpasssMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$NpasssMsg."</span>"; ?>
                            </div>
                            <div class='md-form'>
                                <label for="#cpass">Confirm Password</label>
                                <input  type='password' name="cpass" id="cpass" class='form-control'>
                                <?php if(isset($cpassMsg)) echo "<span id='ErrorMsg' style='color:red;'>".$cpassMsg."</span>"; ?>
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