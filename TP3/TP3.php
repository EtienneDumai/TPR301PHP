<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="photoCount">Nombre de photos :</label>
        <input type="number" id="photoCount" name="photoCount" min="1" required>
        <br>
        <input type="submit" value="Envoyer" name="submit">
    </form>
</body>
</html>
<?php
    $uploadCount = 0;
    if (isset($_POST['submit'])) {
        $uploadCount = $_POST['photoCount'];
        echo "<form method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='uploadCount' value='$uploadCount'>";
        for ($i=0; $i < $uploadCount ; $i++) { 
            echo "<input type='file' name='file$i' id='file$i'><br>";
        }
        echo "<input type='submit' value='Envoyer les fichiers' name='submitPhotos'>";
        echo "</form>";
    
    }
    if (isset($_POST['submitPhotos'])) {
        $uploadDir = 'upload/';
        //creer le dossier si il n'existe pas
        if(!is_dir($uploadDir)){
            mkdir($uploadDir, 0777, true);
        }
        $uploadCount = $_POST['uploadCount'];
        for ($i=0; $i < $uploadCount; $i++) { 
            $nomImage = 'file' . $i;
            if (isset($_FILES[$nomImage])) {
                $currentFile = $_FILES[$nomImage];
                $fileName = basename($currentFile['name']);
                if(move_uploaded_file($currentFile['tmp_name'], $uploadDir . $fileName)) {
                    echo "Photo $i : $fileName uploadée avec succès.<br>";
                } 
                else {
                    echo "Erreur lors de l'upload de la photo $i.<br>";
                }
            }
            else {
                echo "Erreur avec la photo $i.<br>";
            }
        }
    }

?>