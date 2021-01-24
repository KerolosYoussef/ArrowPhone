<?php
    ob_start();
    session_start();
    include "init.php";
    if(isset($_SESSION['Admin'])){
        include "../Class/Contact.php";
        $page = isset($_GET['page']) ? $_GET['page'] : "manage";
        if($page == "manage"){
?>
            <div class='userPage'>
                <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                <p style="margin:5px 20px;font-size:20px">Manage <span style='font-weight:bold'>Unreaded Messages</span></p>
                    <div class='container Appointment'>
                        <div class='table-responsive'>
                        <table class='table table-hover'>
                            <thead>
                                <tr>
                                    <th scope='col'>#</th>
                                    <th scope='col'>Name</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Contact No.</th>
                                    <th scope='col'>Message</th>
                                    <th scope='col'>Posted Date</th>
                                    <th scope='col'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($contact->getMessages() as $data){
                                        echo "<tr>";
                                            echo "<td>".$data['ID']."</td>";
                                            echo "<td>".$data['Full_Name']."</td>";
                                            echo "<td>".$data['Email']."</td>";
                                            echo "<td>".$data['contact_no']."</td>";
                                            echo "<td>".$data['Message']."</td>";
                                            echo "<td>".$data['Posting_Date']."</td>";
                                            echo "<td>";
                                                echo "<a href='?page=view&id=".$data['ID']."'><i style='color:#0095FF;font-size:25px' class='far fa-file'></i></a>";
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
        } elseif($page == 'view'){
            $id = isset($_GET['id']) ? $_GET['id'] : -1;
            $contact->markAsRead($id);
            ?>
            <div class='userPage'>
                <h1>ADMIN | <?php echo strtoupper($helper->getPageName()); ?></h1>
                <div class='DashboardBox'>
                <p style="margin:5px 20px;font-size:20px">Manage <span style='font-weight:bold'>Unreaded Messages</span></p>
                <div class="container">
                    <table class="messages table table-hover" id="sample-table-1">
                        <tbody>
                            <tr>
                                <th>Full Name</th>
                                <td><?php echo $contact->getCertainMessages($id)['Full_Name'] ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $contact->getCertainMessages($id)['Email'] ?></td>
                            </tr>
                            <tr>
                                <th>Conatact Number</th>
                                <td><?php echo $contact->getCertainMessages($id)['contact_no'] ?></td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td><?php echo $contact->getCertainMessages($id)['Message'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        </div>
        </div>
        </div>
     <?php } ?>
    
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