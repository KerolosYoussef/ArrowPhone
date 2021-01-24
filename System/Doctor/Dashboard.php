<?php
        session_start();
        if(isset($_SESSION['Doctor'])){
        include "init.php";
    ?>
        <div class='userPage'>
            <h1>Doctor | <?php echo strtoupper($helper->getPageName()); ?></h1>
            <div class='DashboardBox Dashboard'>
                <div class='row'>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='fa fa-user'></i>
                        <h3>My Profile</h3>
                        <a href="Edit-Profile.php">Update Profile</a>
                    </div>
                    <div class='box col-sm-3'>
                        <i style='color:#0095FF' class='far fa-calendar-check'></i>
                        <h3>My Appointments</h3>
                        <a href="Appointment-History.php">View Appointments History</a>
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