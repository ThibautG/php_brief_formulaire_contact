<?php
// Démarrage de la session $_SESSION
session_start();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intro : Liste des messages</title>
    <link href="./message.css" rel="stylesheet" />
</head>
<body>
<h1>Liste des messages</h1>
<!-- utilisation balise iframe mais pas très utile car on n'utilise pas de php -->
<!-- <iframe src="message.txt"></iframe> -->
<?php
// Affichage du message stocké en session
    echo "<pre>" . htmlspecialchars(file_get_contents("message.txt")) . "</pre>";
    // utilisation de balise pre pour mise en forme


?>
</body>
</html>
