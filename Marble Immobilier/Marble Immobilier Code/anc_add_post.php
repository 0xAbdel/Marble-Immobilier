<?php
session_start();
require_once "functions_bdd.php";

function upload_image($file, $destination_dir = 'images/') {
    // Vérifier si le répertoire de destination existe, sinon le créer
    if (!is_dir($destination_dir)) {
        mkdir($destination_dir, 0777, true);
    }

    // Vérifier s'il y a une erreur lors du téléchargement
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "Erreur upload : " . $file['error'];
        return null;
    }

    // Générer un nom de fichier unique
    $filename = uniqid() . '-' . basename($file['name']);
    $target_file = $destination_dir . $filename;

    // Déplacer le fichier téléchargé vers le répertoire de destination
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return $filename;
    }else {
        echo "Échec move_uploaded_file vers : $target_file<br>";
        echo "Fichier temporaire : " . $file['tmp_name'];
    }

    return null;
}

if (isset($_POST['anc_add']) && 
    !empty($_POST['titre']) && 
    !empty($_POST['descr']) &&
    !empty($_POST['pieces']) &&
    !empty($_POST['surface']) &&
    !empty($_POST['prix']) &&
    !empty($_FILES['image']) &&
    !empty($_POST['categorie'])) {
    
    $titre = $_POST['titre'];
    $descr = $_POST['descr'];
    $pieces = $_POST['pieces'];
    $surface = $_POST['surface'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $user_id = $_SESSION['user_id'];

    // Télécharger l'image
    $image_filename = upload_image($_FILES['image']);

    if ($image_filename) {
        // Enregistrer les informations de l'annonce dans la base de données
        add_annonce($titre, $descr, $pieces, $surface, $prix, $image_filename, $categorie, $user_id);
        echo "L'annonce a été ajoutée avec succès.";
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
} else {
    header('Location: cnx_login.php');
    exit;
}
