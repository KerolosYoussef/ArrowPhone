<?php
    ob_start();
    session_start();
    include "init.php";
    if(isset($_SESSION['Admin'])){
        include "../Class/Admin.php";
        include "../Class/Patient.php";    
        $page = isset($_GET['page']) ? $_GET['page'] : "manage";
        if($page == "manage"){
?>
            <div class='userPage'>
                <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                <p style="margin:5px 20px;font-size:20px">Manage <span style='font-weight:bold'>Patients</span></p>
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
                                    foreach($patient->getPatients() as $data){
                                        echo "<tr>";
                                            echo "<td>".$data['ID']."</td>";
                                            echo "<td>".$data['Patient_Name']."</td>";
                                            echo "<td>".$data['Patient_Contact']."</td>";
                                            echo "<td>";
                                                echo $data['Patient_Gender']==0?"Male" : "female";
                                            echo"</td>";
                                            echo "<td>".$data['Creation_Date']."</td>";
                                            echo "<td>";
                                                echo "<a href='?page=view&id=".$data['ID']."'><i class='fa fa-eye' style='color:#0095FF;font-size:13px'><i>";
                                            echo "</td>";
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
                <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
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
                        <?php if(empty($MH->getAllData($id))){
                                echo "<div class='alert alert-info text-center'>There is No Medical Histroy</div>";
                            } else { ?>
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
                        <?php } ?>
                    </div>  
                </div>  
            </div>  
        </div>
        </div>
            <?php
        }
    ?>
<!-- Footer -->
<footer class="page-footer font-small blue">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="https://www.facebook.com/Kirolos.Yossef23" target='_blank'>SlowArrow</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</div>
<?php
    } else {
        $helper->redirect("http://127.0.0.1/Hospital%20Mangement%20System/");
    }
    include $tpl . "footer.php"; 
    ob_end_flush();
    ?>