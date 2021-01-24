<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['User'])){
            include "Class/Specialization.php";
            include "Class/User.php";
            include "Class/Book.php";
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $docSpecID = $_POST['Specialization'];
                $docID     = $_POST['Doctors'];
                $userID    = $user->getAllData($_SESSION['User'])['ID'];
                $fees      = $_POST['Fees'];
                $Date      = $_POST['Date'];
                $time      = $_POST['time'];
                if($book->addAppointment($docSpecID,$userID,$docID,$fees,$Date,$time)){
                    $success = true;
                }
            }
    ?>
    <script>
        function ShowDocs(str) {
                $.post("DoctorAjax.php",{specID: str},function(data,status){
                    if(status=="success"){
                        document.getElementById("Doctors").innerHTML += data;
                    }
                })
            }
        function ShowFees(Str) {
            $.post("FeesAjax.php",{DocID: Str},function(data,status){
                    if(status=="success"){
                        document.getElementById("Fees").innerHTML = "<option>"+ data + " EGP</option>";
                    }
                })
        }
    </script>
        <div class='userPage'>
            <h1>USER | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                            <h5>Book Appointment</h5>
                            <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST'>
                            <?php if(isset($success)) echo "<span style='color:green;font-weight:bold;font-size:17px'>Appointment Added Successfully</span>"; ?>
                            <div class='form-group'>
                                <label for="#Specialization">Doctor Specialization</label>
                                <select onchange="ShowDocs(this.value)" name="Specialization" id="Specialization" class='form-control'>
                                    <option value="">Select Specialization</option>
                                    <?php
                                        foreach($Specialization->getAllData() as $data){
                                            echo "<option value='".$data['ID']."'>".$data['Specialization']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for="#Doctors">Doctors</label>
                                <select onchange="ShowFees(this.value)" name="Doctors" id="Doctors" class='form-control'>
                                        <option disabled selected value="">Select a Doctor</option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for="#fees">Consultancy Fees</label>
                                <select name="Fees" id="Fees" class='form-control fees disabled' readonly></select>
                            </div>
                            <div class='form-group'>
                                <label for="#Date">Date</label>
                                <input type="Date" name='Date' id='Date' class='form-control'>
                            </div>
                            <div class='form-group'>
                                <label for="#time">Time</label>
                                <input type="time" name='time' id='time' class='form-control'>
                            </div>
                            <input type='submit' value='Submit' class="btn blue-gradient">
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