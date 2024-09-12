<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP2</title>
</head>
<body>
<h2>Formulaire de Don Caritatif</h2>
    <form action="/submit-donation" method="POST">
        <!-- Champ Nom -->
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <!-- Champ Âge -->
        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" min="18" required><br><br>

        <!-- Champ Email -->
        <label for="mail">Email :</label>
        <input type="email" id="mail" name="mail" required><br><br>

        <!-- Champ Valeur du Don -->
        <label for="don">Valeur du don (€) :</label>
        <input type="number" id="don" name="don" step="0.01" min="1" required><br><br>

        <!-- Bouton de soumission -->
        <input type="submit" value="Faire un don">
    </form>
</body>
</html>
    <?php
        
    ?>
</body>
</html>
<?php
    function Q1(){

    };
?>