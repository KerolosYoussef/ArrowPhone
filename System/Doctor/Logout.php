<?php
    session_start();
    include "../Class/Helper.php";
    unset($_SESSION['Doctor']);
    $helper->redirect("http://www.hospitalmangement.com/");
?>