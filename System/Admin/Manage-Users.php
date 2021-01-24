<?php
    ob_start();
    session_start();
    include "init.php";
    if(isset($_SESSION['Admin'])){
        include "../Class/Admin.php";
        include "../Class/User.php";    
        $page = isset($_GET['page']) ? $_GET['page'] : "manage";
        if($page == "manage"){
?>
            <div class='userPage'>
                <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                <p style="margin:5px 20px;font-size:20px">Manage <span style='font-weight:bold'>Users</span></p>
                    <div class='container Appointment'>
                        <div class='table-responsive'>
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Full Name</th>
                                    <th scope='col'>Address</th>
                                    <th scope='col'>Gender</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Creation Date</th>
                                    <th scope='col'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($user->getAllUsers() as $data){
                                        echo "<tr>";
                                            echo "<td>".$data['ID']."</td>";
                                            echo "<td>".$data['Full_Name']."</td>";
                                            echo "<td>".$data['Address']."</td>";
                                            echo "<td>";
                                                echo $data['Gender']==0?"Male" : "female";
                                            echo"</td>";
                                            echo "<td>".$data['Email']."</td>";
                                            echo "<td>".$data['RegisterDate']."</td>";
                                            echo "<td>";
                                                echo "<a onclick='return confirm(\"Are You Sure you want to Delete this Doctor?\")' href='?page=cancel&id=".$data['ID']."' style='margin-left:7px'><i style='color:#0095FF;font-size:19px' class='color fas fa-times'></i></a>";
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
        } elseif($page == 'cancel'){
            $userId = isset($_GET['id']) ? $_GET['id'] : -1;
            if($user->DeleteUser($userId)){
                echo "<script>alert('User Deleted Successfully')</script>";
                $helper->redirect("back");
            }
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