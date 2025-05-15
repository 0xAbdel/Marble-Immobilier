<?php

function get_pdo(){
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=abdel_db1;charset=utf8', 'abdel_db1', 'Abdelelw0106&*');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function get_user_with_mail(string $mail){
    $pdo = get_pdo();
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$mail]);
    return  $stmt->fetch();

}
function get_user($mail){

    $pdo = get_pdo();
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$mail]);
    $user =  $stmt->fetch();
    return $user;
}

function register(string $mail, string  $password){
  if(get_user_with_mail($mail) == false){
    $pdo = get_pdo();
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (email, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$mail, $password]);
    $user = get_user($mail);
    $_SESSION['mail'] = $user['email'];
    $_SESSION['id'] = $user['id'];
    $_SESSION["connected"] = true;
    header('Location: cnx_connected.php');
  }
  else{
    header('Location: login.php');
  }
  
}

function signin($mail, $password){
  if(get_user_with_mail($mail) != false){
    $user = get_user($mail);
    if(password_verify($password, $user['password'])){
      $_SESSION['mail'] = $user['email'];
      $_SESSION['id'] = $user['id'];
      $_SESSION["connected"] = true;
      header('Location: cnx_connected.php');
      }
  }
  else{
    header('Location: cnx_login.php');
  }
}

function add_annonce($titre, $descr, $pieces, $surface, $prix, $images, $categorie, $user_id){
  $pdo = get_pdo();
  $query = "INSERT INTO annonces (titre, descr, pieces, surface, prix, images, categorie, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $result = $stmt->execute([$titre, $descr, $pieces, $surface, $prix, $images, $categorie, $user_id]);
  if($result){
    header('Location: cnx_connected.php');
  }
  else{
    header('Location: anc_add.php');
  }
}

function update_annonces($id, $titre, $descr, $pieces, $surface, $prix, $images, $categorie) {
  $pdo = get_pdo();
  if ($images) {
      $query = "UPDATE annonces SET titre = ?, descr = ?, pieces = ?, surface = ?, prix = ?, images = ?, categorie = ? WHERE id = ?";
      $stmt = $pdo->prepare($query);
      return $stmt->execute([$titre, $descr, $pieces, $surface, $prix, $images, $categorie, $id]);
  } else {
      $query = "UPDATE annonces SET titre = ?, descr = ?, pieces = ?, surface = ?, prix = ?, categorie = ? WHERE id = ?";
      $stmt = $pdo->prepare($query);
      return $stmt->execute([$titre, $descr, $pieces, $surface, $prix, $categorie, $id]);
  }
}

function get_all_annonces_admin(){
  $pdo = get_pdo();
  $query = "SELECT titre,id FROM annonces";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $articles = $stmt->fetchAll();
  return $articles;
}

function delete_annonces($id){
  $pdo = get_pdo();
  $query = "DELETE FROM annonces WHERE id = ?";
  $stmt = $pdo->prepare($query);
  $result = $stmt->execute([$id]);
  if($result){
    header('Location: cnx_connected.php');
  }
  else{
    header('Location: cnx_connected.php');
  }
}

function get_one_annonce($id){
  $pdo = get_pdo();
  $query = "SELECT * FROM annonces WHERE id = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$id]);
  $article = $stmt->fetch();
  return $article;
}

function send_messages($sujet, $mess) {
  $pdo = get_pdo();
  $query = "INSERT INTO messages (sujet, mess) VALUES (?, ?)";
  $stmt = $pdo->prepare($query);
  $result = $stmt->execute([$sujet, $mess]);
  if($result){
      header('Location: imo_achat.php');
  } else {
      echo "Erreur lors de l'envoi du message.";
  }
}   

function send_contact($nom, $prenom, $mail, $sujet, $mess) {
  $pdo = get_pdo();
  $query = "INSERT INTO contact (nom, prenom, mail, sujet, mess) VALUES (?, ?, ?, ?, ?)";
  $stmt = $pdo->prepare($query);
  $result = $stmt->execute([$nom, $prenom, $mail, $sujet, $mess]);
  if($result){
      header('Location: index.php');
      exit;
  } else {
      echo "Erreur lors de l'envoi du message.";
  }
}