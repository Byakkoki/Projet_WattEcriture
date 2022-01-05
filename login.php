<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/login.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <?php require_once("navbar.html"); ?>
<?php

require_once('./API/PDOConnection.php');

if(
    $_POST["loginPseudo"] != "" &&
    $_POST["loginPassword"] != "" 

){
    $getPseudo = $connectionPDO->prepare('SELECT * FROM `user` WHERE pseudo=:pseudo; ');
    $getPseudo->execute([ "pseudo" => $_POST["loginPseudo"] ]);
    $pseudoRequest = $getPseudo->fetch(PDO::FETCH_ASSOC);

    if(!$pseudoRequest) {
        echo "<h1>This pseudo have not an account !</h1>";
}else{

    $hashedPassword = hash("SHA256", $_POST["loginPassword"]);

    $getPassword = $connectionPDO->prepare('SELECT * FROM `user` WHERE idUser LIKE :id AND password=:password');
    $getPassword->execute([ "password" => $hashedPassword, "id" => $pseudoRequest["idUser"] ]);
    $passwordRequest = $getPassword->fetch(PDO::FETCH_ASSOC);

    if(!$passwordRequest) {
        echo "<h1>This password have not an account !</h1>";
        }else{
            $token = createToken($passwordRequest["idUser"]);

            header('Location: https://majinbu-3000.ecole-404.com/main.php');

        }
    }
}


function createToken($idUser){
    global $connectionPDO;

    $token = v4();

    $createToken = $connectionPDO->prepare('UPDATE `user` SET token=:token, created=NOW() WHERE idUser=:id ');
    $createToken->execute([ "token" => $token, "id" => $idUser ]);

    setcookie("WP-Auth-Token", $token, time() + 18000, "/", "", true, true);
}

?>
    <section>
    <form id="login" action="#" method="POST">
            <label for="loginPseudo">Pseudo :</label>
            <input type="text" name="loginPseudo" class="p input" required>
            <label for="loginPassword">Mot de passe :</label>
            <input type="password" name="loginPassword" class="p input" required>
            <input type="submit" value="Connexion" id="connectButton">
        </form>
    </section>
</body>
</html>