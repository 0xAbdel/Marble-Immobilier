<?php
session_start();
require_once "functions_bdd.php";


if (isset($_POST['anc_update'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $descr = $_POST['descr'];
    $pieces = $_POST['pieces'];
    $surface = $_POST['surface'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    
    // Gestion de l'image
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "images/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $images = $image;
        } else {
            $images = null;
        }
    } else {
        $images = null; // Ou gérer l'absence d'image différemment si besoin
    }

    if (update_annonces($id, $titre, $descr, $pieces, $surface, $prix, $images, $categorie)) {
        header('Location: cnx_connected.php');
        exit();
    } else {
        header('Location: anc_update.php?id=' . $id);
        exit();
    }
} else {
    header('Location: cnx_login.php');
    exit();
}