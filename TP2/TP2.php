<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
</head>
<body>
<h2>Formulaire de Don Caritatif</h2>
    
</body>
</html>
    <?php
        Q1();
       
    ?>
</body>
</html>
<?php
    function Q1(){
        
        
            echo '<br><form id="formulaire" method="post">

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"  required><br><br>

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" min="18"  required><br><br>

        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail"  required><br><br>

        <label for="don">Valeur du don (€) :</label>
        <input type="number" id="don" name="don" step="0.01" min="1"  required><br><br>

        <input type="submit" name="submit" value="Faire un don">
    </form>
    <button id="resultatsMail">Resultats</button><br><br>';
    if(isset($_POST['submit'])){
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        $mail = $_POST['mail'];
        $don = $_POST['don'];
        echo "Nom : $nom | Âge : $age | Email : $mail | Don : $don € ";
        $monFic = fopen("resultats.txt","a+");
        fwrite($monFic, "Nom : $nom | Âge : $age | Email : $mail | Don : $don € \n");
        fclose($monFic);

        
    }
        Q2();
    }
    function Q2(){
        if(isset($_POST['resultatsMail'])){
            while (!feof($monFic)) {
                $addrMail=0;
                $message = fgets($monFic);
                $messageSplit = explode("|", $message);
                $mail = explode(":", $messageSplit[2]);
                mail($mail[$addrMail], "Resultats", $message);
                $addrMail++;
            }
        }
    };
?>