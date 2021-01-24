<?php
    include "Class/Doctor.php";
    $specID = intval($_POST['specID']);
    foreach($doc->getSpecData($specID) as $data){
        echo "<option value='".$data['ID']."'>".$data['Name']."</option>";
    }
?>