<?php

require_once "functions_bdd.php";
    
if (isset($_POST['imo_cntct_client']) &&
    !empty($_POST['nom']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['mail']) &&
    !empty($_POST['sujet']) &&
    !empty($_POST['mess'])) {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $sujet = $_POST['sujet'];
    $mess = $_POST['mess'];

    send_contact($nom, $prenom, $mail, $sujet, $mess);
} else {
    echo "Veuillez remplir tous les champs.";
} 