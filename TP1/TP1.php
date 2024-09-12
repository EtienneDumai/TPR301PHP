<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP1</title>
</head>
<body>
    <?php
        Q2($_SERVER['REMOTE_ADDR']);
        Q3(fichier: "restos.csv");
    ?>
</body>
</html>
<?php
    function Q2($ip){

    echo "<p> $ip </p>";
    $classe = explode('.', $ip);
    var_dump($classe);
    if ($classe[0]<128) {
        echo "<p> classe A !! </p>";
    }
    elseif ($classe[0]>127) {
        echo "<p> classe B !! </p>";
    }
    elseif ($classe[0]<192) {
        echo "<p> classe C !! </p>";
    }
    else {
        echo "<p> ya un probleme quelque part </p>";
    }
    } 
    function Q3($fichier){
        $monFic = fopen($fichier,"r+");
        while (!feof($monFic)) {
            $ligne = fgetcsv($monFic,255,";");
            echo '<p> <strong>Nom </strong> : '.$ligne[1]. '</p>';
            echo'<p> <strong>Prenom </strong> : '.$ligne[0] .'</p>';
            echo'<p> <strong>Restaurant </strong> : '.$ligne[2].' </p>';
        }
        fclose($monFic);
    
}
?>