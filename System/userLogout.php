<?php
    session_start();
    include "Class/Helper.php";
    unset($_SESSION['User']);
    $helper->redirect("http://127.0.0.1/Hospital%20Mangement%20System/");
?>