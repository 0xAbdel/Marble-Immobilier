<?php
session_start();
require_once "functions_bdd.php";

if(isset($_POST['delete']) && 
!empty($_POST['id'])) {
    $id = $_POST['id'];
    delete_annonces($id);
}else{
    header('Location: cnx_login.php');
}