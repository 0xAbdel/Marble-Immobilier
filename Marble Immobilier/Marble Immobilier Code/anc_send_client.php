<?php
require_once "functions_bdd.php";
    
if (isset($_POST['anc_cntct_client']) &&
    !empty($_POST['sujet']) &&
    !empty($_POST['mess'])) {
    
    $sujet = $_POST['sujet'];
    $mess = $_POST['mess'];

    send_messages($sujet, $mess);
    } else {
        echo "Veuillez remplir tous les champs.";
    } 