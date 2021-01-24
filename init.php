<?php
// Routes
    $css    = "Design/Css/";
    $js     = "Design/JS/";
    $func   = "Includes/functions/";
    $tpl    = "Includes/templates/";
    $img    = "Design/Images/";
// Include Header
    include $tpl . "header.php";
// remove the navbar from certain pages
if(!isset($nonavbar)){
    include $tpl . "Navbar.php";
} else {
}