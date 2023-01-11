<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <a href="http://localhost/espace_membre/articles/login.php"><button>login</button></a>
    <form method="post">
        <input class="btn" type="text" name="nom" placeholder="Nom" required>
        <br><br>
        <input class="btn" type="text" name="prenom" placeholder="Prénom" required>
        <br><br>
        <input class="btn" type="email" name="email" placeholder="Email" required>
        <br><br>
        <input class="btn" type="password" name="password" placeholder="Mot de Passe" required>
        <br><br>
        <input class="btn" type="password" name="check_password" placeholder="Vérification du Mot de Passe" required>
        <br><br>
        <input class="btn" type="submit" name="envoyer" value="envoyer">
    </form>

   <?php
        include("pdo.php");
   ?>

    <script src="java.js"></script>

</body>

</html>