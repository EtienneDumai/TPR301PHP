<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
$bdd= "bourse"; // Base de données
$host= "localhost";
$user= "root"; // Utilisateur
$pass= ""; // mp
$nomtable= "bourse"; /* Connection bdd */
print "Tentative de connexion sur sitebd<br>";
$link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de
données");
?>