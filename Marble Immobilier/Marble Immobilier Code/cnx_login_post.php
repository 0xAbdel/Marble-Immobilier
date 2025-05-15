<?php
session_start();
require_once "functions_bdd.php";

if(isset($_POST['signin']) && 
!empty($_POST['mail']) && 
!empty($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    signin($mail,$password);
   
   
}else{
    header('Location: cnx_login.php');
}