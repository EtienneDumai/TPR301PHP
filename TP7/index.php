<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    
    if ($_SESSION['connexionOk'] == false) {
        header('Location: login.php');
    }  
        $bdd= "bourse"; // Base de données
        $host= "localhost";
        $user= "root"; // Utilisateur
        $pass= ""; // mp
        $nomtable= "bourse"; /* Connection bdd */

        $largeur = 400;
        $hauteur = 600;
        $nbIndicesBD = 60;
        $image = ImageCreateTrueColor($largeur, $hauteur);

        $link=mysqli_connect($host,$user,$pass,$bdd) or die( "Impossible de se connecter à la base de données");

        $requete = "SELECT * FROM $nomtable";
        $resultat = mysqli_query($link, $requete);

        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $idImage = ImageCreateTrueColor($largeur, $hauteur);
        $bgColor = imagecolorallocate($idImage, 255, 128, 0);
        imageFill($idImage, 0, 0, $bgColor);

        // Valeurs numériques pour les dessins
        $numberRows = mysqli_num_rows($resultat);
        $pixelParLigne = round($largeur / $numberRows);
        $pixelParColonne = round($hauteur / $nbIndicesBD);

        // Valeurs de départ 
        $xStart = 0;
        $xEnd = 0;
        $yDebut = 0;
        $yFin = 0;
        
        // Parcours des résultats
        while($data = mysqli_fetch_assoc($resultat))
        {
            $indice = $data['indice'];
            $ville = $data['ville'];

            // Envoyer les x & y de fin la ou ils doivent etre
            $yFin = round($pixelParColonne * $indice, 0);
            $xEnd += $pixelParLigne;

            // Récupérer les emplacements exacts
            $xSupGauche = $xStart;
            $ySupGauche = $hauteur - $yDebut;
            $xInfDroit = $xEnd;
            $yInfDroit = $hauteur - $yFin;

            // Nom de la ville 
            $nomVille = $ville . ' - ' . $indice;

            switch ($ville) {
                case 'NY':
                    $couleur = imagecolorallocate($idImage, 255, 0, 0); // Rouge
                    break;
    
                case 'Paris':
                    $couleur = imagecolorallocate($idImage, 0, 255, 0); // Vert
                    break;
    
                case 'Tokyo':
                    $couleur = imagecolorallocate($idImage, 255, 255, 255); // Noir
                    break;
    
                case 'Bordeaux':
                    $couleur = imagecolorallocate($idImage, 0, 0, 0); // Blanc
                    break;
    
                case 'Aveyron':
                    $couleur = imagecolorallocate($idImage, 125, 125, 0); // Jaune
                    break;
    
                case 'Bazas':
                    $couleur = imagecolorallocate($idImage, 0, 125, 125); // Cyan
                    break;
                
                default:
                    $couleur = imagecolorallocate($idImage, 125, 0, 125); // Violet
                    break;
            }

            imageFilledRectangle($idImage, $xSupGauche, $ySupGauche, $xInfDroit, $yInfDroit, $couleur);

            $couleurEcriture = imagecolorallocate($idImage, 255, 0, 0); // Noir
            imageStringUp($idImage, 3, $xSupGauche + 15, $yInfDroit - 20, $nomVille, $couleurEcriture);
            $xStart = $xEnd;
        }

        // sauvegarde de l'image
        $path = 'img/image.jpeg';
        if(!file_exists('img')){
            mkdir('img', 0777, true);
        }

        imageJpeg($idImage, $path);
        mysqli_close($link);
        ImageDestroy($image);

        echo "<img src='img/image.jpeg'>";
        echo "<form method = 'post'><button name='deconnexion'>Deconnexion</button></form>";
        if (isset($_POST['deconnexion'])) {
            session_destroy();
            header('Location: login.php');
        }
    ?>
</body>
</html>