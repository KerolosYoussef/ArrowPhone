<?php
    ob_start();
    session_start();
    if(isset($_SESSION['Admin'])){
        include "init.php";
        include "../Class/Specialization.php";
        include "../Class/Doctor.php";
        include "../Class/Admin.php";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $formErrors = [];
            $docName = $_POST['name'];
            $docSpec = $_POST['spec'];
            $docAddr = $_POST['address'];
            $docFees = $_POST['fee'];
            $contNum = $_POST['num'];
            $email   = $_POST['email'];
            $pass    = $_POST['pass'];
            $cpass   = $_POST['cpass'];
            if($pass != $cpass){
                $formErrors[] = "Wrong Pass";
            }
            if(empty($formErrors)){
                $pass = sha1($pass);
                if($doc->addDoctor($docSpec,$docName,$docAddr,$docFees,$contNum,$email,$pass)){
                    $success = true;
                }
            }
        }
    ?>
        <div class='admin userPage'>
            <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                            <?php echo isset($success) ? "<span style='color:green'>Doctor Added Successfully</span>":''; ?>
                            <h5>Add Doctor</h5>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class='form-group'>
                                    <label for="spec">Doctor Specialization</label>
                                    <select name="spec" id="spec" class='form-control'>
                                        <option disabled selected value="">Select Specialization</option>
                                        <?php
                                            foreach($Specialization->getAllData() as $data){
                                                echo "<option value='".$data['ID']."'>".$data['Specialization']."</option>";
                                            }
                                        ?>
                                    </select>    
                                </div>
                                <div class='form-group'>
                                    <label for="name">Doctor Name</label>
                                    <input class='form-control' id='name' type="text" name='name' placeholder='Enter Doctor Name'>
                                </div>
                                <div class='form-group'>
                                    <label for="address">Doctor Clinic Address</label>
                                    <textarea class='form-control' id='address' type="text" name='address' placeholder='Enter Doctor Clinic Address'></textarea>
                                </div>
                                <div class='form-group'>
                                    <label for="fee">Doctor Consultancy Fees</label>
                                    <input class='form-control' id='fee' type="text" name='fee' placeholder='Enter Doctor Fees'>
                                </div>
                                <div class='form-group'>
                                    <label for="num">Doctor Contact Number</label>
                                    <input class='form-control' id='num' type="text" name='num' placeholder='Enter Doctor Contact Number'>
                                </div>
                                <div class='form-group'>
                                    <label for="email">Doctor Email</label>
                                    <input class='form-control' id='email' type="email" name='email' placeholder='Enter Doctor Email'>
                                </div>
                                <div class='form-group'>
                                    <label for="pass">Password</label>
                                    <input class='form-control' id='pass' type="password" name='pass' placeholder='Enter Password'>
                                </div>
                                <div class='form-group'>
                                    <label for="cpass">Confirm Password</label>
                                    <input class='form-control' id='cpass' type="password" name='cpass' placeholder='Confrim Password'>
                                </div>
                                <input type='submit' name='addSpec' value="Add" class="btn btn-info">
                            </form>
                        </div>                       
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
    ob_end_flush()
    ?>