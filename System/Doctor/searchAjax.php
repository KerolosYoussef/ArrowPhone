<?php
    require "../Class/Patient.php";
    require "../Class/Helper.php";
    
        if(empty($_POST['search'])){
            $error = "Search Mustn't Be Empty";
        } else {
            $search = filter_var($_POST['search'],FILTER_SANITIZE_STRING);
            $DocID = intval($_POST['docID']);
            if(empty($patient->getAllDataofPatient($DocID,$search))){
                echo "<h1 class='text-center' style='font-size:55px'>Patient \"".$search."\" Not Found</h1>";
                $helper->redirect("Dashboard.php",2);
            }
            $data = $patient->getAllDataofPatient($DocID,$search);
            ?>
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
                           
                            $gender = $data['Patient_Gender']==0? 'Male' : 'Female';
                            echo "<tr>";
                                echo "<td>".$data['ID']."</td>";
                                echo "<td>".$data['Patient_Name']."</td>";
                                echo "<td>".$data['Patient_Contact']."</td>";
                                echo "<td>".$gender."</td>";
                                echo "<td>".$data['Creation_Date']."</td>";
                                echo "<td><a href='Manage-Patient.php?page=edit&id=".$data['ID']."'><i style='color:#0095FF;font-size:13px' class='fa fa-edit'></i></a> || <a href='Manage-Patient.php?page=view&id=".$data['ID']."'><i class='fa fa-eye' style='color:#0095FF;font-size:13px'><i></td>";
                            echo "</tr>";
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
        }
?>