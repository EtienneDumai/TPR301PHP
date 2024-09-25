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
        for ($i=0; $i < $uploadCount ; $i++) { 
            echo "<input type='file' name='photo$i' id='photo$i'><br>";
        }
        echo "</form>";
    }
    
?>