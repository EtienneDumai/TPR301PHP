<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
$_SESSION['connexionOk'] = false;
echo "<form method = 'post'>
    <input type='text' name='login' placeholder='login' required='required'>
    <input type='password' name='password' placeholder='password' required='required'>
    <input type='submit' value='Connexion' name='Connect'>
    </form>";
if (isset($_POST['Connect'])) {
    if ($_POST['login'] == 'admin' && $_POST['password'] == 'admin') {
        echo "Connexion réussie";
        $_SESSION['connexionOk'] = true;
        header('Location: index.php');
    } else {
        echo "Connexion échouée";
    }
}
?>