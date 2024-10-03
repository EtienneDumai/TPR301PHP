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
for ($i=0; $i < count(file($ficData)); $i++) { 
    if (file($data)[0] != "[" ) {
        array_push($tabNouvellesValeurs, $data[$i]);
    }
}
?>