<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['Doctor'])){
            include "../Class/Appointment.php";
            include "../Class/Doctor.php";
            $DocID = $doc->getData($_SESSION['Doctor'])['ID'];
            $page = isset($_GET['page']) ? $_GET['page'] : -1;
            if($page == 'cancel'){
                $id = isset($_GET['ID']) ? intval($_GET['ID']) : -1;
                if($apt->cancelAppointment($id)){
                    $helper->redirect("back");
                } else {
                    echo "<h1 class='text-center'>Error 404</h1>";
                    $helper->redirect("back",2);
                }
            }
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
                                <th scope='col'>Specialization</th>
                                <th scope='col'>Consultancy Fee</th>
                                <th scope='col'>Appointment Date / Time</th>
                                <th scope='col'>Appointment Creation Date</th>
                                <th scope='col'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($apt->getAllDataForDoctor($DocID) as $data){
                                    echo "<tr>";
                                        echo "<td>".$data['A_ID']."</td>";
                                        echo "<td>".$data['Full_Name']."</td>";
                                        echo "<td>".$data['Specialization']."</td>";
                                        echo "<td>".$data['consultancyFees']." EGP</td>";
                                        echo "<td>".$data['appointmentDate']." / ".$data['appointmentTime']."</td>";
                                        echo "<td>".$data['Creation_Date']."</td>";
                                        echo "<td><a onclick=\"return confirm('Are You Sure you want to cancel this appointment?')\" href='?page=cancel&ID=".$data['A_ID']."'>Cancel</a></td>";
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
    else {
        $helper->redirect("http://127.0.0.1/Hospital%20Mangement%20System/");
    }
    include $tpl . "footer.php"; 
    ?>