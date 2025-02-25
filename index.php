<?php
// Démarrage de la session $_SESSION
session_start();

// Vérification de la soumission du formulaire via la method post
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // $_SERVER est appelée variable super globale
    // Récupération des données du formulaire
    //$name = $_POST['nom'];
    //var_dump($name);
    //$name = isset($_POST['nom']);
    $name = isset($_POST['nom']) ? trim($_POST['nom']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $comment = isset($_POST['comment']) ? trim($_POST['comment']) : '';
    /*var_dump($name);
    var_dump($email);
    var_dump($comment);*/

    // Vérification que le champ n'est pas vide
    if ($name !== '' && $email !== '' && $comment !== '') {
        // Stockage du message dans la session
        $_SESSION['message'] = "Nom : $name\nEmail : $email\nMessage : $comment\n----------------\n";
        $_SESSION['merci'] = "Merci pour votre engagement $name";

        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Veuillez remplir tous les champs !";
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intro : Formulaire et sessions PHP</title>
</head>
<body>
<?php
// Affichage du message stocké en session
if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['merci']) . "</p>";
    // stockage des éléments dans un fichier txt
    echo file_put_contents("message.txt", $_SESSION['message'], FILE_APPEND);
    // suppression du message stocké en session
    unset($_SESSION['message']);
}
?>

<form action="index.php" method="post">
    <div>
        <label for="name">Nom : </label>
        <input type="text" id="name" name="nom" required>
    </div>
    <div>
        <label for="email">Email : </label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="comment">Message : </label>
        <textarea type="text" id="comment" name="comment" required></textarea>
    </div>
    <div>
        <button type="submit">Envoyer</button>
    </div>
</form>

</body>
</html>
