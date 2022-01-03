<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/StoryCreate.css" rel="stylesheet">
    <title>Story Create</title>
</head>
<body>
    <?php require_once("../navbarlogin.html"); ?>

<?php

    require_once('../API/PDOConnection.php');

    if(
        $_POST["Title"] != "" &&
        $_POST["Description"] != "" 
    ){
        $getUserWithToken = $connectionPDO->prepare('SELECT * FROM `user` WHERE token LIKE :token;');
        $getUserWithToken->execute(["token" => $_COOKIE["WP-Auth-Token"]]);
        $user = $getUserWithToken->fetch(PDO::FETCH_ASSOC);
        //print_r($user);
        //die;

        $insertStory = $connectionPDO->prepare('INSERT INTO `histoire` (idHistoire, user_idUser, name, description) VALUES (:idHistoire, :idUser, :Title, :Description);');
        $insertStory->execute(["idHistoire" => v4(), "idUser" => $user["idUser"], "Title" => $_POST["Title"], "Description" => $_POST["Description"] ]);

        $storyRequest = $insertStory->fetch(PDO::FETCH_ASSOC);
        echo "<h1>Votre Histoire a bien été crée !</h1>";

        header('Location: https://majinbu-3000.ecole-404.com/main.php');

    }

?>

    <section>
    <form id="create" action="#" method="POST">
            <label for="TitleHistoire">Titre de l'Histoire :</label>
            <input type="text" name="Title" class="p input" required>
            <label for="DescHistoire">Description de l'Histoire :</label>
            <input id="Desc" type="text" name="Description" class="p input" required>
            <input type="submit" value="Sauvegarder" id="connectButton">
        </form>
    </section>

</body>
</html>