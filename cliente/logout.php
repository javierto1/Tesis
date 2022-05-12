<?php 
    session_start(); 
    session_destroy();   
    header('location: http://www.noconvencional.com'); 
    exit();
?>