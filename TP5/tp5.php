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
$HTMLscript = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
</head>
<body>
    
";
$filePath = "config.ini";
$data = fopen($filePath, "r");
$tabNouvellesValeurs = [];
//parcourir le fichier
while (!feof($data)){
    //lire la ligne
    $ligne = fgets($data);
    //si la ligne ne contient pas un crochet ouvrant
    if ($ligne[0] != "[") {
        //ajouter la ligne dans le tableau
        array_push($tabNouvellesValeurs, trim($ligne));
    }
}
//fermer le fichier
fclose($data);
//créer un fichier html
$nomFichier = $tabNouvellesValeurs[0].'.html';
//mettre un form dans le contenu du fic html
$HTMLscript .= "<form method='post'>";
//parcourir le tableau
for ($i=2; $i < count($tabNouvellesValeurs) ; $i++) { 
    //ajouter un label et un input
    $HTMLscript .= "<label for='".strtolower($tabNouvellesValeurs[$i])."'>".strtolower($tabNouvellesValeurs[$i])."</label>";
    $HTMLscript .= "<input type='text' id='".strtolower($tabNouvellesValeurs[$i])."' name='".strtolower($tabNouvellesValeurs[$i])."'><br><br>";
}
//fermer les balises à la fin du fichier html
$HTMLscript .= "</form> </body> </html>";
//ouvrir le fichier en écriture
$monFic = fopen($nomFichier,"w");
//écrire le contenu
fwrite($monFic, $HTMLscript);
//fermer le fichier
fclose($monFic);


?>