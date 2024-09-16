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
        Q2();

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
    
    <button id="resultatsMail">Resultats</button><br><br>
    </form>';
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
}

function Q2(){
    if(isset($_POST['resultatsMail'])){
        $monFic = fopen("resultats.txt","r");
        $total = file("resultats.txt");
        $totalInt = count($total);
        $totalDon = 0;
        $message = "";
        $ageTotal = 0;
        while (!feof($monFic)) {
            $ligne = fgets($monFic);
            $ligneSplit = explode("|", $ligne);
            if(count($ligneSplit) < 4){
                break;
            }
            else{
                $don = explode(":", $ligneSplit[3]);
                trim($don[1]);
                $donInt = (int)$don[1];
                $totalDon += $donInt;
                $age = explode(":", $ligneSplit[1]);
                trim($age[1]);
                $ageInt = (int)$age[1];
                $ageTotal += $ageInt;
            }
        }
        fclose($monFic);
        $moyAge = ($ageTotal / $totalInt);
        echo "test <br>";
        echo "$moyAge <br>";
        echo $totalDon;
        $message = "La cagnotte cumule à $totalDon €, la moyenne d'âge est de $moyAge ans";
        //mail("etienne.dumai@gmail.com", "Resultats", $message);

    }
    
}
?>