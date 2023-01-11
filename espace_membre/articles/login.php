<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Espace Login</title>
</head>
<body>
    

<?php 
    include("bdd.php");

    session_start();
    
    $_SESSION["connected"]=FALSE;
    
    if($_POST){
        $pseudo = $_POST ["nom_i"];
        $password = $_POST ["password_i"];
    
        $sql = $dbco->query("SELECT * FROM `inscription`");
        while ($user = $sql-> fetch(PDO::FETCH_ASSOC)) {
            if ($user['nom_i'] == $pseudo && $user['password_i'] == $password)  {
                $_SESSION['connected'] = TRUE;    
                header("Location: ../espace/membre.php");
                exit;
            }
        }
    }
?>
<div class="container">
    <h1>Admin</h1>
    <form method="post">
        <input class="btn" type="text" name="nom_i" placeholder="Nom"/>
        <br><br>
        <input class="btn" type="password" name="password_i" placeholder="Password"/>
        <br><br>
        <input class="btn" type="submit" name="submit" /> 
    </from>
</div>
</body>
</html>