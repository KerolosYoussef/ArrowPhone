<?php
        session_start();
        include "init.php";
        if(isset($_SESSION['Admin'])){
        include "../Class/Specialization.php";
        include "../Class/Admin.php";
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $spec = $_POST['add'];
            if($Specialization->addspec($spec)){
                $specSuccess  = true;
            }
        }
    ?>
        <div class='admin userPage'>
            <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                    <div class='container'>
                        <div class='EditBox'>
                            <h5>Add Doctor Specialization</h5>
                            <?php if(isset($specSuccess)) echo "<p style='color:green'>Specilization Added Successfully</p>"; ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="text" id='add' placeholder='Add Doctor Specialization' name='add' class='form-control'>
                                <input type='submit' value="Add" class="btn btn-info">
                            </form>
                        </div>
                        <p>Manage <b style='font-weight:bold;'>Docter Specialization</b></p>
                        <div class='Appointment'>
                            <div class='table-responsive'>
                            <table class='text-left table table-hover'>
                                <thead>
                                    <tr>
                                        <th scope='col'>#</th>
                                        <th scope='col'>Specialization</th>
                                        <th scope='col'>Creation Date</th>
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach($Specialization->getAllData() as $data){
                                            echo "<tr>";
                                                echo "<td>".$data['ID']."</td>";
                                                echo "<td>".$data['Specialization']."</td>";
                                                echo "<td>".$data['Creation_Date']."</td>";
                                                echo "<td>";
                                                    echo "<a href='?page=edit&id=".$data['ID']."'><i style='color:#0095FF;font-size:15px' class='color fas fa-pencil-alt'></i></a>";
                                                    echo "<a onclick='return confirm(\"Are You Sure you want to Delete this Specialization?\")' href='?page=cancel&id=".$data['ID']."' style='margin-left:7px'><i style='color:#0095FF;font-size:19px' class='color fas fa-times'></i></a>";
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