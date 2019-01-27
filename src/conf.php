<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start(); 
} 
//define application path
if(!isset($_SESSION['application_path'])){
    $_SESSION['application_path']=$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['PHP_SELF']);
}

?>