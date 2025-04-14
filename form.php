<?php

//connexion a la base de donnees
try{
    $bdd = new PDO('mysql:host=localhost;dbname=prubelifeacademy;charset=utf8', 'root', '');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$requette = $bdd->query('SELECT Nom, Prenom,Email,Profil Linkedin,Votre_message from users ');


//liberer la connexion
$requette->closeCursor();

//ajouter un nouvel utilisateur
if(isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['Email']) && isset($_POST['Profil Linkedin']) && isset($_POST['Votre_message']) ){
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $email = $_POST['Email'];
    $profil = $_POST['Profil Linkedin'];
    $message = $_POST['Votre_message'];

    $requette = $bdd->prepare('INSERT INTO users(Nom, Prenom, Email,Profil Linkedin,Votre_message) VALUES(?, ?, ?, ?, ?)');
    $requette->execute();
  
}



?>