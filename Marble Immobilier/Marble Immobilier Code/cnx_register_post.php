<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once "functions_bdd.php";

if(isset($_POST['register']) && 
!empty($_POST['mail']) && 
!empty($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    register($mail,$password);
   
}else{
    header('Location: cnx_register.php');
}