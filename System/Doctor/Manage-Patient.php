<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['Doctor'])){
            include "../Class/Patient.php";
            include "../Class/Doctor.php";
            $DocID = $doc->getData($_SESSION['Doctor'])['ID'];
            $page = isset($_GET['page']) ? $_GET['page'] : -1;
            if($page == 'edit'){
                $id = isset($_GET['id']) ? intval($_GET['id']) : -1;
                if(!$patient->getSpecificData($id)){
                    echo "<h1 class='text-center' style='font-size:55px'>Error 404 :(</h1>";
                    $helper->redirect("Dashboard.php",2);
                }
                $patientData = $patient->getSpecificData($id);
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
                        if($patient->updatePatient($pname,$coNum,$email, $gender, $address, $age, $mHistroy,$id)){
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
                            <h5>Edit Patient</h5>
                            <form action='<?php echo $_SERVER['PHP_SELF']. "?page=edit&id=$id"; ?>' method='POST'>
                            <?php if(isset($success)) echo "<span style='color:green;font-weight:bold;font-size:17px'>Patient Updated Successfully</span>"; ?>
                            <div class='form-group'>
                                <label for="#pname">Patient Name</label>
                                <input type="text" name='pname' id='pname' class='form-control' value='<?php echo $patientData['Patient_Name']; ?>'>
                                <?php if(isset($pMsg)) echo "<span style='color:red;'>".$pMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#cnumber">Patient Contact No.</label>
                                <input type="text" name='cnumber' id='cnumber' class='form-control' value='<?php echo $patientData['Patient_Contact']; ?>'>
                                <?php if(isset($cnumMsg)) echo "<span style='color:red;'>".$cnumMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#email">Patient Email</label>
                                <input type="email" name='email' id='email' class='form-control' value='<?php echo $patientData['Patient_Email']; ?>'>
                                <?php if(isset($emailMsg)) echo "<span style='color:red;'>".$emailMsg."</span>"; ?>
                            </div>
                            <label for="Gender">Gender</label>
                            <br>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input <?php if($patientData['Patient_Gender']==0) echo "checked"; ?> type="radio" class="custom-control-input" value='0' id="male" name="gender">
                                <label class="custom-control-label" for="male">Male</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input <?php if($patientData['Patient_Gender']==1) echo 'checked'; ?> type="radio" class="custom-control-input" value='1' id="female" name="gender">
                                <label class="custom-control-label" for="female">Female</label>
                            </div>
                            <br>
                            <br>
                            <div class='form-group'>
                                <label for="#address">Patient Address</label>
                                <input type="text" name='address' id='address' class='form-control' value='<?php echo $patientData['Patient_Address']; ?>'>
                                <?php if(isset($addressMsg)) echo "<span style='color:red;'>".$addressMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#age">Patient Age</label>
                                <input type="text" name='age' id='age' class='form-control' value='<?php echo $patientData['Patient_Age']; ?>'>
                                <?php if(isset($ageMsg)) echo "<span style='color:red;'>".$ageMsg."</span>"; ?>
                            </div>
                            <div class='form-group'>
                                <label for="#mhistory">Medical History</label>
                                <textarea name='mhistory' id='mhistory' class='form-control' placeholder='Enter Patient Medical History(if any)'><?php echo $patientData['Patient_mHistory']; ?></textarea>
                            </div>
                            <input type='submit' value='Update' class="btn blue-gradient">
                        </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                <?php
            } else if($page == 'view'){
                $id = isset($_GET['id']) ? intval($_GET['id']) : -1;
                if(!$patient->getSpecificData($id)){
                    echo "<h1 class='text-center' style='font-size:55px'>Error 404 :(</h1>";
                    $helper->redirect("Dashboard.php",2);
                }
                $patientData = $patient->getSpecificData($id);
                include "../Class/medicalHistory.php";
                if($_SERVER['REQUEST_METHOD']=='POST'){
                    $bp         = filter_var($_POST['bp'],FILTER_SANITIZE_STRING);
                    $bs         = filter_var($_POST['bs'],FILTER_SANITIZE_STRING);
                    $weight     = filter_var($_POST['weight'],FILTER_SANITIZE_STRING);
                    $bt         = filter_var($_POST['bt'],FILTER_SANITIZE_STRING);
                    $Pscp       = filter_var($_POST['Prescription'],FILTER_SANITIZE_STRING);
                    if($MH->addMedical($id,$bp,$bs,$weight,$bt,$Pscp)){
                        $success = true;
                    }
                }
                ?>
                <div class='userPage'>
                    <h1>Doctor | <?php echo strtoupper($helper->getPageName()); ?></h1>
                    <div class='DashboardBox'>
                        <div class='container'>
                                <h5>Manage Patient</h5>
                                <?php if(isset($success)) echo "<p style='color:green'>Medical History Added Succesfully</p>"; ?>
                                <table class="manage-table table table-bordered">
                                    <tr class='text-center'>
                                        <td colspan="4" style="font-size:20px">Patient Details</td>
                                    </tr>
                                    <tr>
                                    <th>Patient Name</th>
                                    <td><?php echo $patientData['Patient_Name']; ?></td>
                                    <th>Patient Email</th>
                                    <td><?php echo $patientData['Patient_Email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Patient Mobile Number</th>
                                    <td><?php echo $patientData['Patient_Contact']; ?></td>
                                    <th>Patient Address</th>
                                    <td><?php echo $patientData['Patient_Address']; ?></td>
                                </tr>
                                    <tr>
                                    <th>Patient Gender</th>
                                    <td><?php echo $patientData['Patient_Gender']==0?"Male":"Female"; ?></td>
                                    <th>Patient Age</th>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <th>Patient Medical History(if any)</th>
                                    <td><?php echo $patientData['Patient_mHistory']==''?'There is No Medical History':$patientData['Patient_mHistory']; ?></td>
                                    <th>Patient Reg Date</th>
                                    <td><?php echo $patientData['Creation_Date']; ?></td>
                                </tr>
                                
                                </table>
                                <table id="datatable" class="manage-table table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <tr align="center">
                                    <td colspan="8" class='text-center'><h5>Medical History</h5></td> 
                                    </tr>
                                    <tr>
                                    <th>#</th>
                                    <th>Blood Pressure</th>
                                    <th>Weight</th>
                                    <th>Blood Sugar</th>
                                    <th>Body Temprature (°C)</th>
                                    <th>Medical Prescription</th>
                                    <th>Visit Date</th>
                                    </tr>
                                    <?php
                                        foreach($MH->getAllData($id) as $data){
                                            echo "<tr>";
                                                echo "<td>".$data['ID']."</td>";
                                                echo "<td>".$data['BloodPressure']."</td>";
                                                echo "<td>".$data['BloodSugar']."</td>";
                                                echo "<td>".$data['Weight']."</td>";
                                                echo "<td>".$data['Temprature']."</td>";
                                                echo "<td>".$data['MedicalPres']."</td>";
                                                echo "<td>".$data['Creation_Date']."</td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </table>
                                <button class='btn btn-primary' id='mhistory'>Add Medical History</button>
                                <div class='medical-history'>
                                    <div class='medicalbox z-depth-1-half'>
                                        <i id='removeMH' style='font-size:15px;cursor:pointer' class='fa fa-times float-right'></i>
                                        <h5>Add Medical History</h5>
                                        <hr>
                                        <form action="<?php $_SERVER['PHP_SELF'] ?>?page=view&id=<?php echo $id; ?>" method="POST">
                                            <div class='form-group'>
                                                <label for="bp">Blood Pressure</label>
                                                <input required type="text" name='bp' id='pb' placeholder='Blood Pressure' class='form-control'>
                                            </div>
                                            <div class='form-group'>
                                                <label for="bs">Blood Sugar</label>
                                                <input required type="text" name='bs' id='ps' placeholder='Blood Sugar' class='form-control'>
                                            </div>
                                            <div class='form-group'>
                                                <label for="weight">Weight</label>
                                                <input required type="text" name='weight' id='weight' placeholder='Weight' class='form-control'>
                                            </div>
                                            <div class='form-group'>
                                                <label for="bt">Body Temprature</label>
                                                <input required type="text" name='bt' id='bt' placeholder='Body Temprature' class='form-control'>
                                            </div>
                                            <div class='form-group'>
                                                <label for="Prescription">Prescription</label>
                                                <textarea required name='Prescription' id='Prescription' placeholder='Prescription' class='form-control'></textarea>
                                            </div>
                                            <div class='form-group float-right'>
                                                <input type="submit" value='add' class='btn btn-primary'>
                                            </div>
                                            <div style='clear:both;'></div>
                                        </form>
                                    </div>
                                </div>
                </div>  
                    </div>  
                        </div>  
                <?php
            } else {
    ?>
        <div class='userPage'>
            <h1>Doctor | <?php echo strtoupper($helper->getPageName()); ?></h1>
            <div class='DashboardBox'>
                <div class='container Appointment'>
                    <div class='table-responsive'>
                    <table class='table table-hover'>
                        <thead>
                            <tr>
                                <th scope='col'>#</th>
                                <th scope='col'>Patient Name</th>
                                <th scope='col'>Patient Contact Number</th>
                                <th scope='col'>Patient Gender</th>
                                <th scope='col'>Creation Date</th>
                                <th scope='col'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($patient->getAllData($DocID) as $data){
                                    $gender = $data['Patient_Gender']==0? 'Male' : 'Female';
                                    echo "<tr>";
                                        echo "<td>".$data['ID']."</td>";
                                        echo "<td>".$data['Patient_Name']."</td>";
                                        echo "<td>".$data['Patient_Contact']."</td>";
                                        echo "<td>".$gender."</td>";
                                        echo "<td>".$data['Creation_Date']."</td>";
                                        echo "<td><a href='?page=edit&id=".$data['ID']."'><i style='color:#0095FF;font-size:13px' class='fa fa-edit'></i></a> || <a href='?page=view&id=".$data['ID']."'><i class='fa fa-eye' style='color:#0095FF;font-size:13px'><i></td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
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
    }
    else {
        $helper->redirect("http://127.0.0.1/Hospital%20Mangement%20System/");
    }
    include $tpl . "footer.php"; 
    ?>