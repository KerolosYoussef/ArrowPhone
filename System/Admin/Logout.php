<?php
    session_start();
    include "../Class/Helper.php";
    unset($_SESSION['Admin']);
    $helper->redirect("127.0.0.1");
?>