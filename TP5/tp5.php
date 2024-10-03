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
fopen("config.ini", "r");
if (!file_exists("Form1.html")) {
    touch("Form1.html");
}
$filepath = 'config.ini';
$data = fopen($filepath, "r");
$tabNouvellesValeurs = [];
//parcourir le fichier
while (!feof($data)){
    //lire la ligne
    $ligne = fgets($data);
    //si la ligne ne contient pas un crochet ouvrant
    if ($ligne[0] != "[") {
        //ajouter la ligne dans le tableau
        array_push($tabNouvellesValeurs, $ligne);
    }
}
//fermer le fichier
fclose($data);

?>