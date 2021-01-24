<?php
    include "Class/Doctor.php";
    $DocID = intval($_POST['DocID']);
    echo $doc->getAllData($DocID)['DocFees']; 
?>