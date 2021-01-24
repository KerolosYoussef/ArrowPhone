<?php
        session_start();
        if(isset($_SESSION['Admin'])){
        include "init.php";
        include "../Class/Admin.php";

    ?>
        <div class='userPage'>
            <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
            <div class='DashboardBox Dashboard'>
                <div class='row'>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='fa fa-user'></i>
                        <h3>Manage Users</h3>
                        <a href="Manage-Users.php">Total Users: <?php echo $admin->countTable("users")["tbl_count"]; ?></a>
                    </div>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='fa fa-user-md'></i>
                        <h3>Manage Doctors</h3>
                        <a href="Manage-Doctors.php">Total Doctors: <?php echo $admin->countTable("doctors")["tbl_count"]; ?></a>
                    </div>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='far fa-calendar-check'></i>
                        <h3>Appointments</h3>
                        <a href="Appointment-History.php">Total Appointments: <?php echo $admin->countTable("appointments")["tbl_count"]; ?></a>
                    </div>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='fa fa-plus-square'></i>
                        <h3>Manage Patients</h3>
                        <a href="Manage-Patients.php">Total Patients: <?php echo $admin->countTable("patients")["tbl_count"]; ?></a>
                    </div>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='fas fa-envelope'></i>
                        
                        <h3>New Messages</h3>
                        <a href="Unreaded-Messages.php">Total Messages: <?php echo $admin->countTable("contact_us")["tbl_count"]; ?></a>
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
        include "../Class/Helper.php";
        $helper->redirect("http://www.hospitalmangement.com");
    }
    include $tpl . "footer.php"; 
    ?>