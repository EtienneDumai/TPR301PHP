<?php
header("Content-type: image/jpeg"); // ATTENTION, respecter scrupuleusement la syntaxe
 // Pas d’espace avant « : » un espace après).
$bdd= "bourse"; // Base de données
$host= "localhost";
$user= "root"; // Utilisateur
$pass= ""; // mp
$nomtable= "bourse"; /* Connection bdd */
$largeur = 400;
$hauteur = 600;
$nbIndicesBD = 60;
$idImage = imagecreatetruecolor($largeur, $hauteur);
$link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de
données");

$requete = "SELECT * FROM $nomtable";
$result = mysqli_query($link,$requete) or die("Erreur dans la requête SQL");
$couleurBackground = imagecolorallocate($idImage, 255, 128, 0); //Orange 
imagefill($idImage, 0, 0, $couleurBackground);
x
imagejpeg($idImage);
imagedestroy($idImage);

?>