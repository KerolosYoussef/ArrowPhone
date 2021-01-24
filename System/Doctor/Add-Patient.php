<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['Doctor'])){
            include "../Class/Doctor.php";  
            include "../Class/Patient.php";  
            $username = $_SESSION['Doctor'];
            $formError=[];
            $docID = $doc->getData($username)['ID'];
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                // Validating The Data
                if(empty($_POST['pname'])){
                    $pMsg = "Patient Name Mustn't Be Empty";
                    $formError[]= 'pname';
                }
                if(empty($_POST['cnumber'])){
                    $cnumMsg = "Contact Number Mustn't Be Empty";
                    $formError[]= 'cnumber';
                }
                if(empty($_POST['email'])){
                    $emailMsg = "Email Mustn't Be Empty";
                    $formError[]= 'Email';
                }
                if(empty($_POST['address'])){
                    $addressMsg = "Address Mustn't Be Empty";
                    $formError[]= 'address';
                }
                if(empty($_POST['age'])){
                    $ageMsg = "Age Mustn't Be Empty";
                    $formError[]= 'age';
                }
                if(empty($formError)){
                    // Filtering The Data
                    $pname      = filter_var($_POST['pname'],FILTER_SANITIZE_STRING);
                    $coNum      = filter_var($_POST['cnumber'],FILTER_SANITIZE_NUMBER_INT);
                    $age        = filter_var($_POST['age'],FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                    $address    = filter_var($_POST['address'],FILTER_SANITIZE_STRING);
                    $gender     = $_POST['gender'];
                    $email      = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
                    $mHistroy   = filter_var($_POST['mhistory'],FILTER_SANITIZE_STRING);
                    if($patient->AddPatient($docID,$pname,$coNum,$email, $gender, $address, $age, $mHistroy)){
                        $success = true;
                    } else {
                        $emailMsg = "This Email Already Exists";
                    }
                }  
            }
    ?>
        <div class='userPage'>
            <h1>Doctor | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                            <h5>Add Patient</h5>
                            <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
                            <?php if(isset($success)) echo "<span style='color:green;font-weight:bold;font-size:17px'>Patient Added Successfully</span>"; ?>
                            <div class='form-group'>
                                <label for="#pname">Patient Name</label>
                                <input type="text" name='pname' id='pname' class='form-control' placeholder='Enter Patient Name'>
                                <?php if(isset($pMsg)) echo "<span style='color:red;'>".$pMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#cnumber">Patient Contact No.</label>
                                <input type="text" name='cnumber' id='cnumber' class='form-control' placeholder='Enter Patient Contact Number'>
                                <?php if(isset($cnumMsg)) echo "<span style='color:red;'>".$cnumMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#email">Patient Email</label>
                                <input type="email" name='email' id='email' class='form-control' placeholder='Enter Patient Email'>
                                <?php if(isset($emailMsg)) echo "<span style='color:red;'>".$emailMsg."</span>"; ?>
                            </div>
                            <label for="Gender">Gender</label>
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
                            <div class='form-group'>
                                <label for="#address">Patient Address</label>
                                <input type="text" name='address' id='address' class='form-control' placeholder='Enter Patient Address'>
                                <?php if(isset($addressMsg)) echo "<span style='color:red;'>".$addressMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#age">Patient Age</label>
                                <input type="text" name='age' id='age' class='form-control' placeholder='Enter Patient Age'>
                                <?php if(isset($ageMsg)) echo "<span style='color:red;'>".$ageMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#mhistory">Medical History</label>
                                <textarea name='mhistory' id='mhistory' class='form-control' placeholder='Enter Patient Medical History(if any)'></textarea>
                            </div>
                            <input type='submit' value='Add' class="btn blue-gradient">
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